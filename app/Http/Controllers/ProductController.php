<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use App\Models\PivotCheckout;
use App\Models\Product;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {   $userId = Auth::id();
        $cartQuantity = DB::table('carts')
            ->where('created_by', $userId)
            ->sum('quantity');
        $products = Product::all();
        $users = Auth::user()->name;
        return view('dashboard', compact('products','users'), ['cartQuantity' => $cartQuantity]);
    }

    public function getCartQuantity()
    {
        $userId = Auth::id();
        $cartQuantity = DB::table('carts')
            ->where('created_by', $userId)
            ->sum('quantity');

        return response()->json(['quantity' => $cartQuantity]);
    }
    public function productCart()
    {
        // Ambil semua item di keranjang belanja untuk pengguna yang sedang login
        $cartItems = Cart::where('created_by', Auth::user()->id)->get();

        // Kelompokkan item keranjang berdasarkan product_id
        $groupedCartItems = [];
        foreach ($cartItems as $cartItem) {
            $productId = $cartItem->product_id;
            if (!isset($groupedCartItems[$productId])) {
                $groupedCartItems[$productId] = [
                    'product' => $cartItem->product,
                    'quantity' => 0,
                ];
            }
            $groupedCartItems[$productId]['quantity'] += 1; // Tambahkan kuantitas
        }

        return view('cart/index', compact('groupedCartItems'));
    }

    public function addProductToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $productBelong = $request->input('product_belong');
        // $quantity = $request->input('quantity', 1);

        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $user = Auth::user()->id;

        $cartItem = new Cart();
        $cartItem->product_id = $productId;
        $cartItem->created_by = $user;
        $cartItem->updated_by = $user;
        // $cartItem->quantity = $quantity;
        $cartItem->save();

        // Update session or any other logic as needed

        return redirect()->route('dashboard')->with('success', 'Product added to cart');
    }

    
    public function deleteItem(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Movie successfully deleted.');
        }
    }
    public function create(): View
    {
        return view('product.create');
    }

    public function store(Request $request): RedirectResponse {
        //validate form
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:9048',
            'name'         => 'required',
            'tag'           => 'required', 
            'description'   => 'required|min:10',
            'category'      => 'required',
            'price'         => 'required|numeric',
            'stocks'         => 'required|numeric',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public', $image->hashName());

        //create product
        Product::create([
            'image'         => $image->hashName(),
            'name'          => $request->name,
            'tag'           => $request->tag,
            'description'   => $request->description,
            'category'      => $request->category,
            'price'         => $request->price,
            'stocks'        => $request->stocks,
            'created_by'    => Auth::id(),
            'updated_by'    => Auth::id(),
        ]);

        //redirect to index
        return redirect()->route('admin.dashboard')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('product.show', compact('product'));
    }
    

    public function edit(string $id): View
    {
        //get product by ID
        $product = Product::findOrFail($id);

        //render view with product
        return view('product.edit', compact('product'));
    }
       
    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'         => 'image|mimes:jpeg,jpg,png|max:9048',
            'name'         => 'required',
            'tag'           => 'required', 
            'description'   => 'required|min:10',
            'category'      => 'required',
            'price'         => 'required|numeric',
            'stocks'         => 'required|numeric',
        ]);

        //get product by ID
        $product = Product::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/storage', $image->hashName());

            //delete old image
            Storage::delete('public/storage/'.$product->image);

            //update product with new image
            $product->update([
                'image'         => $image->hashName(),
                'name'          => $request->name,
                'tag'           => $request->tag,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock,
                'created_by'    => Auth::id(),
                'updated_by'    => Auth::id(),
            ]);

        } else {

            //update product without image
            $product->update([
                'name'          => $request->name,
                'tag'           => $request->tag,
                'description'   => $request->description,
                'price'         => $request->price,
                'stock'         => $request->stock,
                'created_by'    => Auth::id(),
                'updated_by'    => Auth::id(),
            ]);
        }

        //redirect to index
        return redirect()->route('admin.dashboard')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        try {
            //get product by ID
            $product = Product::findOrFail($id);
    
            //delete image
            Storage::delete('public/products/' . $product->image);
    
            //delete product
            $product->delete();
    
            //redirect to index with success message
            return redirect()->route('admin.dashboard')->with(['success' => 'Data Berhasil Dihapus!']);
        } catch (QueryException $e) {
            //redirect to index with error message
            return redirect()->route('admin.dashboard')->with(['error' => 'Tidak bisa menghapus produk karena terikat dengan data lain!']);
        }
    }
    public function checkout(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'grandTotal' => 'required|numeric',
            'products' => 'required|array',
            'products.*.id' => 'required|integer',
            'products.*.quantity' => 'required|integer',
        ]);
    
        // Mulai transaksi database
        DB::beginTransaction();
    
        try {
            // Simpan data ke tabel checkouts
            $checkout = new Checkout();
            $checkout->grandTotal = $request->grandTotal;
            $checkout->created_by = Auth::id(); // ID pengguna yang login
            $checkout->updated_by = Auth::id(); // ID pengguna yang login
            $checkout->save();
    
            // Simpan data produk ke tabel pivot_checkouts
            foreach ($request->products as $product) {
                PivotCheckout::create([
                    'checkout_id' => $checkout->id,
                    'product_id' => $product['id'],
                    'quantity' => $product['quantity'],
                ]);
    
                // Hapus data produk dari tabel cart berdasarkan user yang login
                Cart::where('product_id', $product['id'])
                    ->where('created_by', Auth::id())
                    ->delete();
            }
    
            // Commit transaksi database
            DB::commit();
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // Rollback transaksi database jika terjadi kesalahan
            DB::rollBack();
    
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat checkout', 'error' => $e->getMessage()], 500);
        }
    }

    public function invoice(): View
    {
        $userId = Auth::id();

        // Ambil data checkout berdasarkan user yang login
        $checkouts = Checkout::where('created_by', $userId)->with(['pivotCheckouts.product'])->get();

        // Mengambil data dalam format yang mudah digunakan di view
        $invoiceData = $checkouts->map(function ($checkout) {
            return [
                'created_at' => Carbon::parse($checkout->created_at)->isoFormat('dddd, DD-MM-YYYY'),
                'products' => $checkout->pivotCheckouts->map(function ($pivotCheckout) {
                    return [
                        'name' => $pivotCheckout->product->name,
                        'category' => $pivotCheckout->product->category,
                        'quantity' => $pivotCheckout->quantity,
                        'image'    => $pivotCheckout->product->image,
                        'price'    => $pivotCheckout->product->price
                    ];
                }),
                'grandTotal' => $checkout->grandTotal,
            ];
        });

        return view('invoice.index', compact('invoiceData'));
    }
    
    public function deleteCart(Request $request)
{
    $request->validate([
        'product_id' => 'required|integer',
        'user_id' => 'required|integer',
    ]);

    // Hapus data produk dari tabel cart berdasarkan user yang login
    DB::table('carts')->where('product_id', $request->product_id)->where('created_by', $request->user_id)->delete();

    return response()->json(['success' => true]);
}

}
