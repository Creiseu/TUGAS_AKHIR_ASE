<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\PivotCheckout;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;

        $transactions = Checkout::with(['pivotCheckouts', 'user'])
            ->where('created_by', $userId)
            ->whereHas('pivotCheckouts', function($query) {
                $query->where('order_track', '!=', 'completed');
            })
            ->get();
    
        $orderStatus = Checkout::with(['pivotCheckouts', 'user'])
            ->where('created_by', $userId)
            ->whereHas('pivotCheckouts', function($query) {
                $query->where('order_track', '=', 'completed');
            })
            ->get();
    
        $transactionsData = $transactions->map(function($checkout) {
            return [
                'id' => $checkout->id,
                'user_name' => $checkout->user->name,
                'products' => $checkout->pivotCheckouts->map(function($pivot) {
                    return [
                        'product_id' => $pivot->product->id,
                        'image' => $pivot->product->image,
                        'name' => $pivot->product->name,
                        'quantity' => $pivot->quantity,
                        'price' => $pivot->product->price,
                        'total_price' => $pivot->quantity * $pivot->product->price,
                    ];
                }),
                'subtotal' => $checkout->pivotCheckouts->sum(function($pivot) {
                    return $pivot->quantity * $pivot->product->price;
                }),
                'shipping_cost' => 5000,
                'service_fee' => 1000,
                'payment_receipt' => $checkout->payment_receipt,
                'grand_total' => $checkout->grandTotal,
                'order_track' => $checkout->pivotCheckouts->first()->order_track ?? 'pending',
                'payment_status' => $checkout->pivotCheckouts->first()->payment_status ?? 'unsettled',
                'created_by' => $checkout->created_by,
            ];
        });
    
        $completedTransactions = $orderStatus->map(function($checkout) {
            return [
                'id' => $checkout->id,
                'user_name' => $checkout->user->name,
                'products' => $checkout->pivotCheckouts->map(function($pivot) {
                    return [
                        'product_id' => $pivot->product->id,
                        'image' => $pivot->product->image,
                        'name' => $pivot->product->name,
                        'quantity' => $pivot->quantity,
                        'price' => $pivot->product->price,
                        'total_price' => $pivot->quantity * $pivot->product->price,
                    ];
                }),
                'subtotal' => $checkout->pivotCheckouts->sum(function($pivot) {
                    return $pivot->quantity * $pivot->product->price;
                }),
                'shipping_cost' => 5000,
                'service_fee' => 1000,
                'grand_total' => $checkout->grandTotal,
                'order_track' => $checkout->pivotCheckouts->first()->status ?? 'completed',
                'created_by' => $checkout->created_by,
            ];
        });
    
        return view('transaction.index', compact('transactionsData', 'completedTransactions'));
    }    
    public function updateOrder(Request $request, $id)
    {
        $checkout = Checkout::find($id);
        foreach ($checkout->pivotCheckouts as $pivotCheckout) {
            $pivotCheckout->order_track = $request->trackOrder;
            $pivotCheckout->save();
        }
    
        return response()->json(['success' => 'Order status updated successfully']);
    }
    public function uploadReceipt(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'payment_receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:9048',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
    
        $transaction = Checkout::find($id);
    
        if ($transaction) {
            $imageName = time().'.'.$request->payment_receipt->extension();
            $request->payment_receipt->storeAs('public', $imageName);
    
            $transaction->payment_receipt = $imageName;
            $transaction->save();
    
            return response()->json(['success' => 'Receipt uploaded successfully.']);
        } else {
            return response()->json(['error' => 'Transaction not found.'], 404);
        }
    }
    public function completedStatus(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'trackOrder' => 'required|string'
        ]);
    
        $orderId = $request->input('order_id');
        $trackOrder = $request->input('trackOrder');
    
        // Update the status in the pivot_checkouts table
        DB::table('pivot_checkouts')
            ->where('checkout_id', $orderId)
            ->update(['order_track' => $trackOrder]);
    
        return response()->json(['success' => true]);
    }
    public function getAllUsers()
    {
        $users = User::all(); // Mengambil semua data user
    
        return view('admin.users', compact('users')); // Mengirim data ke view
    }

    public function updateStatus(Request $request, $id)
    {
        $checkout = Checkout::find($id);
        foreach ($checkout->pivotCheckouts as $pivotCheckout) {
            $pivotCheckout->payment_status = $request->paymentStatus;
            $pivotCheckout->save();
        }
    
        return response()->json(['success' => 'Order status updated successfully']);
    }
}
