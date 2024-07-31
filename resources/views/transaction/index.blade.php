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
                                                                <dt class="font-normal text-gray-500 dark:text-gray-400">Shipping Cost</dt>
                                                                <dd class="text-base font-medium text-green-500">Rp. {{ number_format($transaction['shipping_cost'], 0, ',', '.') }}</dd>
                                                            </dl>
                                                            <dl class="flex items-center justify-between gap-4">
                                                                <dt class="font-normal text-gray-500 dark:text-gray-400">Service Fee</dt>
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
                                                                    <button onclick="openModal({{ $transaction['id'] }})" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-2">Upload Bukti Bayar</button>
                                                                @endif
                                                            </li>
                                                            <!-- Modal for Payment Receipt -->
                                                            <div id="uploadModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
                                                                <div class="bg-white p-6 rounded-lg">
                                                                    <h2 class="text-lg font-bold mb-4">Upload Bukti Bayar</h2>
                                                                    <input type="file" id="payment_receipt">
                                                                    <button id="sendButton" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Send</button>
                                                                    <button onclick="closeModal()" class="bg-red-500 text-white px-4 py-2 rounded-md mt-4">Cancel</button>
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
                                                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Wait until we packed your order</p>
                                                            </li>
                                                        @elseif ($transaction['status'] === 'shipping')
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
                                                                <h4 class="mb-0.5 text-base font-semibold text-blue-700 dark:text-white">Your Order is already Packed</h4>
                                                            </li>

                                                            <li class="mb-10 ms-6">
                                                                <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                                        <g id="SVGRepo_iconCarrier">
                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1 6C1 4.89543 1.89543 4 3 4H14C15.1046 4 16 4.89543 16 6V7H19C21.2091 7 23 8.79086 23 11V12V15V17C23.5523 17 24 17.4477 24 18C24 18.5523 23.5523 19 23 19H22H18.95C18.9828 19.1616 19 19.3288 19 19.5C19 20.8807 17.8807 22 16.5 22C15.1193 22 14 20.8807 14 19.5C14 19.3288 14.0172 19.1616 14.05 19H7.94999C7.98278 19.1616 8 19.3288 8 19.5C8 20.8807 6.88071 22 5.5 22C4.11929 22 3 20.8807 3 19.5C3 19.3288 3.01722 19.1616 3.05001 19H2H1C0.447715 19 0 18.5523 0 18C0 17.4477 0.447715 17 1 17V6ZM16.5 19C16.2239 19 16 19.2239 16 19.5C16 19.7761 16.2239 20 16.5 20C16.7761 20 17 19.7761 17 19.5C17 19.2239 16.7761 19 16.5 19ZM16.5 17H21V15V13H19C18.4477 13 18 12.5523 18 12C18 11.4477 18.4477 11 19 11H21C21 9.89543 20.1046 9 19 9H16V17H16.5ZM14 17H5.5H3V6H14V8V17ZM5 19.5C5 19.2239 5.22386 19 5.5 19C5.77614 19 6 19.2239 6 19.5C6 19.7761 5.77614 20 5.5 20C5.22386 20 5 19.7761 5 19.5Z" fill="#000000"></path> 
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                                <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Shipping to Hub</h4>
                                                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Your order is being shipped to the nearest delivery hub.</p>
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
                                                                <h4 class="mb-0.5 text-base font-semibold text-blue-700 dark:text-white">Your Order is already Packed</h4>
                                                            </li>

                                                            <li class="mb-10 ms-6">
                                                                <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-blue-700 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                                    <svg class="h-4 w-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                                                                    </svg>
                                                                </span>
                                                                <h4 class="mb-0.5 text-base font-semibold text-blue-700 dark:text-white">Shipping to Hub Completed</h4>
                                                            </li>

                                                            <li class="mb-10 ms-6">
                                                                <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-white ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                                    <svg fill="#000000" height="200px" width="200px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 491.52 491.52" xml:space="preserve">
                                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                                                        <g id="SVGRepo_iconCarrier">
                                                                            <g>
                                                                                <g>
                                                                                    <path d="M102.4,368.64c-34.816,0-61.44,26.624-61.44,61.44c0,34.816,26.624,61.44,61.44,61.44s61.44-26.624,61.44-61.44 C163.84,395.264,137.216,368.64,102.4,368.64z M102.4,450.56c-12.288,0-20.48-8.192-20.48-20.48s8.192-20.48,20.48-20.48 c12.288,0,20.48,8.192,20.48,20.48S114.688,450.56,102.4,450.56z"></path>
                                                                                </g>
                                                                            </g>
                                                                            <g>
                                                                                <g>
                                                                                    <path d="M430.08,368.64c-34.816,0-61.44,26.624-61.44,61.44c0,34.816,26.624,61.44,61.44,61.44c34.816,0,61.44-26.624,61.44-61.44 C491.52,395.264,464.896,368.64,430.08,368.64z M430.08,450.56c-12.288,0-20.48-8.192-20.48-20.48s8.192-20.48,20.48-20.48 s20.48,8.192,20.48,20.48S442.368,450.56,430.08,450.56z"></path>
                                                                                </g>
                                                                            </g>
                                                                            <g>
                                                                                <g>
                                                                                    <path d="M81.92,163.84H20.48C8.192,163.84,0,172.032,0,184.32v102.4c0,12.288,8.192,20.48,20.48,20.48h61.44 c12.288,0,20.48-8.192,20.48-20.48v-102.4C102.4,172.032,94.208,163.84,81.92,163.84z M61.44,266.24H40.96V204.8h20.48V266.24z"></path>
                                                                                </g>
                                                                            </g>
                                                                            <g>
                                                                                <g>
                                                                                    <path d="M184.32,0c-34.816,0-61.44,26.624-61.44,61.44s26.624,61.44,61.44,61.44s61.44-26.624,61.44-61.44S219.136,0,184.32,0z M184.32,81.92c-12.288,0-20.48-8.192-20.48-20.48c0-12.288,8.192-20.48,20.48-20.48s20.48,8.192,20.48,20.48 C204.8,73.728,196.608,81.92,184.32,81.92z"></path>
                                                                                </g>
                                                                            </g>
                                                                            <g>
                                                                                <g>
                                                                                    <path d="M307.2,202.752V143.36c0-12.288-8.192-20.48-20.48-20.48h-45.056c-8.192-24.576-30.72-40.96-57.344-40.96 c-34.816,0-61.44,26.624-61.44,61.44v143.36c0,12.288,8.192,20.48,20.48,20.48h14.336c4.096,2.048,6.144,4.096,6.144,6.144 c0,8.192-2.048,16.384-4.096,24.576l-10.24,24.576c-6.144,12.288,4.096,26.624,18.432,26.624H286.72 c14.336,0,24.576-14.336,18.432-28.672l-40.96-108.544c-4.096-16.384-20.48-28.672-38.912-28.672h61.44 C299.008,223.232,307.2,215.04,307.2,202.752z M266.24,184.32H204.8c-12.288,0-20.48,8.192-20.48,20.48v40.96 c0,12.288,8.192,20.48,20.48,20.48h20.48L256,348.16h-57.344c4.096-12.288,6.144-24.576,6.144-34.816 c0-22.528-16.384-40.96-38.912-47.104h-2.048V143.36c0-12.288,8.192-20.48,20.48-20.48s20.48,8.192,20.48,20.48 c0,12.288,8.192,20.48,20.48,20.48h40.96V184.32z"></path>
                                                                                </g>
                                                                            </g>
                                                                            <g>
                                                                                <g>
                                                                                    <path d="M415.744,247.808c-4.096-24.576-10.24-38.912-26.624-49.152V143.36c0-12.288-8.192-20.48-20.48-20.48h-81.92 c-12.288,0-20.48,8.192-20.48,20.48v61.44c0,12.288,8.192,20.48,20.48,20.48v122.88h-88.064 c4.096-12.288,6.144-24.576,6.144-34.816c0-22.528-16.384-40.96-38.912-47.104h-4.096H20.48C8.192,266.24,0,274.432,0,286.72 v102.4c0,34.816,26.624,61.44,61.44,61.44c12.288,0,20.48-8.192,20.48-20.48s8.192-20.48,20.48-20.48 c12.288,0,20.48,8.192,20.48,20.48s8.192,20.48,20.48,20.48h184.32c8.192,0,16.384-6.144,18.432-14.336 c22.528-59.392,47.104-88.064,69.632-88.064c18.432,0,30.72,6.144,38.912,14.336c12.288,12.288,34.816,4.096,34.816-14.336 v-12.288C489.472,292.864,458.752,256,415.744,247.808z M417.792,307.2c-43.008,0-77.824,36.864-104.448,102.4h-153.6 c-8.192-24.576-30.72-40.96-57.344-40.96c-24.576,0-45.056,14.336-55.296,34.816c-4.096-4.096-6.144-8.192-6.144-14.336V307.2 h116.736c4.096,2.048,6.144,4.096,6.144,6.144c0,8.192-2.048,16.384-4.096,24.576l-10.24,24.576 c-6.144,12.288,4.096,26.624,18.432,26.624H307.2c12.288,0,20.48-8.192,20.48-20.48V204.8c0-12.288-8.192-20.48-20.48-20.48 v-20.48h40.96v40.96v6.144c0,8.192,4.096,16.384,12.288,18.432c10.24,4.096,14.336,12.288,20.48,40.96 c2.048,10.24,10.24,16.384,20.48,16.384c18.432,0,32.768,10.24,40.96,22.528C436.224,307.2,425.984,307.2,417.792,307.2z"></path>
                                                                                </g>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                                <h4 class="mb-0.5 text-base font-semibold text-black dark:text-white">Your order is on its way with the courier</h4>
                                                            </li>
                                                            <!-- Button to open modal -->
                                                            <button id="open-modal" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">I Have Received My Order</button>

                                                            <!-- Modal background -->
                                                            <div id="modal-background" class="fixed inset-0 bg-gray-500 bg-opacity-75 z-50 hidden">
                                                                <!-- Modal dialog -->
                                                                <div class="flex items-center justify-center min-h-screen">
                                                                    <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4">
                                                                        <div class="p-6">
                                                                            <h3 class="text-lg font-semibold text-gray-800">Confirm Receipt</h3>
                                                                            <p class="mt-2 text-gray-600">Are you sure you have received your order? This action will mark the order as completed.</p>
                                                                            <div class="mt-4 flex justify-end space-x-2">
                                                                                <button id="confirm-button" class="bg-blue-500 text-white px-4 py-2 rounded">Confirm</button>
                                                                                <button id="cancel-button" class="bg-gray-200 text-gray-800 px-4 py-2 rounded">Cancel</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
            // Show the modal when the button is clicked
            $('#open-modal').on('click', function() {
                $('#modal-background').removeClass('hidden');
            });

            // Hide the modal when the cancel button is clicked
            $('#cancel-button').on('click', function() {
                $('#modal-background').addClass('hidden');
            });

            // Confirm button action
            $('#confirm-button').on('click', function() {
                // Replace this with the actual order ID or other identifying information
                var orderId = 1; // Change this to the actual order ID

                $.ajax({
                    url: '/update-order-status', // Replace with your URL to handle the update
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'), // CSRF token for Laravel
                        order_id: orderId,
                        status: 'completed'
                    },
                    success: function(response) {
                        // Handle success response
                        alert('Order status updated to completed.');
                        $('#modal-background').addClass('hidden');
                        
                        // Redirect to transaction route
                        window.location.href = '/transaction'; // Adjust this URL as needed
                    },
                    error: function(xhr) {
                        // Handle error response
                        alert('Failed to update order status.');
                    }
                });
            });
        });
    </script>
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
        let transactionId;

        function openModal(id) {
            transactionId = id;
            $('#uploadModal').removeClass('hidden');
        }

        function closeModal() {
            $('#uploadModal').addClass('hidden');
        }

        $('#sendButton').click(function() {
            let formData = new FormData();
            let paymentReceipt = $('#payment_receipt')[0].files[0];

            if (paymentReceipt) {
                formData.append('payment_receipt', paymentReceipt);
                formData.append('_token', '{{ csrf_token() }}');

                // Log to see if the file is appended correctly
                console.log('Payment Receipt:', paymentReceipt);

                $.ajax({
                    url: '/upload-receipt/' + transactionId,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        closeModal();
                        location.reload();  // Update this line to refresh part of the page if needed
                    },
                    error: function(response) {
                        console.error('Upload failed:', response);
                        alert('Failed to upload receipt. Please try again.');
                    }
                });
            } else {
                alert('Please select a file to upload.');
            }
        });
    </script>
</body>
</html>