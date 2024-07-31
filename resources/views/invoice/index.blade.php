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
                <ul class="pl-0 list-none m-[20px]" id="sidenav_menu">
                    <li class="mb-[2px]">
                        <a href="{{ route('productCart') }}" class="capitalize flex items-center justify-start py-4 pl-4 text-lg rounded-xl hover:bg-green-500 hover:text-white text-gray-500 transition font-semibold mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span class="ml-2">Cart</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('invoice') }}" class="capitalize flex items-center justify-start py-4 pl-4 text-lg rounded-xl bg-green-500 text-white transition font-semibold mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <span class="ml-2">Invoice</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}" class="capitalize flex items-center justify-start py-4 pl-4 text-lg rounded-xl hover:bg-green-500 hover:text-white text-gray-500 transition font-semibold mb-2">
                            <svg fill="#000000" height="20px" width="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 476.213 476.213" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <polygon points="476.213,223.107 57.427,223.107 151.82,128.713 130.607,107.5 0,238.106 130.607,368.714 151.82,347.5 57.427,253.107 476.213,253.107 "></polygon> </g></svg>
                            <span class="ml-2">Back</span>
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
            </div>
        </div>
        <!--/Navbar-->

        <!--page content-->
        <div class="absolute top-20 pr-8 left-0 lg:left-80 z-0 px-4 h-full w-full md:w-4/5">
            <!-- overview -->
            <div class="flex flex-col lg:flex-row lg:justify-between w-full">
                <div class="w-full lg:w-1/2 mt-5 lg:pl-0 mb-20 lg:mb-0">
                    <div class="flex flex-col items-center lg:items-start">
                        <div class="font-['MyCustomFont-Bold'] w-full">
                            @foreach ($invoiceData->reverse() as $invoice) <!-- Menampilkan data terbaru di atas -->
                                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg mb-8">
                                    <div class="p-8">
                                        <div class="flex justify-between items-center mb-4">
                                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Checkout Date: {{ $invoice['created_at'] }}</h2>
                                            <div>
                                                <a href="{{ route('checkout.invoice.download', $invoice['checkout_id']) }}" class="flex items-center justify-center w-10 h-10 rounded-md bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                    </svg>
                                                </a>                                                
                                            </div>
                                        </div>
                                        @foreach ($invoice['products'] as $product)
                                            @if ($product['status'] === 'completed') <!-- Periksa status -->
                                                <div class="flex items-center justify-between mb-4">
                                                    @if($product['image'])
                                                        <img src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}" class="w-24 h-auto mr-4 rounded-md">
                                                    @endif
                                                    <div class="flex-1">
                                                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product['name'] }}</h2>
                                                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $product['category'] }}</p>
                                                    </div>
                                                    <div class="text-right">
                                                        <input type="number" value="{{ $product['quantity'] }}" disabled class="w-16 text-center border border-gray-300 rounded-md">
                                                        <p class="text-lg font-semibold text-gray-900 dark:text-white mt-2">Rp. {{ number_format($product['price'], 0, ',', '.') }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                        <div class="flex items-start mt-6">
                                            <div>
                                                <p class="text-sm text-gray-900 dark:text-white">Ongkos Kirim:</p>
                                                <p class="text-sm text-gray-900 dark:text-white">Rp. 5000</p>
                                            </div>
                                            <div class="ml-6">
                                                <p class="text-sm text-gray-900 dark:text-white">Biaya Jasa Layanan Website:</p>
                                                <p class="text-sm text-gray-900 dark:text-white">Rp. 1000</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between border-t border-gray-300 pt-4">
                                            <p class="text-lg font-semibold text-gray-900 dark:text-white">Total Checkout:</p>
                                            <p class="text-lg font-semibold text-gray-900 dark:text-white">Rp. {{ number_format($invoice['grandTotal'], 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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