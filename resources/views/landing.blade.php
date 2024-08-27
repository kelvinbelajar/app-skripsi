<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acara Seni</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .frame {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        /* Frame 1 Styling */
        .frame-1 {
            background-image: url('/images/DSC05663.jpg');
            background-size: cover;
            background-position: center;
        }

        .frame-1-content {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: space-between;
            padding: 40px;
            box-sizing: border-box;
        }

        .title {
            font-family: 'Verdana', sans-serif;
            font-size: 4rem;
            font-weight: bold;
            margin: 0;
        }

        .description {
    font-family: 'Verdana', sans-serif;
    font-size: 1rem;
    max-width: 600px; /* Adjust this as needed */
    max-height: 300px; /* Adjust this as needed */
    text-align: center; /* Center the text inside the box */
    position: absolute;
    bottom: 40px;
    right: 40px;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for better visibility */
    padding: 10px; /* Padding inside the box */
    box-sizing: border-box; /* Include padding in the width and height */
    overflow: hidden; /* Hide overflow text */
    border-radius: 5px; /* Optional: rounded corners */
}


        .login-link {
            position: absolute;
            top: 20px;
            right: 40px;
            font-size: 1rem;
            font-weight: bold;
        }

        .login-link a {
            color: white;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Frame 2 Styling */
        .frame-2 {
            background-color: #1a1a1a;
            padding: 10px 20px;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            box-sizing: border-box;
        }

        .upcoming-title {
            font-size: 3rem;
            margin-bottom: 40px;
            text-align: center;
            width: 100%;
            margin-top: 20px;
        }

        .event-blocks {
            display: flex;
            flex-direction: column;
            gap: 10px;
            /* Small distance between blocks */
            align-items: center;
            width: 100%;
        }

        .event-block {
            display: flex;
            align-items: center;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            max-width: 1000px;
            width: 80%;
            box-sizing: border-box;
            gap: 20px;
            /* Space between the date, image, and details */
        }

        .event-date {
            font-size: 2rem;
            text-align: center;
            margin-right: 20px;
            flex-shrink: 0;
            /* Prevent shrinking */
            color: #fff;
        }

        .event-date .big-text {
            font-size: 3rem;
            font-weight: bold;
        }

        .event-date .month-year {
            font-size: 1rem;
        }

        .event-image {
            width: 150px;
            height: auto;
            border-radius: 10px;
        }

        .event-details {
            flex-grow: 1;
            text-align: left;
        }

        .event-title {
            font-size: 1.5rem;
            margin: 0;
        }

        .event-description {
            font-size: 1rem;
            margin-bottom: 10px;
        }

        .buy-ticket {
            background-color: #ff6347;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        .buy-ticket:hover {
            background-color: #e55337;
        }

        /* Modal Styling */
        dialog {
            border: none;
            border-radius: 10px;
            padding: 20px;
            width: 90%;
            max-width: 600px;
            background-color: #333;
            color: white;
        }

        .modal-content {
            margin-bottom: 20px;
        }

        .modal-close {
            background-color: #ff6347;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-close:hover {
            background-color: #e55337;
        }

        /* New Buy Ticket Button Styling */
        .buy-ticket-modal {
            background-color: #ff6347;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;

            position: absolute;
            /* Position the button inside the dialog */
            bottom: 20px;
            right: 20px;
        }

        .buy-ticket-modal:hover {
            background-color: #e55337;
        }

        #map {
            height: 300px;
            width: 100%;
            margin-top: 10px;
            border-radius: 10px;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
</head>

<body>
    <!-- Frame 1 -->
    <section class="frame frame-1">
        <div class="frame-1-content">
            <h1 class="title">Acara Seni tes</h1>
            <p class="description">
                Acara seni penting karena menyediakan platform untuk ekspresi kreatif, memperkaya budaya, dan memperkuat
                komunitas. Selain mendidik masyarakat tentang tradisi dan nilai-nilai budaya, acara seni juga mendukung
                ekonomi lokal dan memberikan hiburan serta inspirasi. Dengan demikian, acara seni berperan dalam
                pengembangan individu dan memperkaya kehidupan sosial serta kultural.</p>
        </div>
        <div class="login-link">
            <a href="/login">Login</a>
        </div>
    </section>

    <!-- Frame 2 -->
    <section class="frame frame-2">
        <h2 class="upcoming-title">Acara yang akan datang</h2>
        @forelse ($acara as $item)
            <div class="event-blocks">
                <div class="event-block">
                    <div class="event-date" id="eventDate{{ $item->id }}"></div>
                    <img src="{{ asset('storage/acaras/' . $item->acara->gambar) }}" class="event-image">
                    <div class="event-details">
                        <h3 class="event-title">{{ $item->acara->nama_acara }}</h3>
                        <p class="event-description">{{ $item->acara->deskripsi }}</p>
                    </div>
                    <button class="buy-ticket"
                        onclick="showModal('{{ $item->jadwal->tanggal_mulai }}', '{{ $item->jadwal->tanggal_akhir }}', '{{ $item->acara->biaya_tiket }}', {{ $item->lokasi->latitude }}, {{ $item->lokasi->longitude }}, '{{ $item->lokasi->address }}', '{{ $item->lokasi->village->name }}', '{{ $item->lokasi->district->name }}', '{{ $item->lokasi->regency->name }}', '{{ $item->lokasi->province->name }}')">
                        Buy Ticket
                    </button>
                </div>
            @empty
                <p>Tidak ada acara</p>
        @endforelse
        </div>
    </section>

    <!-- Modal -->
    <dialog id="myDialog">
        <h3 class="modal-title">Detail Acara</h3>
        <div class="modal-content" id="modalContent">
            <!-- Content will be injected here -->
        </div>
        <button class="modal-close" id="closeDialog"><- Close</button>
                <button class="buy-ticket-modal" id="buyTicketModal">Buy Ticket -></button>
    </dialog>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        function formatDate(dateString) {
            const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
            ];
            const date = new Date(dateString);
            const day = date.getDate();
            const month = months[date.getMonth()];
            const year = date.getFullYear();
            return `<div class="big-text">${day}</div><div class="month-year">${month} ${year}</div>`;
        }
    
        function formatCurrency(amount) {
            // Format the number with thousands separator and Indonesian currency format
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
        }
    
        function showModal(tanggalMulai, tanggalAkhir, biayaTiket, latitude, longitude, address, village, district, regency,
            province) {
            const formattedBiayaTiket = formatCurrency(biayaTiket);
            const modalContent = `
                <p><strong>Tanggal Mulai:</strong> ${tanggalMulai}</p>
                <p><strong>Tanggal Akhir:</strong> ${tanggalAkhir}</p>
                <p><strong>Biaya Tiket:</strong> ${formattedBiayaTiket}</p>
                <div id="map"></div>
            `;
            document.getElementById('modalContent').innerHTML = modalContent;
            document.getElementById('myDialog').showModal(); // Opens the dialog as a modal
    
            // Initialize the map after the modal has been opened and content is injected
            const map = L.map('map').setView([latitude, longitude], 13);
    
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
    
            // Add a marker for the specific event
            let popupContent = `
                <b>Provinsi:</b> ${province}<br>
                <b>Kabupaten/Kota:</b> ${regency}<br>
                <b>Kecamatan:</b> ${district}<br>
                <b>Kelurahan/Desa:</b> ${village}<br>
                <b>Alamat:</b> ${address}<br>
            `;
            L.marker([latitude, longitude]).addTo(map).bindPopup(popupContent);
        }
    
        document.addEventListener('DOMContentLoaded', () => {
            @foreach ($acara as $item)
                document.getElementById('eventDate{{ $item->id }}').innerHTML = formatDate(
                    '{{ $item->jadwal->tanggal_mulai }}');
            @endforeach
    
            document.getElementById('closeDialog').addEventListener('click', () => {
                document.getElementById('myDialog').close(); // Closes the dialog
            });
    
            document.getElementById('buyTicketModal').addEventListener('click', () => {
                // Add your ticket purchasing logic here, e.g., redirecting to a purchase page
                window.open('/buy-ticket-page', '_blank'); // Replace with your actual ticket purchase page
            });
        });
    </script>
    
</body>

</html>
