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
                    @foreach ($pivotCheckouts as $pivotCheckout)
                        <div class="mb-4 px-4 py-2 shadow-xl">
                            <p>{{ $loop->iteration }}. Nama produk: {{ $pivotCheckout->product->name }}</p>
                            <p>Total Produk yang dibeli: {{ $pivotCheckout->quantity }}</p>
                            <p>Total Dibayar: Rp. {{ number_format($pivotCheckout->checkout->grandTotal, 0, ',', '.') }}</p>
                            <p>Dibeli Oleh: {{ $pivotCheckout->checkout->createdBy->name }}</p>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
