<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $judul }}</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <!-- Landscape Page Settings -->
    <style type="text/css" media="print">
        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
            margin: 0;
        }

        .sheet {
            padding: 15mm;
        }
    </style>
    <style>
        body {
            font-family: Calibri, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 18px;
            margin-top: 20px;
        }

        .table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            border-spacing: 0;
            font: normal 13px Arial, sans-serif;
            width: 100%;
            margin-top: 20px;
        }

        .table thead th {
            background-color: #DDEFEF;
            border: solid 1px #DDEEEE;
            color: #336B6B;
            padding: 10px;
            text-align: center;
            text-shadow: 1px 1px 1px #fff;
        }

        .table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 10px;
            text-align: center;
            text-shadow: 1px 1px 1px #fff;
        }

        .table tbody tr {
            page-break-inside: avoid;
        }

        .left-align {
            text-align: left;
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
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Organisasi</th>
                    <th class="text-center align-middle">Acara</th>
                    <th class="text-center align-middle">Kategori</th>
                    <th class="text-center align-middle">Tanggal Mulai</th>
                    <th class="text-center align-middle">Tanggal Akhir</th>
                    <th class="text-center align-middle">Alamat</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($acaradetail as $data) : ?>
                <tr>
                    <td class="text-center align-middle"><?php echo $no; ?></td>
                    <td class="text-center align-middle"><?php echo $data->eventOrganizer->nama_organisasi; ?></td>
                    <td class="text-center align-middle"><?php echo $data->acara->nama_acara; ?></td>
                    <td class="text-center align-middle"><?php echo $data->acara->kategori; ?></td>
                    <td class="text-center align-middle"><?php echo $data->jadwal->tanggal_mulai; ?></td>
                    <td class="text-center align-middle"><?php echo $data->jadwal->tanggal_akhir; ?></td>
                    <td class="text-center align-middle"><?php echo $data->lokasi->address; ?></td>
                </tr>
                <?php $no++;
        endforeach; ?>
            </tbody>
        </table>
        <div style="margin-top: 20px;">
            <div class="left-align" style="float: right; width: 45%;">
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
