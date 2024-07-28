<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management - Dashboard</title>
    <!--TailwindCSS-->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!--custom CSS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <!--Body wrapper--> 
    <div class="bg-gray-100 min-h-screen overflow-y-scroll overflow-x-hidden block relative w-full h-full">

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
                    <li class="mb-[2px]">
                        <a href="{{ route('transaction') }}" class="capitalize flex items-center justify-start py-4 pl-4 text-lg rounded-xl bg-green-500 text-white transition font-semibold mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            <span class="ml-2">Transaction</span>
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
                    <!--/dropdown menu of user-->
                </div>
            </div>
        </div>
        <!--/Navbar-->

        <!--page content-->
        <div class="absolute top-20 pr-8 left-0 lg:left-80 z-0 px-4 h-full w-full md:w-[1700px] bg-gray-100">
            <!-- overview -->
            <div class="flex flex-col lg:flex-row lg:justify-between gap-4">
                <div class="w-full lg:w-1/2 mt-5 lg:pl-0 mb-20 lg:mb-0">
                    <div class="flex flex-col items-center lg:items-start w-full">
                        @foreach ($transactionsData as $transaction)
                            @if (Auth::user()->id == $transaction['created_by'])
                                <section class="bg-white rounded-lg shadow-md p-6 mb-6">
                                    <!-- Transaction Card -->
                                    <div class="border border-gray-200 rounded-lg bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">
                                            Transaction ID: {{ $transaction['id'] }}
                                        </h2>
                                        <div class="mt-6 sm:mt-8 lg:flex lg:gap-8">
                                            <!-- Product List -->
                                            <div class="w-full divide-y divide-gray-200 overflow-hidden rounded-lg border border-gray-200 dark:divide-gray-700 dark:border-gray-700 lg:max-w-xl xl:max-w-2xl">
                                                <div class="space-y-4 p-6">
                                                    @foreach ($transaction['products'] as $product)
                                                        <div class="flex items-center gap-6">
                                                            <img class="h-14 w-14 dark:hidden" src="{{ asset('storage/' . $product['image']) }}" alt="{{ $product['name'] }}" />
                                                            <p class="min-w-0 flex-1 font-medium text-gray-900 hover:underline dark:text-white">{{ $product['name'] }}</p>
                                                        </div>
                                                        <div class="flex items-center justify-between gap-4">
                                                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400"><span class="font-medium text-gray-900 dark:text-white">Product ID:</span> {{ $product['product_id'] }}</p>
                                                            <div class="flex items-center justify-end gap-4">
                                                                <p class="text-base font-normal text-gray-900 dark:text-white">{{ $product['quantity'] }}</p>
                                                                <p class="text-xl font-bold leading-tight text-gray-900 dark:text-white">Rp. {{ number_format($product['price'], 0, ',', '.') }}</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    @endforeach

                                                    <!-- Order Summary -->
                                                    <div class="space-y-4 bg-gray-50 p-6 dark:bg-gray-800 rounded-lg">
                                                        <div class="space-y-2">
                                                            <dl class="flex items-center justify-between gap-4">
                                                                <dt class="font-normal text-gray-500 dark:text-gray-400">Sub Total</dt>
                                                                <dd class="font-medium text-gray-900 dark:text-white">Rp. {{ number_format($transaction['subtotal'], 0, ',', '.') }}</dd>
                                                            </dl>
                                                            <dl class="flex items-center justify-between gap-4">
                                                                <dt class="font-normal text-gray-500 dark:text-gray-400">Ongkos Kirim</dt>
                                                                <dd class="text-base font-medium text-green-500">Rp. {{ number_format($transaction['shipping_cost'], 0, ',', '.') }}</dd>
                                                            </dl>
                                                            <dl class="flex items-center justify-between gap-4">
                                                                <dt class="font-normal text-gray-500 dark:text-gray-400">Biaya Jasa Website</dt>
                                                                <dd class="font-medium text-gray-900 dark:text-white">Rp. {{ number_format($transaction['service_fee'], 0, ',', '.') }}</dd>
                                                            </dl>
                                                        </div>
                                                        <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                                            <dt class="text-lg font-bold text-gray-900 dark:text-white">Total</dt>
                                                            <dd class="text-lg font-bold text-gray-900 dark:text-white">Rp. {{ number_format($transaction['grand_total'], 0, ',', '.') }}</dd>
                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Order History -->
                                            <div class="mt-6 grow sm:mt-8 lg:mt-0">
                                                <div class="space-y-6 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800 w-[300px]">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Order history</h3>

                                                    <ol class="relative ms-3 border-s border-gray-200 dark:border-gray-700">
                                                        @if ($transaction['status'] === 'pending')
                                                            <li class="mb-10 ms-6">
                                                                <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M12 2a9.97 9.97 0 0 1 7.68 3.32A10 10 0 0 1 12 22a10 10 0 0 1-7.68-16.68A9.97 9.97 0 0 1 12 2z"/>
                                                                    </svg>
                                                                </span>
                                                                <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Your Transaction is Pending</h4>
                                                                @if ($transaction['payment_receipt'])
                                                                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Wait until admin accepts your transaction</p>
                                                                @endif
                                                                @if ($transaction['payment_receipt'] === null)
                                                                    <button onclick="openModal('modal-{{ $transaction['id'] }}')" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Upload Payment Receipt</button>
                                                                @endif
                                                            </li>
                                                            <!-- Modal for Payment Receipt -->
                                                            <div id="modal-{{ $transaction['id'] }}" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75 hidden">
                                                                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                                                                    <div class="flex justify-between items-center">
                                                                        <h3 class="text-lg font-semibold">Upload Payment Receipt</h3>
                                                                        <button onclick="closeModal('modal-{{ $transaction['id'] }}')" class="text-gray-500 hover:text-gray-700">&times;</button>
                                                                    </div>
                                                                    <form action="{{ route('upload.receipt', $transaction['id']) }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="mt-4">
                                                                            <label for="receipt" class="block text-sm font-medium text-gray-700">Upload Image</label>
                                                                            <input type="file" name="receipt" id="receipt" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                                                                        </div>
                                                                        <div class="mt-6 flex justify-end">
                                                                            <button type="button" onclick="closeModal('modal-{{ $transaction['id'] }}')" class="mr-2 bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                                                                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Send</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @elseif ($transaction['status'] === 'packing')
                                                            <li class="mb-10 ms-6">
                                                                <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-700 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                                    <svg class="h-4 w-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                                                    </svg>
                                                                </span>
                                                                <h4 class="mb-0.5 text-base font-semibold text-blue-700 dark:text-white">Your Transaction was Accepted</h4>
                                                            </li>

                                                            <li class="mb-10 ms-6">
                                                                <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18v14H3V5zm15 2H6v2h12V7zm-1 4H7v2h10v-2zm-2 4H9v2h6v-2z"/>
                                                                    </svg>
                                                                </span>
                                                                <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Your Order is Being Packed</h4>
                                                            </li>
                                                        @elseif ($transaction['status'] === 'shipment')
                                                            <li class="mb-10 ms-6">
                                                                <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-700 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                                    <svg class="h-4 w-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                                                    </svg>
                                                                </span>
                                                                <h4 class="mb-0.5 text-base font-semibold text-blue-700 dark:text-white">Your Transaction was Accepted</h4>
                                                            </li>

                                                            <li class="mb-10 ms-6">
                                                                <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-700 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                                    <svg class="h-4 w-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                                                    </svg>
                                                                </span>
                                                                <h4 class="mb-0.5 text-base font-semibold text-blue-700 dark:text-white">Your Order is Being Packed</h4>
                                                            </li>

                                                            <li class="mb-10 ms-6">
                                                                <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4.5 10 1.76 1.76 4.15-4.15m8.47 5.86h-7a2 2 0 0 0-2 2v5h9v-5a2 2 0 0 0-2-2zm-3-7a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"/>
                                                                    </svg>
                                                                </span>
                                                                <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Your Order is on the Way</h4>
                                                            </li>
                                                        @else
                                                            <li class="mb-10 ms-6">
                                                                <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-700 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                                    <svg class="h-4 w-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                                                    </svg>
                                                                </span>
                                                                <h4 class="mb-0.5 text-base font-semibold text-blue-700 dark:text-white">Your Transaction was Accepted</h4>
                                                            </li>

                                                            <li class="mb-10 ms-6">
                                                                <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-700 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                                    <svg class="h-4 w-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                                                    </svg>
                                                                </span>
                                                                <h4 class="mb-0.5 text-base font-semibold text-blue-700 dark:text-white">Your Order is Being Packed</h4>
                                                            </li>

                                                            <li class="mb-10 ms-6">
                                                                <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-700 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                                    <svg class="h-4 w-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                                                    </svg>
                                                                </span>
                                                                <h4 class="mb-0.5 text-base font-semibold text-blue-700 dark:text-white">Your Order is on the Way</h4>
                                                            </li>

                                                            <li class="mb-10 ms-6">
                                                                <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-700 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                                    <svg class="h-4 w-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                                                    </svg>
                                                                </span>
                                                                <h4 class="mb-0.5 text-base font-semibold text-blue-700 dark:text-white">Your Order has been Delivered</h4>
                                                            </li>
                                                        @endif
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endif
                        @endforeach
                        @foreach($completedTransactions as $transaction)
                            <!-- Card Start -->
                            <div class="bg-white rounded-lg shadow-md p-4 mb-6 transition-transform transform hover:scale-105 cursor-pointer w-[600px]" onclick="toggleDetails('details-{{ $transaction['id'] }}')">
                                <!-- Card Summary Start -->
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full inline-block mb-2">Completed</span>
                                        <h2 class="text-lg font-semibold">Transaction ID: {{ $transaction['id'] }}</h2>
                                        <p class="text-gray-800 font-semibold">Total: Rp{{ number_format($transaction['grand_total'], 2) }}</p>
                                    </div>
                                </div>
                                <!-- Card Summary End -->
                
                                <!-- Card Details Start -->
                                <div id="details-{{ $transaction['id'] }}" class="hidden mt-4">
                                    <div class="border-t border-gray-200 pt-4">
                                        <!-- Product Item Start -->
                                        <div class="flex flex-wrap -mx-4">
                                            @foreach($transaction['products'] as $product)
                                            <div class="w-1/3 px-4 mb-4">
                                                <div class="bg-gray-100 p-4 rounded">
                                                    <h3 class="text-lg font-medium">{{ $product['name'] }}</h3>
                                                    <p class="text-gray-500">Quantity: {{ $product['quantity'] }}</p>
                                                    <p class="text-gray-500">Price: Rp{{ number_format($product['price'], 2) }}</p>
                                                    <p class="text-gray-800 font-semibold">Rp{{ number_format($product['total_price'], 2) }}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <!-- Product Item End -->
                
                                        <div class="mt-4">
                                            <div class="flex justify-between text-gray-700">
                                                <p>Subtotal:</p>
                                                <p>Rp{{ number_format($transaction['subtotal'], 2) }}</p>
                                            </div>
                                            <div class="flex justify-between text-gray-700">
                                                <p>Shipping Cost:</p>
                                                <p>Rp{{ number_format($transaction['shipping_cost'], 2) }}</p>
                                            </div>
                                            <div class="flex justify-between text-gray-700">
                                                <p>Service Fee:</p>
                                                <p>Rp{{ number_format($transaction['service_fee'], 2) }}</p>
                                            </div>
                                            <div class="flex justify-between font-semibold text-gray-900 mt-2">
                                                <p>Grand Total:</p>
                                                <p>Rp{{ number_format($transaction['grand_total'], 2) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Details End -->
                            </div>
                            <!-- Card End -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>                
        <!--/page content-->

    </div>
    <!--/Body wrapper-->


    <!--Scripts-->
    <script src="./assets/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#confirmOrderBtn').on('click', function(event) {
                event.preventDefault();
                $('#confirmModal').removeClass('hidden');
                $('#confirmModal').data('transaction-id', $(this).data('transaction-id'));
            });
    
            $('#cancelBtn').on('click', function() {
                $('#confirmModal').addClass('hidden');
            });
    
            $('#confirmBtn').on('click', function() {
                var transactionId = $('#confirmModal').data('transaction-id');
                $.ajax({
                    url: "{{ url('transaction/update-status') }}/" + transactionId,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: 'completed'
                    },
                    success: function(response) {
                        $('#confirmModal').addClass('hidden');
                        window.location.href = "{{ route('transaction') }}";
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        function toggleDetails(id) {
            $('#' + id).slideToggle();
        }
    </script>
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }
    
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }
    </script>   
</body>
</html>