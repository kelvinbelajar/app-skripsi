<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>
<body>
    <button id="pay-button">Pay Now</button>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    console.log('Payment success result:', result); // Log the result for debugging
                    
                    // Send a POST request with the transaction ID
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{ route('payment.callback') }}', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
    
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.status === 'success') {
                                    alert("Payment successful!");
                                    window.location.href = '/payment-success'; // Redirect to success page
                                } else {
                                    alert("Payment callback processing failed: " + response.message);
                                }
                            } else {
                                alert("Failed to process payment callback: " + xhr.statusText);
                            }
                        }
                    };
    
                    var params = 'transaction_id=' + encodeURIComponent(result.transaction_id);
                    xhr.send(params);
                },
                onPending: function(result) {
                    alert("Payment is pending");
                },
                onError: function(result) {
                    alert("Payment failed: " + result.status_message);
                }
            });
        });    
    </script>
</body>
</html>
