<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Tiket Acara</title>
</head>

<body>
    <h1>Detail Booking Tiket</h1>
    <p>Nama: {{ $bookingData->nama_lengkap }}</p>
    <p>Email: {{ $bookingData->email }}</p>
    <p>No. Telepon: {{ $bookingData->notelp }}</p>
    <p>Acara: {{ $bookingData->acara->nama_acara }}</p>
    <p>Jumlah Tiket: {{ $bookingData->jumlah_tiket }}</p>
    <p>Harga per Tiket: {{ $bookingData->acara->biaya_tiket }}</p>
    <p>Total Harga: {{ $bookingData->jumlah_tiket * $bookingData->acara->biaya_tiket }}</p>
    <p>Terima kasih telah melakukan booking!</p>
</body>

</html>
