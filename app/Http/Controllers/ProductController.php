<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Product;
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
    {   
        $products = Product::all();
        $users = Auth::user()->name;
        return view('dashboard', compact('products','users'));
    }
    public function movieCart()
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
        ]);
    
        // Simpan data ke tabel checkouts
        $checkout = new Checkout();
        $checkout->grandTotal = $request->grandTotal;
        $checkout->created_by = Auth::id(); // ID pengguna yang login
        $checkout->updated_by = Auth::id(); // ID pengguna yang login
        $checkout->save();
    
        // Simpan data produk ke tabel pivot_checkouts
        foreach ($request->products as $product) {
            DB::table('pivot_checkouts')->insert([
                'checkout_id' => $checkout->id,
                'product_id' => $product['id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            // Hapus data produk dari tabel cart berdasarkan user yang login
            DB::table('carts')->where('product_id', $product['id'])->where('created_by', Auth::id())->delete();
        }
    
        return response()->json(['success' => true]);
    }
    
}