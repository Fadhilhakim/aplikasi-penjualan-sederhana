<div class="gb-gray-700">

<x-layout>
    <h1 class="text-center text-4xl">Dashboard</h1>
    <div class="p-4">
        

<div class="relative overflow-x-auto ">
    <table class="md:w-7/12 m-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Stok
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Terjual
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($prods as $prod)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th class="px-6 py-4 text-center">
                    {{ $prod['id'] }}
                </th>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $prod['name']}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $prod['stock']}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{ $prod->sales->sum('quantity') }}
                </td>
            </tr>
            @empty
                    <tr class="border-b bg-gray-50 dark:border-gray-700">
                        <th colspan="4" class="px-6 py-4">
                            <p class="text-center text-red-900">): Tidak Ada Data.. <a href="/product/create" class="underline">Tambahkan data</a></p>
                        </th>
                        
                    </tr>
            @endforelse 
        </tbody>
    </table>
</div>

       <div class="grid grid-cols-3 gap-4 mb-4">
        
       </div>
</x-layout>

</div>
