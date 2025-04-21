<div class="max-w-screen-xl mx-auto p-6 bg-white rounded shadow-sm my-6" id="invoice">
  <div class="grid grid-cols-2 items-center">
    <div>
      <!--  Company logo  -->
      <img src="{{ asset('storage/assets/logo/iec-logo.webp') }}"
        srcset="
        {{ asset('storage/assets/logo/iec-logo-small.webp') }} 480w,
        {{ asset('storage/assets/logo/iec-logo-medium.webp') }} 768w,
        {{ asset('storage/assets/logo/iec-logo-large.webp') }} 1024w
    "
        sizes="(max-width: 480px) 480px, (max-width: 768px) 768px, 1024px" class="h-20"
        alt="{{ config('app.name') . ' logo' }}" loading="lazy">
    </div>

    <div class="text-right">
      <p>
        {{ config('mail.from.name') }}
      </p>
      <p class="text-gray-500 text-base">
        {{ config('mail.from.address') }}
      </p>
      <p class="text-gray-500 text-sm mt-1">
        +62 817-4715-370
      </p>
    </div>
  </div>

  <!-- Client info -->
  <div class="grid grid-cols-2 items-center mt-8">
    <div>
      <p class="font-bold text-gray-800">
        Bill to :
      </p>
      <p class="text-gray-600 font-medium">
        {{ $order->user->name }}
        <br />
        <span class="{{ !$order->user->address ? 'text-yellow-600' : '' }}">
          @if (!$order->user->address)
            <a class="underline animate-pulse capitalize font-bold"
              href="{{ route('profile') }}">{{ $order->user->address ?? 'Klik untuk update alamat anda!' }}</a>
          @else
            {{ $order->user->address ?? 'Update alamat anda pada profile' }}
          @endif
        </span>
      </p>
      <p class="text-gray-600 font-medium">
        {{ $order->user->email }}
      </p>
      <div class="py-4 ">
        <p>
          Tipe pembayaran : <span class="font-bold capitalize"> {{ $order->payment_method }}</span>
        </p>

      </div>

    </div>

    <div class="text-right space-y-2">
      <p class="font-semibold text-gray-900">
        Order Number: <br>
        <span class="font-normal text-gray-500">{{ $order->order_id }}</span>
      </p>
      <p class="font-semibold text-gray-900">
        Bayar Sebelum: <br> <span class= "font-normal text-gray-500">
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
            <div class="font-bold text-base text-gray-900">{{ $order->program->name }}</div>
            <div class="mt-1 text-gray-500">{{ Str::limit($order->program->short_description, 200) }}</div>
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
        <tr>
          <th scope="row" colspan="3"
            class="hidden pl-4 pr-3 pt-4 text-right text-sm font-bold text-gray-900 sm:table-cell sm:pl-0">Total
          </th>
          <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-semibold text-gray-900 sm:hidden">Total</th>
          <td class="pl-3 pr-4 pt-4 text-right text-sm font-bold text-gray-900 sm:pr-0">
            {{ 'Rp ' . number_format($order->total_price, 0, ',', '.') }}</td>
        </tr>
      </tfoot>
    </table>
    @if ($order->payment_method->value === \App\Enums\PaymentMethod::Online->value)
      <button type="button" id="pay-button" class="mt-4 mr-4 bg-blue-600 text-white px-4 py-2 rounded-full">Pay
        Now</button>
    @endif
    <!-- Print Button -->
    <button type="button" id="print-button"
      class="mt-4 bg-green-500 text-white px-4 py-2 rounded-full {{ !$order->payment_method->value === 'cash' ? 'ml-4' : '' }}">Download
      Invoice</button>
  </div>

  <!--  Footer  -->
  <div class="border-t-2 pt-4 text-xs text-gray-500 text-center mt-16">
    Please pay the invoice before the due date. You can pay the invoice by logging in to your account from our client
    portal.
  </div>
</div>

@section('js_custom')
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
  </script>
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      console.log('DOM fully loaded and parsed');

      const payButton = document.querySelector('#pay-button');
      if (payButton) {
        payButton.addEventListener('click', function(e) {
          e.preventDefault();
          snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
              console.log(result);
              alert('Payment successful!');
            },
            onPending: function(result) {
              console.log(result);
              alert('Payment is pending.');
            },
            onError: function(result) {
              console.log(result);
              alert('Payment failed.');
            }
          });
        });
      } else {
        console.error('#pay-button not found');
      }

      const printButton = document.querySelector('#print-button');
      if (printButton) {
        printButton.addEventListener('click', function() {
          console.log('Print button clicked');
          var element = document.getElementById('invoice');
          if (element) {
            var opt = {
              margin: 1,
              filename: 'invoice tagihan.pdf',
              image: {
                type: 'jpeg',
                quality: 0.98
              },
              html2canvas: {
                scale: 2
              },
              jsPDF: {
                unit: 'mm',
                format: 'a4',
                orientation: 'landscape'
              }
            };

            html2pdf().from(element).set(opt).save();
          } else {
            console.error('#invoice element not found');
          }
        });
      } else {
        console.error('#print-button not found');
      }
    });
  </script>
@endsection
