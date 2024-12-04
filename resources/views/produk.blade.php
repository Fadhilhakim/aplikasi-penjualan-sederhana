<x-layout>
    @if (session('success'))
    <div x-data="{ open: true }" x-show="open" class="bg-red-900 border border-gray-300 p-4 rounded-lg relative w-sm text-gray-50">
        <button
            @click="open = true"
            type="button"
            class="text-gray-50 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
            aria-label="Close"> Data Berhasil Dihapus
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
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
    <h1 class="text-center text-4xl">Produk</h1>
    <div class="p-4">
        
        <a href="/product/create" class="grid m-auto">
            <button type="button" class="text-white right-0 m-auto bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Tambah Data
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
                </button></a>
<br><br>

<div class="relative overflow-x-auto">
    <table class="md:w-9/12 m-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Stok
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Masuk
                </th>
                <th scope="col" class="px-2 py-2 text-center">
                    Aksi
                </th>
            </tr>
        </thead>
        @foreach ($sales as $sale)
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th class="px-6 py-4">
                    {{ $sale['id'] }}
                </th>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $sale['name']}}
                </td>
                <td class="px-6 py-4">
                    {{ $sale['stock']}}
                </td>
                <td class="px-6 py-4">
                    {{ $sale->created_at->diffForHumans() }}
                </td>
                <td class="px-6 py-4 text-center">
                    <form action="/product/{{ $sale->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-900 text-white text-center p-2 m-auto">Hapus</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <br>
        
</div>
</x-layout>