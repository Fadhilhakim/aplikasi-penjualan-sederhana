<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-4xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        <br><b></b>
        <div class="p-4">
            <div class="relative overflow-x-auto ">
                <table class="md:w-md m-auto w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-200">
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
                            <tr class="bg-white border-g dark:border-gray-700 text-gray-500" >
                                <th class="px-6 py-4 text-center">
                                    {{ $prod['id'] }}
                                </th>
                                <td scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $prod['name'] }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $prod['stock'] }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ $prod->sales->sum('quantity') }}
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b bg-gray-50 dark:border-gray-700">
                                <th colspan="4" class="px-6 py-4">
                                    <p class="text-center text-red-900">): Tidak Ada Data.. <a href="/product"
                                            class="underline">Tambahkan data</a></p>
                                </th>

                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="grid grid-cols-3 gap-4 mb-4">

            </div>

</x-app-layout>
