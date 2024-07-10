<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management - Dashboard</title>
    <!--TailwindCSS-->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css"  rel="stylesheet" />
    <!--custom CSS-->
    <style>
        /* Chrome, Safari, Edge, Opera */
        .quantity-input::-webkit-outer-spin-button,
        .quantity-input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }
        
        /* Firefox */
        .quantity-input[type="number"] {
          -moz-appearance: textfield;
        }
    </style>
</head>
<body>
    <!--Body wrapper--> 
    <div class="bg-white min-h-screen overflow-y-scroll overflow-x-hidden block relative w-full h-full">

        <!--Side Navigation-->
        <div class="fixed top-0 bottom-0 left-0 h-full min-h-screen w-72 bg-white px-6 py-3 shadow-sm hidden lg:block z-50" id="sidenav">
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
                        <a href="{{ route('productCart') }}" class="capitalize flex items-center justify-start py-4 pl-4 text-lg rounded-xl bg-green-500 text-white transition font-semibold mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span class="ml-2">Cart</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('invoice') }}" class="capitalize flex items-center justify-start py-4 pl-4 text-lg rounded-xl hover:bg-green-500 hover:text-white text-gray-500 transition font-semibold mb-2">
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
                </div>
            </div>
        </div>
        <!--/Navbar-->

        <!--page content-->
        <div class="absolute top-20 pr-8 left-0 lg:left-80 z-0 px-4 h-full w-full md:w-4/5">
            <!-- overview -->
            <div class="flex flex-col lg:flex-row lg:justify-between gap-4 w-full">
                <div class="w-full lg:w-1/2 mt-5 lg:pl-0 mb-20 lg:mb-0">
                    <div class="flex flex-col items-center lg:items-start w-full">
                        <section class="bg-white antialiased dark:bg-gray-900">
                            <div class="mx-auto max-w-100 px-4 2xl:px-0">
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Shopping Cart</h2>
                                <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start">
                                    <div class="mx-auto w-[680px] flex-none lg:max-w-2xl xl:max-w-4xl">
                                        <div class="space-y-6">
                                            <form id="checkout-form" enctype="multipart/form-data">
                                                @csrf
                                                @forelse($groupedCartItems as $groupedCartItem)
                                                    @php
                                                        $product = $groupedCartItem['product'];
                                                        $maxQuantity = $product->stocks; // Ambil nilai stocks dari produk
                                                    @endphp
                                                    <div class="mt-[10px] rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6 product-item" data-product-id="{{ $product->id }}">
                                                        <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                                            <a href="#" class="shrink-0 md:order-1">
                                                                <img class="h-20 w-20 dark:hidden" src="{{ asset('storage/' . $product->image) }}" alt="imac image" data-product-image="{{ $product->image }}"/>
                                                            </a> 
                                    
                                                            <div class="flex items-center justify-between md:order-3 md:justify-end">
                                                                <div class="flex items-center">
                                                                    <button type="button" id="decrement-button" data-input-counter-decrement="counter-input" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                                                        <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                                        </svg>
                                                                    </button>
                                                                    <input type="number" id="counter-input" value="{{ $groupedCartItem['quantity'] }}" data-input-counter class="quantity-input counter-input border-0 rounded px-2 text-center text-sm font-medium text-gray-900 bg-transparent focus:outline-none focus:ring-0 dark:text-white" step="1" min="1" max="{{ $product->stocks }}" data-product-id="{{ $product->id }}" data-product-price="{{ $product->price }}"/>
                                                                    <button type="button" id="increment-button" data-input-counter-increment="counter-input" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                                                        <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                                <div class="text-end md:order-4 md:w-30">
                                                                    <p class="text-base font-bold text-gray-900 dark:text-white ml-[40px]" data-product-price="{{ $product->price }}">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                                                                </div>
                                                            </div>
                                    
                                                            <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                                                <a href="#" class="text-base font-medium text-gray-900 hover:underline dark:text-white" data-product-name="{{ $product->name }}">{{ $product->name }}</a>
                                                                
                                                                <div class="flex items-center gap-4">
                                                                    <div class="inline-flex items-center text-sm font-medium text-gray-500 dark:text-gray-400" data-product-stocks="{{ $product->stocks }}">
                                                                        Stock: {{ $product->stocks }}
                                                                    </div>
                                                                    <a class="delete-product inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500" data-product-id="{{ $product->id }}">
                                                                        <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                                                        </svg>
                                                                        Remove
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p>Keranjang Anda kosong</p>
                                                @endforelse
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full px-8 lg:px-0">
                                        <div class="mt-[10px] space-y-4 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800" style="width: 290px;">
                                            <p class="text-xl font-semibold text-gray-900 dark:text-white text-center">Ringkasan Belanja</p>
                                    
                                            <div class="space-y-4">
                                                <div class="space-y-2">
                                                    <div class="flex items-center justify-between gap-4">
                                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Sub Total</dt>
                                                        <dd class="text-base font-medium text-gray-900 dark:text-white" data-subtotal>Rp. 0</dd>
                                                    </div>
                                    
                                                    <div class="flex items-center justify-between gap-4">
                                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Ongkos Kirim</dt>
                                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Rp. 5,000</dd>
                                                    </div>
                                    
                                                    <div class="flex items-center justify-between gap-4">
                                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Biaya Jasa Website</dt>
                                                        <dd class="text-base font-medium text-gray-900 dark:text-white">Rp. 1,000</dd>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                                    <dd class="text-base font-bold text-gray-900 dark:text-white" data-grand-total>Rp. 0</dd>
                                                </div>
                                            </div>
                                    
                                            <button type="button" id="checkout" class="flex w-full items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Proceed to Checkout</button>
                                    
                                            <div class="flex items-center justify-center gap-2">
                                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                                                <a href="#" title="" class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">
                                                    Continue Shopping
                                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#checkout').on('click', function() {
                // Mengumpulkan data produk
                var products = [];
                $('.product-item').each(function() {
                    var productId = $(this).data('product-id');
                    var quantity = $(this).find('.counter-input').val();
                    products.push({
                        id: productId, // Menggunakan 'id' sebagai nama field
                        quantity: quantity
                    });
                });

                // Memeriksa apakah jumlah quantity melebihi stock
                var valid = true;
                $('.product-item').each(function() {
                    var productId = $(this).data('product-id');
                    var quantity = $(this).find('.counter-input').val();
                    var maxQuantity = $(this).find('.quantity-input').data('product-stocks');
                    if (parseInt(quantity) > parseInt(maxQuantity)) {
                        alert('Jumlah quantity produk ' + productId + ' melebihi batas stock');
                        valid = false;
                        return false; // Menghentikan loop jika salah satu melebihi stock
                    }
                });

                if (!valid) {
                    return;
                }

                // Menghitung subtotal
                var subtotal = 0;
                $('.product-item').each(function() {
                    var productId = $(this).data('product-id');
                    var quantity = $(this).find('.counter-input').val();
                    
                    // Ambil harga sebagai string dan formatnya
                    var priceString = $(this).find('.text-base.font-bold.text-gray-900.dark\\:text-white.ml-\\[40px\\]').data('product-price').toString();
                    var price = parseFloat(priceString.replace(/[^\d\.,]/g, '').replace(',', '.'));
                    
                    subtotal += parseInt(quantity) * price;
                });

                // Menghitung grand total
                var ongkosKirim = 5000; // Ongkos kirim tetap Rp. 5,000
                var biayaJasa = 1000; // Biaya jasa website tetap Rp. 1,000
                var grandTotal = subtotal + ongkosKirim + biayaJasa;

                // Mendapatkan id user yang telah login (contoh, masih statis)
                var userId = 123; // Ganti dengan id user yang sesuai

                // Mengirim data via AJAX ke route checkout
                $.ajax({
                    url: '/checkout',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        userId: userId,
                        products: products,
                        subtotal: parseInt(subtotal), // Pastikan subtotal dikirim sebagai angka
                        ongkosKirim: ongkosKirim,
                        biayaJasa: biayaJasa,
                        grandTotal: parseInt(grandTotal) // Pastikan grandTotal dikirim sebagai angka
                    },
                    success: function(response) {
                        alert('Produk Anda telah di checkout');
                        console.log(response); // Tampilkan respons dari server di console log

                        // Perbarui tampilan keranjang setelah checkout berhasil
                        $('.product-item').remove(); // Hapus semua item dari keranjang
                        $('[data-subtotal]').text('Rp. 0'); // Reset subtotal
                        $('[data-grand-total]').text('Rp. 0'); // Reset grand total
                    },
                    error: function(xhr, status, error) {
                        alert('Terjadi kesalahan saat melakukan checkout');
                        console.error(xhr.responseText);
                    }
                });
            });

            // Event untuk decrement button
            $(document).on('click', '.decrement-button', function() {
                var input = $(this).siblings('input');
                var currentValue = parseInt(input.val());
                if (currentValue > 1) {
                    input.val(currentValue - 1);
                    input.trigger('change'); // Trigger change event untuk update subtotal dan total
                }
            });

            // Event untuk increment button
            $(document).on('click', '.increment-button', function() {
                var input = $(this).siblings('input');
                var currentValue = parseInt(input.val());
                var maxQuantity = parseInt(input.attr('max'));
                if (currentValue < maxQuantity) {
                    input.val(currentValue + 1);
                    input.trigger('change'); // Trigger change event untuk update subtotal dan total
                } else {
                    alert('Jumlah beli untuk produk ini melebihi batas stok kami');
                }
            });

            // Pengecekan jika quantity melebihi stok saat input berubah
            $(document).on('change', '.counter-input', function() {
                var currentValue = parseInt($(this).val());
                var maxQuantity = parseInt($(this).attr('max'));
                if (currentValue > maxQuantity) {
                    alert('Jumlah beli untuk produk ini melebihi batas stok kami');
                    $(this).val(maxQuantity); // Reset ke nilai maksimal jika melebihi stok
                }
            });

            function calculateSubtotal() {
                var subtotal = 0;
                $('.product-item').each(function() {
                    var quantity = $(this).find('[data-input-counter]').val();
                    var price = $(this).find('[data-input-counter]').data('product-price');
                    subtotal += quantity * price;
                });
                $('[data-subtotal]').text('Rp. ' + formatNumber(subtotal));
                calculateTotal(subtotal);
            }

            function calculateTotal(subtotal) {
                var shippingCost = 5000; // Ongkos Kirim
                var serviceFee = 1000; // Biaya Jasa Website
                var grandTotal = subtotal + shippingCost + serviceFee;
                $('[data-grand-total]').text('Rp. ' + formatNumber(grandTotal));
            }

            function formatNumber(number) {
                return number.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            }

            $('.product-item').on('change', '[data-input-counter]', function() {
                calculateSubtotal();
            });

            $('.product-item').on('click', '#decrement-button, #increment-button', function() {
                calculateSubtotal();
            });

            // Inisialisasi subtotal saat halaman pertama kali dimuat
            calculateSubtotal();
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('#decrement-button').forEach(button => {
                button.addEventListener('click', function() {
                    let counterInput = this.nextElementSibling;
                    let currentValue = parseInt(counterInput.value);
                    if (currentValue > 1) {
                        counterInput.value = currentValue - 1;
                        counterInput.dispatchEvent(new Event('change'));
                    }
                });
            });

            document.querySelectorAll('#increment-button').forEach(button => {
                button.addEventListener('click', function() {
                    let counterInput = this.previousElementSibling;
                    let currentValue = parseInt(counterInput.value);
                    let maxQuantity = parseInt(counterInput.getAttribute('max'));
                    if (currentValue < maxQuantity) {
                        counterInput.value = currentValue + 1;
                        counterInput.dispatchEvent(new Event('change'));
                    } else {
                        alert('Jumlah beli untuk produk ini melebihi batas stok kami');
                    }
                });
            });
        });
    </script>

</body>
</html>