<x-app-layout>
  <div class="p-4">
    <div class="relative overflow-x-auto">
      <!-- Tampilkan pesan sukses -->
      @if (session('success'))
          <x-success>
              {{ session('success') }}
          </x-success>
      @endif
      @if (session('error'))
          <x-error>
              {{ session('error') }}
          </x-error>
      @endif

      @if ($errors->any())
          @foreach ($errors->all() as $error)
              <x-error>
                  {{ $error }}
              </x-error>
          @endforeach
      @endif
    
    @if (@$order_views)
      <section class="p-2 max-w-5xl mx-auto">
        
        <h2 class="p-2 text-3xl font-extrabold">INVOICE</h2>
        @foreach ($order_views as $order_view)
        
          
        <div class="m-4 bg-white">
          <div class="block justify-between p-4 md:flex">
            <div class="align-left">
              <p>Nama : </p>
              <p class="font-bold">{{ $order_view['user'] }}</p>
              <p>Email : </p>
              <p class="font-extrabold">{{ $order_view['email'] }}</p>
            </div>
            <div class="md:text-right">
              <p>Tanggal : </p>
              <p class="font-bold">{{ $order_view['date'] }}</p>
              <p>Id Pesanan : </p>
              <p class="font-extrabold">{{ $order_view['id_pesanan'] }}</p>
            </div>
          </div>

          <div class="relative overflow-x-auto">
            <table
              class="md:w-md m-auto w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
              <thead
                class="bg-gray-200 text-xs uppercase text-gray-700">
                <tr>
                  <th scope="col" class="px-6 py-3 text-center">
                    No
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Nama Produk
                  </th>
                  <th scope="col" class="px-6 py-3 text-center">
                    Jumlah
                  </th>
                  <th scope="col" class="px-6 py-3 text-end">
                    Harga
                  </th>
                </tr>
              </thead>


              @php
                  $counter = 1;
              @endphp

              <tbody>
                @foreach ($order_view['products_order'] as $products)
                <tr class="border-g bg-white text-gray-500 dark:border-gray-700">
                  <th class="px-6 py-4 text-center">
                    {{ $counter }}
                    @php
                        $counter++;  
                    @endphp
                  </th>
                  <td class="px-6 py-4">
                    <p class="text-bold text-gray-900">{{ $products['name'] }}</p>
                  </td>
                  <td class="px-6 py-4 text-center">
                    {{ $products['quantity'] }}
                  </td>
                  <td class="px-6 xl:w-1/5 py-4 text-end">
                    Rp. {{ number_format($products['price'], 2) }},-
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="justify-between bg-slate-300 p-4 xl:flex">
            <div class="mb-3">
              <p>Total Harga : </p>
              <p class="text-3xl font-extrabold">Rp. {{ number_format($order_view['total_price'], 2) }},-</p>
            </div>
            <div class="mb-3">
              <p>Metode Pembayaran : </p>
              <p class="font-extrabold">Via : {{ $order_view['payment']}}</p>
            </div>
            <div class="mb-3 text-center">
              <p class="font-2xl">Status : </p>
              @if ($order_view['status'] ==   "LUNAS")
                <p class="rounded-lg bg-green-500 p-1 text-center font-extrabold text-white">
                  LUNAS</p>
                  @elseif (($order_view['status'] ==   "BELUM BAYAR")) 
                  <p class="rounded-lg bg-red-800 p-1 text-center font-extrabold text-white">
                    Belum Bayar</p>
                    @else 
                    <p class="rounded-lg bg-yellow-500 p-1 px-3 text-center font-extrabold text-white">
                      Menunggu Konfirmasi User</p>
              @endif
              </div>
            <div class="align-left items-center jusify-between flex gap-3">
              @if ($order_view['status'] ==   "MENUNGGU KONFIRMASI")
         
              <div>
                <a href="/penjualan"
                  class="bg-red-700 p-2 px-7 text-center text-xl font-extrabold text-white hover:bg-red-800">Kembali</a>
              </div>

              @else
              <div>
                <form method="POST" action="/penjualan/kirim/{{ $order_view['user'] }}/{{ $order_view['date'] }}"
                  onsubmit="return confirm('Yakin ingin Mengirim Pesanan Ini?');">
                  @csrf
                  <button type="submit"
                    class="bg-yellow-500 p-2 px-7 text-center text-xl font-extrabold text-gray-900 hover:bg-yellow-800">Kirim</button>
                </form>
              </div>
              <div>
                <a href="/penjualan"
                  class="bg-red-700 p-2 px-7 text-center text-xl font-extrabold text-white hover:bg-red-800">Kembali</a>
              </div>
              @endif
           
            </div>
          </div>
        </div>
        @endforeach

        <br><br>
      </section>
    @endif
    
    @if (@$order_requests) 
      <section>
        <h2 class="p-2 mt-8 text-3xl font-extrabold">ORDER :</h2>
        <div class="relative overflow-x-auto my-5">
          <table
            class="md:w-md m-auto w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
            <thead
              class="bg-gray-200 text-xs uppercase text-gray-700">
              <tr>
                <th scope="col" class="px-6 py-3 text-start">
                  Customer
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                  Total Pesanan
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                  Harga
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                  Tanggal Order
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                  Status
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                  Aksi
                </th>
              </tr>
            </thead>
            
            @forelse ($order_requests as $userOrders)
              <tbody>
                <tr
                  class="border-g bg-white text-gray-500 dark:border-gray-700">
                  <th class="px-6 py-4 text-start">
                    {{ $userOrders['user'] }}
                  </th>
                  <td class="px-6 py-4 text-center">
                    {{ $userOrders['total_quantity'] }}x item
                  </td>
                  <td class="px-6 py-4 text-center">
                    Rp. {{ number_format($userOrders['total_price'], 2) }},-
                  </td>
                  <td class="px-6 py-4 text-center">
                    {{ $userOrders['date'] }}
                  </td>
                  <td class="px-6 py-4 text-center">
                    @if ( $userOrders['status'] == 'LUNAS')
                      <p class="text-extrabold text-green-800">{{ $userOrders['status'] }}</p>
                      @else
                      <p class="text-extrabold text-red-800">{{ $userOrders['status'] }}</p>
                    @endif
                  </td>
                  <td class="px-6 py-4 text-center">
                    <form action="{{ 'penjualan/lihat/'.$userOrders['user'].'/'. $userOrders['date']}}" method="GET" class="w-full bg-green-600 hover:bg-green-800 hover:underline">
                      @csrf
                      <button type="submit"
                        class="p-2 text-center text-white">Lihat</button>
                    </form>
                  </td>
                </tr>
              </tbody>
            @empty  
              <tbody class="col-span-6">
                <tr
                  class="border-g col-span-6 bg-white text-gray-500 dark:border-gray-700">
                  <th class="px-6 py-4 font-extrabold text-3xl text-center text-red-500 " colspan="6">
                    <h1>TIDAK ADA ORDERAN );</h1>
                  </th>
                </tr>
              </tbody>
            @endforelse

          </table>
        </div>
      </section>
    @endif

</x-app-layout>
