<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight text-center">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div x-data="{ open: true }" x-show="open"
            class="bg-green-500 border border-gray-300 p-4 rounded-lg relative w-full text-gray-50">
            <button @click="open = !open" type="button"
                class="text-gray-50 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                aria-label="Close">
                <svg class="w-5 h-5 mr-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                {{ session('success') }}
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="p-4">

        <p class="text-lg font-bold mb-4 text-center">{{ $title }} {{ @$product['name'] }}</p>


        <form class="block p-4 mx-auto bg-slate-300 xl:max-w-4xl rounded-lg" action="{{ $action }}" method="POST">
            @csrf
            
            <div class="md:flex justify-between align-top">
                <div class="px-4 w-full">
                    <div class="my-2">
                        <!-- Nama Produk -->
                        <label for="name" class="py-2 text-sm font-medium text-gray-900">Nama Produk</label>
                        <input type="text" id="name" name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required value="{{ @$product['name'] }}" />
                    </div>
                    <!-- Harga -->
                    <div class="mb-2">
                        <label for="price" class="py-2 text-sm font-medium text-gray-900">Harga</label>
                        <input type="text" id="price" name="price"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required value="{{ @$product['price'] }}" />
                    </div>
                    <!-- Stock -->
                    <div class="mb-2">
                        <label for="stock" class="py-2 text-sm font-medium text-gray-900">Stock</label>
                        <input type="text" id="stock" name="stock"
                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required value="{{ @$product['stock'] }}" />
                    </div>
                    <!-- image -->
                    <div class="mb-2">
                        <label for="image_path" class="py-2 text-sm font-medium text-gray-900">URL Gambar</label>
                        <input type="text" id="image_path" name="image_path"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required value="{{ @$product['image_path'] }}" pattern="[Hh][Tt][Tt][Pp][Ss]?:\/\/(?:(?:[a-zA-Z\u00a1-\uffff0-9]+-?)*[a-zA-Z\u00a1-\uffff0-9]+)(?:\.(?:[a-zA-Z\u00a1-\uffff0-9]+-?)*[a-zA-Z\u00a1-\uffff0-9]+)*(?:\.(?:[a-zA-Z\u00a1-\uffff]{2,}))(?::\d{2,5})?(?:\/[^\s]*)?" />
                    </div>
                </div>
                <div class="px-4 w-full">
                    <!-- DISCOUNT -->
                    <div x-data="{ isDiscounted: false }">
                        <!-- Dropdown untuk memilih opsi -->
                        <div class="mb-2">
                            <label for="discount" class="py-1 block text-sm font-medium text-gray-900">
                                Diskon
                            </label>
                            <select id="discount" name="discount"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                x-model="isDiscounted">
                                <option value="N" selected>Tidak</option>
                                <option value="Y">Ya</option>
                            </select>
                        </div>
        
                        <!-- Input field yang muncul berdasarkan pilihan -->
                        <div x-show="isDiscounted === 'Y'" class="mb-2">
                            <label for="discount_value" class=" text-sm font-medium text-gray-900">Diskon Persen</label>
                            <input type="text" id="discount_value" name="discount_value"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ @$product['discount_value'] }}" />
                        </div>
                    </div>
                    <!-- Deskripsi -->
                    <div class="mb-2">
                        <label for="description" class=" text-sm font-medium text-gray-900">Deskripsi Produk</label>
                        <input type="text" id="description" name="description"
                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required value="{{ @$product['description'] }}"  />
                    </div>
                    <!-- Button -->
                    <div>
                        <div class="flex justify-between gap-3">
                            <button type="submit"
                                class="mt-2 w-9/12 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-2.5 py-2.5 text-center flex items-center justify-center">
                                <svg class="text-gray-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7.414A2 2 0 0 0 20.414 6L18 3.586A2 2 0 0 0 16.586 3H5Zm3 11a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6H8v-6Zm1-7V5h6v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z"
                                        clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M14 17h-4v-2h4v2Z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-2 font-bold">Upload Produk</span>
                            </button>
                            <a href="/product" 
                                class="mt-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium text-sm w-5/12 px-2.5 py-2.5 text-center flex items-center justify-center">
                                Batal
                            </a>
                        </div>
                    </div>
                </div>
        </div>

        </form>

        <br>

        <form class="max-w-sm my-3 mb-5 mx-auto xl:mx-0" method="GET" action="{{ route('product.search') }}">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Cari</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" name="search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cari Id, Nama, Stock atau harga" value="{{ @$search }}" required />

                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Cari</button>

            </div>
            @if (@$search)
                <br><br>
                <a href="/product"
                    class="text-white w-full bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">
                    Kembali
                </a>
            @endif
        </form>

        <div class="relative overflow-x-auto w-full">
            <table class="m-auto w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="md:px-6 px-3 py-3">
                            ID
                        </th>
                        <th scope="col" class="md:px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="md:px-6 py-3">
                            Stok
                        </th>
                        <th scope="col" class="md:px-6 py-3">
                            Harga
                        </th>
                        <th scope="col" class="md:px-6 py-3 hidden md:block">
                            Tanggal Masuk
                        </th>
                        <th scope="col" class="md:px-2 py-2 px-3 text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                @foreach ($sales as $sale)
                    <tbody>
                        <tr class="bg-white border-b">
                            <th class="md:px-6 md:py-4 px-3 ">
                                {{ $sale['id'] }}   
                            </th>
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            </p>
                            <ul class="flex items-center">
                                <li>
                                    <img class="float-left w-12 mr-3" src="{{ $sale['image_path'] }}" alt="img">
                                </li>
                                <li class="text-md">
                                    {{ Str::limit($sale['name'], 30, '...') }}
                                </li>
                            </ul>
                            </td>
                            <td class="md:px-6 md:py-4">
                                {{ $sale['stock'] }}
                            </td>
                            <td class="md:px-6 md:py-4">
                                {{ $sale['price'] }}
                            </td>
                            <td class="md:px-6 md:py-4 hidden md:block">
                                {{ $sale->created_at->diffForHumans() }}
                            </td>
                            <td class="md:px-6 md:py-4 text-center px-3">                                
                                <div class="flex mx-auto w-full gap-2">
                                        <form action="/product/edit/{{ $sale->id }}" method="GET" class="w-1/2 bg-green-700"
                                            onsubmit="return confirm('Yakin ingin mengubah produk ini?');">
                                            @csrf
                                            <button type="submit"
                                                class="text-white text-center p-2">Edit</button>
                                        </form>                                 
                                        <form action="/product/{{ $sale->id }}" method="POST" class="w-1/2 bg-red-900"
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-white text-center p-2">Hapus</button>
                                        </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            <br>
        </div>
</x-app-layout>
