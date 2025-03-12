{{-- <div class="container pb-5 pt-5">
  <div class="row">
    <div class="col-12 col-md-8">
      <div class="card shadow">
        <div class="card-header">
          <h5>Data Order</h5>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-condensed">
            <tr>
              <td>ID</td>
              <td><b>#{{ $order->order_id }}</b></td>
            </tr>
            <tr>
              <td>Total Harga</td>
              <td><b>Rp {{ number_format($order->total_price, 2, ',', '.') }}</b></td>
            </tr>
            <tr>
              <td>Status Order</td>
              <td><b>{{ $order->status }}</b></td>
            </tr>
            <tr>
              <td>Status Pembayaran</td>
              <td><b>{{ $order->payment_status }}</b></td>
            </tr>
            <tr>
              <td>Tanggal</td>
              <td><b>{{ $order->created_at->format('d M Y H:i') }}</b></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4">
      <div class="card shadow">
        <div class="card-header">
          <h5>Pembayaran</h5>
        </div>
        <div class="card-body">
          @if ($order->payment_status == 'unpaid')
            <button class="btn btn-primary" id="pay-button">Bayar Sekarang</button>
          @elseif ($order->payment_status == 'paid')
            Pembayaran berhasil
          @endif
        </div>
      </div>
    </div>
  </div>
</div> --}}

<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow-sm my-6" id="invoice">

  <div class="grid grid-cols-2 items-center">
    <div>
      <!--  Company logo  -->
      <img src="{{ asset('storage/assets/logo/iec-logo.webp') }}"
        srcset="
        {{ asset('storage/assets/logo/iec-logo-small.webp') }} 480w,
        {{ asset('storage/assets/logo/iec-logo-medium.webp') }} 768w,
        {{ asset('storage/assets/logo/iec-logo-large.webp') }} 1024w
    "
        sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, 1024px" class="h-8"
        alt="{{ config('app.name') . ' logo' }}" loading="lazy">
    </div>

    <div class="text-right">
      <p>
        Intensive English Course (IEC) Denpasar
      </p>
      <p class="text-gray-500 text-sm">
        iecdps.official@gmail.com
      </p>
      <p class="text-gray-500 text-sm mt-1">
        +620874715370
      </p>

    </div>
  </div>

  <!-- Client info -->
  <div class="grid grid-cols-2 items-center mt-8">
    <div>
      <p class="font-bold text-gray-800">
        Bill to :
      </p>
      <p class="text-gray-500">
        {{ $order->user->name }}
        <br />
        {{ $order->user->address ?? 'alamat belum di set' }}
      </p>
      <p class="text-gray-500">
        {{ $order->user->email }}
      </p>
    </div>

    <div class="text-right">
      <p class="">
        Order Number:
        <span class="text-gray-500">{{ $order->order_id }}</span>
      </p>
      <p>
        Expire Pay date: <span class="text-gray-500">
          {{ \Carbon\Carbon::parse($order->payments->first()->expired_at)->translatedFormat('l, d F Y H:i') }}</span>
      </p>
    </div>
  </div>

  <!-- Invoice Items -->
  <div class="-mx-4 mt-8 flow-root sm:mx-0">
    <table class="min-w-full">
      <colgroup>
        <col class="w-full sm:w-1/2">
        <col class="sm:w-1/6">
        <col class="sm:w-1/6">
        <col class="sm:w-1/6">
      </colgroup>
      <thead class="border-b border-gray-300 text-gray-900">
        <tr>
          <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Items</th>
          <th scope="col" class="hidden px-3 py-3.5 text-right text-sm font-semibold text-gray-900 sm:table-cell">
            Quantity</th>
          <th scope="col" class="hidden px-3 py-3.5 text-right text-sm font-semibold text-gray-900 sm:table-cell">
            Price</th>
          <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">Amount
          </th>
        </tr>
      </thead>
      <tbody>
        <tr class="border-b border-gray-200">
          <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0">
            <div class="font-medium text-gray-900">{{ $order->program->name }}</div>
            <div class="mt-1 truncate text-gray-500">{{ Str::limit($order->program->short_description, 100) }}</div>
          </td>
          <td class="hidden px-3 py-5 text-right text-sm text-gray-500 sm:table-cell">
            {{ $order->items->first()->quantity }}</td>
          <td class="hidden px-3 py-5 text-right text-sm text-gray-500 sm:table-cell">
            {{ 'Rp ' . number_format($order->items->first()->price, 0, ',', '.') }}
          </td>
          <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0">
            {{ 'Rp ' . number_format($order->total_price, 0, ',', '.') }}
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th scope="row" colspan="3"
            class="hidden pl-4 pr-3 pt-6 text-right text-sm font-normal text-gray-500 sm:table-cell sm:pl-0">Subtotal
          </th>
          <th scope="row" class="pl-6 pr-3 pt-6 text-left text-sm font-normal text-gray-500 sm:hidden">Subtotal
          </th>
          <td class="pl-3 pr-6 pt-6 text-right text-sm text-gray-500 sm:pr-0">
            {{ 'Rp ' . number_format($order->total_price, 0, ',', '.') }}</td>
        </tr>
        {{-- <tr>
          <th scope="row" colspan="3"
            class="hidden pl-4 pr-3 pt-4 text-right text-sm font-normal text-gray-500 sm:table-cell sm:pl-0">Tax</th>
          <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-normal text-gray-500 sm:hidden">Tax</th>
          <td class="pl-3 pr-6 pt-4 text-right text-sm text-gray-500 sm:pr-0">$1,050.00</td>
        </tr> --}}
        {{-- <tr>
          <th scope="row" colspan="3"
            class="hidden pl-4 pr-3 pt-4 text-right text-sm font-normal text-gray-500 sm:table-cell sm:pl-0">Discount
          </th>
          <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-normal text-gray-500 sm:hidden">Discount
          </th>
          <td class="pl-3 pr-6 pt-4 text-right text-sm text-gray-500 sm:pr-0">- 10%</td>
        </tr> --}}
        <tr>
          <th scope="row" colspan="3"
            class="hidden pl-4 pr-3 pt-4 text-right text-sm font-semibold text-gray-900 sm:table-cell sm:pl-0">Total
          </th>
          <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-semibold text-gray-900 sm:hidden">Total</th>
          <td class="pl-3 pr-4 pt-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">
            {{ 'Rp ' . number_format($order->total_price, 0, ',', '.') }}</td>
        </tr>
      </tfoot>
    </table>
  </div>

  <!--  Footer  -->
  <div class="border-t-2 pt-4 text-xs text-gray-500 text-center mt-16">
    Please pay the invoice before the due date. You can pay the invoice by logging in to your account from our client
    portal.
  </div>
  <button type="button" id="btn" class="">Print</button>

</div>

@section('js_custom')
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
  </script>
  <script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
      e.preventDefault();
      snap.pay('{{ $snapToken }}', {
        // Optional
        onSuccess: function(result) {
          /* You may add your own js here, this is just example */
          // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          console.log(result)
        },
        // Optional
        onPending: function(result) {
          /* You may add your own js here, this is just example */
          // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          console.log(result)
        },
        // Optional
        onError: function(result) {
          /* You may add your own js here, this is just example */
          // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          console.log(result)
        }
      });
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"
    integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
  <script>
    var btn = document.getElementById("btn");

    window.onload = function() {};
    btn.addEventListener("click", function() {

      var element = document.getElementById("invoice");

      var doc = new jsPDF();

      doc.html(element, {
        callback: function(doc) {
          doc.save();
        }
      });

      console.log("printing...");
    });
  </script>
@endsection
