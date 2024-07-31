<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard')}}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div class="py-12">
                <a href="" class="py-2 px-4 bg-slate-700 text-white ml-[55px]">Data Produk</a>
                <a href="{{ route('logTransaction') }}" class="py-2 px-4 bg-slate-700 text-white ml-[55px]">Log Transaksi</a>
                <a href="{{ route('getAllUsers') }}" class="py-2 px-4 bg-slate-700 text-white ml-[55px]">Data User</a>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.3)]">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <a href="{{ route('products.create') }}" class="btn btn-md btn-success mb-3 bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">ADD PRODUCT</a>

                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tag</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stocks</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @forelse($product as $index => $products)
                                            <tr class="hover:bg-gray-100">
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <img src="{{ asset('storage/' . $products->image) }}" class="w-24 h-24 object-cover rounded-md mx-auto" />
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $products->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $products->tag }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $products->description }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $products->category }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $products->stocks }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $products->price }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $products->creator->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $products->id) }}" method="POST">
                                                        <a href="{{ route('products.show', $products->id) }}" class="bg-teal-400 text-white px-4 py-2 rounded-md hover:bg-teal-500">SHOW</a>
                                                        <a href="{{ route('products.edit', $products->id) }}" class="bg-orange-400 text-white px-4 py-2 rounded-md hover:bg-orange-500">EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">DELETE</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="px-6 py-4 text-center text-gray-500">No products available</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                @if(session('success'))
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil',
                                            text: '{{ session('success') }}',
                                        });
                                    </script>
                                @endif

                                @if(session('error'))
                                    <script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: '{{ session('error') }}',
                                        });
                                    </script>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
