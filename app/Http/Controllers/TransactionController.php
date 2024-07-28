<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\PivotCheckout;
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
                $query->where('status', '!=', 'completed');
            })
            ->get();
    
        $orderStatus = Checkout::with(['pivotCheckouts', 'user'])
            ->where('created_by', $userId)
            ->whereHas('pivotCheckouts', function($query) {
                $query->where('status', '=', 'completed');
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
                'status' => $checkout->pivotCheckouts->first()->status ?? 'pending',
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
                'status' => $checkout->pivotCheckouts->first()->status ?? 'completed',
                'created_by' => $checkout->created_by,
            ];
        });
    
        return view('transaction.index', compact('transactionsData', 'completedTransactions'));
    }    
    public function updateStatus(Request $request, $id)
    {
        $checkout = Checkout::find($id);
        foreach ($checkout->pivotCheckouts as $pivotCheckout) {
            $pivotCheckout->status = $request->status;
            $pivotCheckout->save();
        }
    
        return response()->json(['success' => 'Order status updated successfully']);
    }

    public function uploadReceipt(Request $request, $transactionId)
    {
        $request->validate([
            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('receipt');
        $image->storeAs('public', $image->hashName());

        $checkout = Checkout::find($transactionId);
        $checkout->update([
            'payment_receipt' => $image->hashName(),
        ]);

        return redirect()->back()->with('success', 'Payment receipt uploaded successfully.');
    }


}
