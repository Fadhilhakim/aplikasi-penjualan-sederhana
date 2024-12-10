<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight text-center">
            {{ __('Penjualan') }}
        </h2>
    </x-slot>
    <div class="p-4">
        <div class="relative overflow-x-auto">
            <!-- Tampilkan pesan sukses -->
            @if (session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif

            <!-- Tampilkan pesan error -->
            @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Penjualan -->
            <div class="p-12">
                <form action="/penjualan" method="POST" class="min-w-md mx-auto py-10">
                    @csrf
                    <div>
                        <label for="product_id" class="block mb-2 text-sm font-medium text-gray-900">Pilih
                            Produk:</label>
                        <select name="product_id" id="product_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            required>
                            <option value="">-- Pilih Produk --</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }} (Stok: {{ $product->stock }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900">Jumlah:</label>
                        <input type="number" id="quantity" name="quantity" min="1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            required>
                    </div>
                    <button type="submit">Jual</button>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">Simpan</button>
            </div>
</x-app-layout>

<img src="https://github.com/user-attachments/assets/bb44f600-1baf-4c23-97a5-a10305872318" alt="thumbnail">
