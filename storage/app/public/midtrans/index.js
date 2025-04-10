let paymentMethod = null;

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById("payment-form");
    form.addEventListener("submit", function(event) {
        event.preventDefault();

        const formData = new FormData(form);
        const orderButton = document.getElementById("orderButton");

        orderButton.disabled = true;
        orderButton.textContent = "Processing...";

        fetch(form.action, {
            method: form.method,
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: formData,
        })
        .then((response) => response.json())
        .then((result) => {
            paymentMethod = result.payment_method;
            if (paymentMethod === 'online') {
                loadMidtransScript(result.snap_token);
            } else if (paymentMethod === 'cash') {
                window.location.href = result.redirect_url;
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("An error occurred while creating the order");
        })
        .finally(() => {
            orderButton.disabled = false;
            orderButton.textContent = "Lanjut ke pembayaran";
        });
    });
});

function loadMidtransScript(snapToken) {
    const midtransScript = document.createElement('script');
    midtransScript.src = "https://app.sandbox.midtrans.com/snap/snap.js";
    midtransScript.setAttribute('data-client-key', "{{ config('midtrans.client_key') }}");
    document.head.appendChild(midtransScript);

    midtransScript.onload = function() {
        snap.pay(snapToken, {
            onSuccess: function(result) {
                console.log(result);
                alert("success payment");
                window.location.href = "/transaction/success";
            },
            onPending: function(result) {
                console.log(result);
                alert("pending payment");
                window.location.href = "/transaction/pending";
            },
            onError: function(result) {
                console.log(result);
                saveErrorDataToSession(result);
                window.location.href = "/transaction/failed";
                alert("error payment");
            },
        });
    };
}

function saveErrorDataToSession(errorData) {
    fetch("/save-error-data", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Content-Type": "application/json",
        },
        body: JSON.stringify(errorData),
    })
    .then((response) => response.json())
    .then((data) => {
        console.log("Error data saved:", data);
    })
    .catch((error) => {
        console.error("Failed to save error data:", error);
    });
}
