<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <p>Thank you for booking with us!</p>
    <p>Here are the details of your booking:</p>
    <p>Name: {{ $bookingDetails['nama_lengkap'] }}</p>
    <p>Phone: {{ $bookingDetails['notelp'] }}</p>
    <p>Email: {{ $bookingDetails['email'] }}</p>
    <p>Event ID: {{ $bookingDetails['acara_id'] }}</p>
    <p>Total Amount: {{ $bookingDetails['total'] }}</p>
    <p>We look forward to seeing you at the event.</p>
    <p>Thank you for using our application!</p>
</body>
</html>
