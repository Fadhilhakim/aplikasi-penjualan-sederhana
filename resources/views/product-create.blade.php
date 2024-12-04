<x-layout>
    
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
    
    <div class="p-4 bg-gray-200 max-w-sm m-auto mt-11">
    <h1 class="text-center text-4xl">Tambah Produk Baru</h1>

    <br><br>
    
    <form class="max-w-sm mx-auto" action="/product/store" method="POST">
        @csrf
        <div class="mb-5">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Produk</label>
        <input type="name" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:border-blue-500"  required />
        </div>
        <div class="mb-5">
        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Harga :</label>
        <input type="price" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
        <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Stock :</label>
        <input type="stock" id="stock" name="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:focus:border-blue-500" required />
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
    </form>
    <br>
    <a href="/produk"><button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Keluar</button></a>
</x-layout>