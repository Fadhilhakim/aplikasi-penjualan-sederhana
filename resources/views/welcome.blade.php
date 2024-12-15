<x-app-layout>
    
    @if (session('success'))
        <x-success>
            {{ session('success') }}
        </x-success>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-error>
                {{ $error }}
            </x-error>
        @endforeach
    @endif
    
    <section class="p-4">
        <br><br>
        <h2 class="p-2 text-3xl font-extrabold">Dashboard Display</h2>
        <div class="p-8 bg-white">
            @foreach ($displays as $display)
            <form action="{{ route('display.update', $display->id) }}" method="post">
                @csrf
                <div class="grid grid-cols-3 items-center gap-4 mb-4">
                    <label for="title" class="text-sm font-medium text-gray-900">Title Dashboard</label>
                    <input type="text" id="title" name="title"
                        class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                        required value="{{ $display->title }}" />
                </div>
                <div class="grid grid-cols-3 items-center gap-4 mb-4">
                    <label for="description" class="text-sm font-medium text-gray-900">Description</label>
                    <input type="text" id="description" name="description"
                        class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                        required value="{{ $display->description }}" />
                </div>
                <div class="grid grid-cols-3 items-center gap-4 mb-4">
                    <label for="bg_url" class="text-sm font-medium text-gray-900">Background URL</label>
                    <input type="text" id="bg_url" name="bg_url"
                        class="col-span-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full p-2.5"
                        required value="{{ $display->bg_url }}" />
                </div>
                <div class="items-center w-52">
                    <button type="submit"
                        class="col-span-2 text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full px-2.5 py-2.5 text-center flex items-center justify-center">
                        <svg class="text-gray-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V7.414A2 2 0 0 0 20.414 6L18 3.586A2 2 0 0 0 16.586 3H5Zm3 11a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6H8v-6Zm1-7V5h6v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M14 17h-4v-2h4v2Z" clip-rule="evenodd" />
                        </svg>
                        <p class="ml-1 font-extrabold">Simpan</p>
                    </button>
                </div>
            </form>
            @endforeach
        </div>
    </section>
        <br><br>
        <div class="p-4">
            <h2 class="p-2 text-3xl font-extrabold">Produk yang Tersedia</h2>
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
                                    <ul class="flex items-center">
                                        <li>
                                            <img class="float-left w-12 mr-3" src="{{ $prod['image_path'] }}" alt="img">
                                        </li>
                                        <li class="text-md">
                                            {{ Str::limit($prod['name'], 60, '...') }}
                                        </li>
                                    </ul>
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
