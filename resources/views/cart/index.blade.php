<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management - Dashboard</title>
    <!--TailwindCSS-->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <!--custom CSS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!--Body wrapper--> 
    <div class="bg-white min-h-screen overflow-y-scroll overflow-x-hidden block relative w-full h-full">

        <!--Side Navigation-->
        <div class="overflow-y-scroll fixed top-0 bottom-0 left-0 h-full min-h-screen w-72 bg-white px-6 py-3 shadow-sm hidden lg:block z-50" id="sidenav">
            <div class="relative">
                <div class="absolute top-2 right-0 text-lg text-gray-500 cursor-pointer block lg:hidden" id="closeNav">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
            
            <div class="h-16 items-center pl-4">
                <div class=" mt-1 logo_area text-xl font-bold uppercase text-gray-600 flex items-center justify-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                   <span class="ml-2">inventory</span>
                </div>
            </div>

            

            <div id="sidenav_menu_wrap">
                <ul class="pl-0 m-0 list-none" id="sidenav_menu">
                    <li>
                        <a href="#" class="capitalize flex items-center justify-start py-4 pl-4 text-lg rounded-xl bg-green-500 text-white transition font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                              </svg>
                            <span class="ml-2">Cart</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="capitalize flex items-center justify-start py-4 pl-4 text-lg rounded-xl hover:bg-green-500 hover:text-white transition text-gray-500 font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                              </svg>
                            <span class="ml-2">invoice</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--/Side Navigation-->

        <!--Navbar-->
        <div class="flex fixed top-0 left-0 items-center justify-between w-full h-16  px-8 py-0 shadow-sm lg:pl-72 z-30 bg-white" id="navbar">
            <div id="sear chbar" class="flex items-center justify-items-start h-10 lg:ml-16 md:ml-8">
                <div class="relative text-sm text-gray-400 ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden md:block w-6 absolute top-2 left-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" placeholder="Search anything" class="hidden md:block outline-none pl-10 h-10 w-72 pb-1 rounded-xl bg-white text-gray-400" />
                </div>
               
            </div>

            <span class="absolute top-5 lg:left-80 md:left-8 cursor-pointer text-gray-600 block lg:hidden" id="sideBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
              </svg>
            </span>

            <div id="navbtns" class="flex items-center justify-end ml-0">
                <!-- <a href="#" class="relative text-xl text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="absolute w-3 h-3 rounded-full bg-red-400 top-0 right-0"></span>
                </a> -->

                <div class="text-xl text-gray-600 ml-2 md:ml-8 relative">
                    <div class="cursor-pointer flex items-center justify-between gap-1"  id="usr_btn">
                    <x-app-layout></x-app-layout>
                    </div>
                    
                    <!--dropdown menu of user-->
                    <div id="usr_menu" class="hidden absolute top-full z-90 rounded-lg shadow-lg w-48 right-0 mt-2">
                        <p class="px-4 py-2 text-xs text-gray-400">Manage Account</p>
                        <div class="border borer-t border-gray-200"></div>
                        <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-blue-400 hover:text-white transition">Profile</a>
                        <div class="border borer-t border-gray-200"></div>
                        <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-blue-400 hover:text-white transition">Logout</a>
                    </div>
                    <!--/dropdown menu of user-->
                </div>

                <!-- <a href="#" class="relative text-xl text-gray-600 ml-2 md:ml-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="absolute w-2 h-2 rounded-full bg-red-400 top-1 right-1"></span>
                </a> -->
            </div>
        </div>
        <!--/Navbar-->

        <!--page content-->
        <div class="absolute top-20 pr-8 left-0 lg:left-80 z-0 px-4 h-full w-full md:w-4/5">
            <!-- overview -->
            <div class="flex flex-col lg:flex-row lg:justify-between w-full">
                <div class="w-full lg:w-1/2 mt-5 lg:pl-0 mb-20 lg:mb-0">
                    <div class="flex flex-col items-center lg:items-start">
                        <div class="font-['MyCustomFont-Bold'] w-full h-96 overflow-y-auto">
                            <form id="checkout-form" enctype="multipart/form-data">
                                @csrf
                                @forelse($groupedCartItems as $groupedCartItem)
                                    <div class="product-item" data-product-id="{{$groupedCartItem['product']->id}}">
                                        <p hidden>{{$groupedCartItem['product']->id}}</p>
                                        <div class="flex flex-row items-center gap-4 mb-4">
                                            <img src="{{ asset('storage/'.$groupedCartItem['product']->image) }}" data-product-image="{{$groupedCartItem['product']->image}}" class="w-32 h-32 object-cover">
                                            <div class="flex flex-col">
                                                <p data-product-name="{{$groupedCartItem['product']->name}}">Nama Produk: {{ $groupedCartItem['product']->name }}</p>
                                                <p data-product-price="{{$groupedCartItem['product']->price}}">Harga: {{ $groupedCartItem['product']->price }}</p>
                                            </div>
                                            <div class="ml-auto">
                                                <label for="input" class="block">Quantity:</label>
                                                <input type="number" value="{{ $groupedCartItem['quantity'] }}" data-product-qty="{{$groupedCartItem['quantity']}}" class="h-9 w-24 border rounded px-2">
                                            </div>
                                        </div>
                                        <p hidden>{{ Auth::user()->id }}</p>
                                    </div>
                                @empty
                                    <p>Keranjang Anda kosong</p>
                                @endforelse
                            
                                @if(!empty($groupedCartItems))
                                    <div class="mt-4">
                                        <button type="button" id="checkout" class="px-4 py-2 bg-blue-500 text-white rounded">Checkout</button>
                                    </div>
                                @endif
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- /overview -->
        </div>
        <!--/page content-->

    </div>
    <!--/Body wrapper-->


    <!--Scripts-->
    <script src="./assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            $("#checkout").click(function (e) {
                e.preventDefault();

                console.log("Checkout button clicked");

                let products = [];
                let grandTotal = 0; // Inisialisasi grand total

                $(".product-item").each(function() {
                    let productId = $(this).data("product-id");
                    let productImg = $(this).find("img").data("product-image");
                    let productName = $(this).find("[data-product-name]").data("product-name");
                    let productPrice = $(this).find("[data-product-price]").data("product-price");
                    let productQuantity = $(this).find("[data-product-qty]").val();
                    let subTotal = productPrice * productQuantity; // Hitung sub total untuk setiap produk
                    grandTotal += subTotal; // Tambahkan sub total ke grand total
                    let userId = $(this).find("p:hidden").eq(1).text(); // Ambil ID pengguna dari elemen tersembunyi kedua

                    console.log({
                        id: productId,
                        image: productImg,
                        name: productName,
                        price: productPrice,
                        quantity: productQuantity,
                        subTotal: subTotal,
                        userId: userId
                    });

                    products.push({
                        id: productId,
                        image: productImg,
                        name: productName,
                        price: productPrice,
                        quantity: productQuantity,
                        subTotal: subTotal,
                        userId: userId
                    });
                });

                console.log("Grand Total:", grandTotal); // Tampilkan grand total di konsol log

                console.log("Sending AJAX request with data:", products);

                $.ajax({
                    url: "{{ route('checkout') }}",
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        products: products,
                        grandTotal: grandTotal
                    },
                    success: function (response) {
                        alert('Product telah di checkout');
                        console.log(response);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>