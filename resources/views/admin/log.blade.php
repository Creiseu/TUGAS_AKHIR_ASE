<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard')}}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="py-12">
                <a href="{{ route('admin.dashboard') }}" class="py-2 px-4 bg-slate-700 text-white ml-[55px]">Data Produk</a>
                <a href="" class="py-2 px-4 bg-slate-700 text-white ml-[55px]">Log Transaksi</a>
                <div class="font-['MyCustomFont-Bold']">
                    @foreach ($pivotCheckouts->groupBy('checkout_id') as $index => $items)
                        @php
                            $checkoutId = $index;
                            $checkout = $items->first()->checkout; // Mendapatkan data checkout terkait
                            $user = $checkout->createdBy;
                            $subtotal = $items->sum(function ($item) {
                                return $item->quantity * $item->product->price;
                            });
                        @endphp
                    
                        <div class="card mb-4 p-6 bg-white shadow-lg rounded-lg border border-gray-200">
                            <div class="flex justify-between items-center border-b pb-4 mb-4">
                                <h2 class="text-xl font-semibold text-gray-900">#{{ $index + 1 }} Transaction By: {{ $user->name }}</h2>
                                <p class="text-sm text-gray-500">Transaction ID: {{ $checkoutId }}</p>
                            </div>
                    
                            <div class="flex flex-wrap gap-4 mb-4">
                                @foreach ($items as $item)
                                    <div class="flex-1 min-w-[200px] p-4 bg-gray-100 border border-gray-200 rounded-lg shadow-sm">
                                        <p class="text-sm font-medium text-gray-800">{{ $item->product->name }}</p>
                                        <p class="text-sm text-gray-600">Quantity: {{ $item->quantity }}</p>
                                        <p class="text-sm text-gray-600">Price per Unit: Rp. {{ number_format($item->product->price, 0, ',', '.') }}</p>
                                        <p class="text-sm font-medium text-gray-900">Total Price: Rp. {{ number_format($item->quantity * $item->product->price, 0, ',', '.') }}</p>
                                    </div>
                                @endforeach
                            </div>
                    
                            <div class="border-t pt-4 flex justify-between items-center">
                                <div class="mr-4">
                                    <p class="text-lg font-semibold text-gray-900">Subtotal: Rp. {{ number_format($subtotal, 0, ',', '.') }}</p>
                                    <p class="text-lg font-semibold text-gray-900">Total: Rp. {{ number_format($checkout->grandTotal, 0, ',', '.') }}</p>
                                </div>
                                @if($checkout->payment_receipt)
                                    <div class="flex items-center mr-[400px]">
                                        <a href="{{ asset('storage/' . $checkout->payment_receipt) }}" class="text-blue-700 hover:text-blue-800 hover:underline flex items-center ml-4" target="_blank">
                                            <svg fill="#1d45e7" height="200px" width="15px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve" stroke="#1d45e7"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M387,128c-11.8,0-21.3,9.5-21.3,21.3v213.3c0,58.9-47.7,106.7-106.7,106.7s-106.7-47.8-106.7-106.7v-256 c0-35.3,28.6-64,64-64s64,28.7,64,64V320c0,11.8-9.6,21.3-21.3,21.3s-21.3-9.5-21.3-21.3V149.3c0-11.8-9.6-21.3-21.3-21.3 c-11.8,0-21.3,9.5-21.3,21.3V320c0,35.4,28.6,64,64,64s64-28.6,64-64V106.7C323,47.8,275.2,0,216.3,0S109.7,47.8,109.7,106.7v256 c0,82.5,66.9,149.3,149.3,149.3s149.3-66.9,149.3-149.3V149.3C408.3,137.5,398.8,128,387,128z"></path> </g></svg>
                                            <span class="ml-2">{{$checkout->payment_receipt}}</span>
                                        </a>
                                    </div>
                                @endif
                            </div>                                                                                    
                    
                            <div class="relative mt-4">
                                <select class="status-dropdown bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="Pending" {{ $items->first()->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Packing" {{ $items->first()->status == 'packing' ? 'selected' : '' }}>Packing</option>
                                    <option value="Shipping" {{ $items->first()->status == 'shipping' ? 'selected' : '' }}>Shipping</option>
                                    <option value="Delivered" {{ $items->first()->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                </select>
                                <input type="hidden" class="checkout-id" value="{{ $checkoutId }}">                                    
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let oldStatus;
    
            $('.status-dropdown').focus(function() {
                oldStatus = $(this).val();  // Store the current status
            }).change(function() {
                let newStatus = $(this).val().toLowerCase();  // Convert the new status to lowercase
                let capitalizedNewStatus = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);  // Capitalize the first letter
                let checkoutId = $(this).siblings('.checkout-id').val();
    
                // Check if the new status is different from the old status
                if (newStatus !== oldStatus.toLowerCase()) {
                    let confirmMessage = `Apakah anda yakin ingin merubah status "${oldStatus}" menjadi "${capitalizedNewStatus}" pada id transaksi ${checkoutId}?`;
    
                    if (confirm(confirmMessage)) {
                        $.ajax({
                            url: '/update-status/' + checkoutId,  // Sertakan checkoutId dalam URL
                            type: 'POST',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                status: newStatus
                            },
                            success: function(response) {
                                console.log('Update successful:', response);
                                location.reload();  // Refresh halaman untuk melihat status yang diperbarui
                            },
                            error: function(xhr) {
                                console.log('Error updating status:', xhr.responseText);
                            }
                        });
                    } else {
                        // Reset dropdown to previous value if user cancels
                        $(this).val(oldStatus);
                    }
                }
            });
        });
    </script>
</x-app-layout>
