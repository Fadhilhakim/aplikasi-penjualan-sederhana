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

        <p class="text-lg font-bold mb-4 text-center xl:text-left">Tambah Data Produk</p>
        <form class="mx-auto space-y-4 xl:flex w-full hidden" action="/product/store" method="POST">
            @csrf

            <table class="w-full ">
                <tr>
                    <td>
                        <!-- Nama Produk -->
                        <div class="flex items-center mr-4">
                            <label for="name" class="text-sm font-medium text-gray-900">Nama Produk : </label>
                            <input type="text" id="name" name="name"
                                class="w-full flex-1 ml-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                                required />
                        </div>
                    </td>
                    <td>
                        <!-- Harga -->
                        <div class="flex items-center mr-4">
                            <label for="price" class="text-sm font-medium text-gray-900">Harga : </label>
                            <input type="text" id="price" name="price"
                                class="w-full ml-2 flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5"
                                required />
                        </div>
                    </td>
                    <td>
                        <!-- Stock -->
                        <div class="flex items-center mr-4">
                            <label for="stock" class="text-sm font-medium text-gray-900">Stock : </label>
                            <input type="text" id="stock" name="stock"
                                class="w-full ml-2 flex-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5"
                                required />
                        </div>
                    </td>
                    <td>
                        <!-- Button -->
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-2.5 py-2.5 text-center flex items-center justify-center">
                            <svg class="text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7.414A2 2 0 0 0 20.414 6L18 3.586A2 2 0 0 0 16.586 3H5Zm3 11a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6H8v-6Zm1-7V5h6v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z"
                                    clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M14 17h-4v-2h4v2Z" clip-rule="evenodd" />
                            </svg>
                        </button>

                    </td>
                </tr>
            </table>
        </form>


        {{-- input tampilan mobilee --}}

        <form class="max-w-sm mx-auto space-y-4 xl:hidden" action="/product/store" method="POST">
            @csrf
            <!-- Nama Produk -->
            <div class="grid grid-cols-3 items-center gap-4">
                <label for="name" class="text-sm font-medium text-gray-900">Nama Produk</label>
                <input type="text" id="name" name="name"
                    class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required />
            </div>
            <!-- Harga -->
            <div class="grid grid-cols-3 items-center gap-4">
                <label for="price" class="text-sm font-medium text-gray-900">Harga</label>
                <input type="text" id="price" name="price"
                    class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required />
            </div>
            <!-- Stock -->
            <div class="grid grid-cols-3 items-center gap-4">
                <label for="stock" class="text-sm font-medium text-gray-900">Stock</label>
                <input type="text" id="stock" name="stock"
                    class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required />
            </div>
            <!-- Button -->
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-2.5 py-2.5 text-center flex items-center justify-center">
                <svg class="text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7.414A2 2 0 0 0 20.414 6L18 3.586A2 2 0 0 0 16.586 3H5Zm3 11a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6H8v-6Zm1-7V5h6v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z"
                        clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M14 17h-4v-2h4v2Z" clip-rule="evenodd" />
                </svg>
            </button>

        </form>

        <br>

        <form class="max-w-sm my-3 mb-5" method="GET" action="/product/search">
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
                    placeholder="Search" value="{{ @$search }}" required />

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
                        <th scope="col" class="md:px-6 py-3 hidden md:block">
                            Tanggal Masuk
                        </th>
                        <th scope="col" class="md:px-2 py-2 text-center px-3 ">
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
                                {{ $sale['name'] }}
                            </td>
                            <td class="md:px-6 md:py-4">
                                {{ $sale['stock'] }}
                            </td>
                            <td class="md:px-6 md:py-4 hidden md:block">
                                {{ $sale->created_at->diffForHumans() }}
                            </td>
                            <td class="md:px-6 md:py-4 text-center px-3 ">
                                <form action="/product/{{ $sale->id }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-900 text-white text-center p-2 m-auto">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            <br>

        </div>
</x-app-layout>
