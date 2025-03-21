document
  .getElementById("payment-form")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const form = this;
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
        if (result.snap_token) {
          console.log(result.snap_token);
          snap.pay(result.snap_token, {
            onSuccess: function (result) {
              console.log(result);
              alert("success payment");
              window.location.href = "/transaction/success";
            },
            onPending: function (result) {
              console.log(result);
              alert("pending payment");
              window.location.href = "/transaction/pending";
            },
            onError: function (result) {
              console.log(result);
              saveErrorDataToSession(result);
              window.location.href = "/transaction/failed";
              alert("error payment");
            },
          });
        } else {
          saveErrorDataToSession({
            code: "ORDER_CREATION_FAILED",
            message: "Terjadi kesalahan saat membuat order.",
          });
          alert("failed to create order");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("An error occurred while creating the order");
        saveErrorDataToSession({
          code: "SYSTEM_ERROR",
          message: "Terjadi kesalahan sistem. Silakan coba lagi nanti.",
        });
        window.location.href = "/transaction/failed";
      })
      .finally(() => {
        orderButton.disabled = false;
        orderButton.textContent = "Lanjut ke pembayaran";
      });
  });

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
