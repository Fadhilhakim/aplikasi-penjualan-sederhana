<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme-mode="dark">

<head>
    <meta charset="utf-8 ">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Aplikasi Penjualan Sederhana') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased light:bg-gray-200 light:text-gray900">
    <div>

        
        <div x-data="{ open: false }">
        <!-- Tombol Toggle -->
        <button @click="open = !open" aria-expanded="open" aria-controls="default-sidebar" type="button"
            class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd"
                    d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                </path>
            </svg>
        </button>

            <!-- Sidebar -->
            <aside x-show="open" 
                x-transition:enter="transform transition-transform ease-in-out duration-300"
                x-transition:enter-start="-translate-x-full" 
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition-transform ease-in-out duration-300"
                x-transition:leave-start="translate-x-0" 
                x-transition:leave-end="-translate-x-full" id="default-sidebar"
                class="fixed top-0 left-0 z-40 w-64 h-screen " aria-label="Sidebar">
                <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
                    <button @click="open = !open" aria-controls="default-sidebar" type="button"
                        class="inline-flex items-center p-2 mt-2 mb-2 ms-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>

                    
                    
                    <ul class="space-y-2 font-medium">
                        <li>
                            <a href="/"
                                class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 22 21">
                                    <path
                                        d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                    <path
                                        d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                                </svg>
                                <span class="ms-3">Dashboard</span>
                            </a>
                        </li>
                        <a href="/penjualan"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 18">
                                <path
                                    d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Penjualan</span>
                        </a>
                        </li>
                        <li>
                            <a href="/product"
                                class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 18 20">
                                    <path
                                        d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                                </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">Produk</span>
                            </a>
                        </li>
                        <li>
                            <a href="/history"
                                class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">

                                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                                  </svg>
                                <span class="flex-1 ms-3 whitespace-nowrap">History</span>
                            </a>
                        </li>
                        <li>
                            @include('layouts.navigation')
                        </li>

                    </ul>
                </div>
            </aside>
        </div>
        <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen hidden md:block" aria-label="Sidebar">
            <div class="mt-20 sm:pt-0">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="/"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    <a href="/penjualan"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 20 18">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Penjualan</span>
                    </a>
                    </li>
                    <li>
                        <a href="/product"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 20">
                                <path
                                    d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Produk</span>
                        </a>
                    </li>
                    <li>
                        <a href="/history"
                            class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
                              </svg>
                              
                            <span class="flex-1 ms-3 whitespace-nowrap">History</span>
                        </a>
                    </li>
                    <li>
                        @include('layouts.navigation')
                    </li>

                </ul>
            </div>
        </aside>

        <div class="p-4 md:ml-64">
            {{ $slot }}
        </div>
    </div>



    </div>
</body>

</html>
