<x-layout>
    <section>
        <h2 class="p-2 mt-8 text-3xl font-extrabold">ORDER HISTORY:</h2>
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
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Tanggal Order
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Jumlah Pesanan
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Total harga
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Pembayaran
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Penanganan
                </th>
            </thead>
            @foreach ($order_historys as $order_history)
            <tbody>
              <tr
                class="border-g bg-white text-gray-500 dark:border-gray-700">
                <th class="px-6 py-4 text-start">
                    {{ $order_history['user_name'] }}
                  </th>
                  <td class="px-6 py-4 text-center">
                    {{ $order_history['user_email'] }}
                  </td>
                  <td class="px-6 py-4 text-center">
                    {{ $order_history['order_date'] }}
                  </td>
                  <td class="px-6 py-4 text-center">
                    {{ $order_history['total_quantity'] }}
                  </td>
                  <td class="px-6 py-4 text-center">
                    Rp. {{ number_format($order_history['total_price'], 2) }},-
                  </td>
                  <td class="px-6 py-4 text-center">
                    {{ $order_history['status'] }}
                  </td>
                  <td class="px-6 py-4 text-center">
                    <p class="text-extrabold">VIA: {{ $order_history['payment'] }}</p>
                  </td>
                  <td class="px-6 py-4 text-center">
                    {{ $order_history['created_at'] }}
                  </td>
                </tr>
            </tbody>
            @endforeach

          </table>
        </div>
      </section>
</x-layout>