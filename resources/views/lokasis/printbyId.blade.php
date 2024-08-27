<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $judul }}</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0mm;
            /* this affects the margin in the printer settings */
        }
    </style>
    <style>
        body {
            font-family: 'Calibri', sans-serif;
            padding: 15mm;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 24px;
            margin-top: 20px;
            text-align: center;
            text-transform: uppercase;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            color: #333;
            text-align: center;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .left-align {
            text-align: left;
        }

        .right-align {
            text-align: right;
        }

        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        .image-container {
            display: block;
            margin-top: 10px;
        }

        .image-container img {
            display: inline-block;
            width: 48%;
            margin-right: 2%;
            margin-bottom: 10px;
            max-height: 150px;
            object-fit: cover;
        }

        .image-container img:nth-child(2n) {
            margin-right: 0;
        }
    </style>
</head>

<body>
    <section class="sheet">
        <!-- Header/Kop Surat -->
        <div class="header">
            <!-- Logo -->
            <img src="{{ public_path('images/Coat_of_arms_of_South_Kalimantan.png') }}" alt="LOGO INSTANSI"
                style="width: 95px; height: auto; float: left; margin-right: 30px;">

            <!-- Informasi Organisasi -->
            <div class="left-align">
                <h2 style="margin: 0; font-size: 18px;"><b>Dinas Pendidikan Dan Kebudayaan Provinsi Kalimantan
                        Selatan</b></h2>
                <p style="margin: 5px 0;">Jl. Dharma Praja II No. 1 Banjarbaru,</p>
                <p style="margin: 5px 0;">Kota Banjarbaru, Kalimantan Selatan 70232</p>
                <p style="margin: 5px 0;">Telepon: 0812-5140-4499 | Email: set.kalsel@gmail.go.id</p>
            </div>
            <!-- Clearfix untuk mengatasi float -->
            <div style="clear: both;"></div>
            <br>
            <hr style="border-top: 3px solid black; margin-top: 10px; margin-bottom: 10px;">
        </div>

        <h1 style="text-align: center;">{{ $judul }}</h1>
        @foreach ($lokasi as $item)
            <table class="table">
                <tr>
                    <th class="text-center align-middle">Nama Acara</th>
                    <td class="text-center align-middle">{{ $item->acara->nama_acara }}</td>
                </tr>
                <tr>
                    <th class="text-center align-middle">Alamat</th>
                    <td class="text-center align-middle">{{ $item->address }}</td>
                </tr>
                <tr>
                    <th class="text-center align-middle">Provinsi</th>
                    <td class="text-center align-middle">{{ $item->province->name }}</td>
                </tr>
                <tr>
                    <th class="text-center align-middle">Kabupaten/Kota</th>
                    <td class="text-center align-middle">{{ $item->regency->name }}</td>
                </tr>
                <tr>
                    <th class="text-center align-middle">Kecamatan</th>
                    <td class="text-center align-middle">{{ $item->district->name }}</td>
                </tr>
                <tr>
                    <th class="text-center align-middle">Desa/Kelurahan</th>
                    <td class="text-center align-middle">{{ $item->village->name }}</td>
                </tr>
            </table>
        @endforeach

        <div style="margin-top: 20px;">
            <div class="left-align" style="float: right; width: 25%;">
                <p>
                    Banjarmasin,
                    <?php
                    // Array mapping English day names to Indonesian
                    $dayNames = [
                        'Sunday' => 'Minggu',
                        'Monday' => 'Senin',
                        'Tuesday' => 'Selasa',
                        'Wednesday' => 'Rabu',
                        'Thursday' => 'Kamis',
                        'Friday' => 'Jumat',
                        'Saturday' => 'Sabtu',
                    ];
                    // Array mapping English month names to Indonesian
                    $monthNames = [
                        'January' => 'Januari',
                        'February' => 'Februari',
                        'March' => 'Maret',
                        'April' => 'April',
                        'May' => 'Mei',
                        'June' => 'Juni',
                        'July' => 'Juli',
                        'August' => 'Agustus',
                        'September' => 'September',
                        'October' => 'Oktober',
                        'November' => 'November',
                        'December' => 'Desember',
                    ];
                    // Get current date and time
                    $currentDate = date('l, d F Y');
                    // Translate day and month names to Indonesian
                    foreach ($dayNames as $english => $indonesian) {
                        $currentDate = str_replace($english, $indonesian, $currentDate);
                    }
                    foreach ($monthNames as $english => $indonesian) {
                        $currentDate = str_replace($english, $indonesian, $currentDate);
                    }
                    echo $currentDate;
                    ?>
                    <br>Mengetahui
                </p>
                <br>
                <br>
                <p class="left-align">
                    <b><u>Muhammadun, A.KS, M.I.Kom</u></b>
                </p>
            </div>
        </div>
    </section>

</body>

</html>
