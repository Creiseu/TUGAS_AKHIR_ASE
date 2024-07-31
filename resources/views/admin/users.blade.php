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
                <a href="{{ route('logTransaction') }}" class="py-2 px-4 bg-slate-700 text-white ml-[55px]">Log Transaksi</a>
                <a href="{{ route('getAllUsers') }}" class="py-2 px-4 bg-slate-700 text-white ml-[55px]">Data User</a>
                <div class="container mx-auto px-4 py-6">
                    <h1 class="text-2xl font-bold mb-6">Data Users</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($users as $user)
                        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                            <div class="p-6">
                                <h2 class="text-xl font-semibold mb-2">{{ $user->name }}</h2>
                                <p class="text-gray-600 mb-2">Email: {{ $user->email }}</p>
                                <p class="text-gray-600 mb-2">User Type: {{ $user->userType }}</p>
                                <p class="text-gray-500">Join At: {{ $user->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
