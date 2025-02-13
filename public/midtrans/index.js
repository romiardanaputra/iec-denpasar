document.getElementById('payment-form').addEventListener('submit', function(event) {
  event.preventDefault();

  const form = this;
  const formData = new FormData(form);
  const orderButton = document.getElementById('orderButton');
  const dialog = document.getElementById('dialogRegistransContent');

  orderButton.disabled = true;
  orderButton.textContent = 'Processing...';


  fetch(form.action, {
      method: form.method,
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: formData,
    })
    .then(response => response.json())
    .then(result => {
      if (result.snap_token) {
        console.log(result.snap_token);
        window.snap.pay(result.snap_token, {
          onSuccess: function(result) {
            console.log(result);
            alert('success payment');
            
          },
          onPending: function(result) {
            console.log(result);
            alert('pending payment');
          },
          onError: function(result) {
            console.log(result);
            alert('error payment');
          }
        });
      } else {
        alert('failed to create order')
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred while creating the order');
    })
    .finally(() => {
      orderButton.disabled = false;
      orderButton.textContent = 'Lanjut ke pembayaran';
      // dialog.setAttribute('class', 'hidden')
    })
});
