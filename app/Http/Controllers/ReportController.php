<?php

namespace App\Http\Controllers;

use App\Models\EventOrganizer;
use App\Models\Acara;
use App\Models\Jadwal;
use App\Models\Lokasi;
use App\Models\AcaraDetail;
use App\Models\BookingTiket;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Keuangan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function printAllEventOrganizer()
    {
        $eventorganizer = EventOrganizer::all();

        $data = [
            'eventorganizer' => $eventorganizer,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Event Organizers'
        ];

        $report = PDF::loadView('event-organizers.print', $data)->setPaper('A4', 'potrait');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('Laporan Data Event Organizers ' . $nama_tgl . '_' . $nama_jam . '.pdf');
    }

    public function printEventOrganizerbyID($id)
    {
        $eventorganizer = DB::table('event_organizers')->select('*')->where('id', $id)->get();
        $data = [
            'eventorganizer' => $eventorganizer,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data PER Event Organizer'
        ];

        $report = PDF::loadView('event-organizers.printbyId', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function printAllAcara()
    {
        $acara = Acara::with(['event_organizer'])->get();

        $data = [
            'acara' => $acara,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data PER Acara'
        ];

        $report = PDF::loadView('acaras.print', $data)->setPaper('A4', 'potrait');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('Laporan Data Acara ' . $nama_tgl . '_' . $nama_jam . '.pdf');
    }

    public function printAcarabyID($id)
    {
        $acara = DB::table('acaras')
            ->select('acaras.*', 'event_organizers.nama_organisasi')
            ->leftJoin('event_organizers', 'acaras.id_eo', '=', 'event_organizers.id')
            ->where('acaras.id', $id)
            ->get();

        // Convert to array or object and add the event_organizer manually
        foreach ($acara as $data) {
            $data->event_organizer = new \stdClass();
            $data->event_organizer->nama_organisasi = $data->nama_organisasi;
        }

        $data = [
            'acara' => $acara,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Per Acara'
        ];

        $report = PDF::loadView('acaras.printbyId', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function printAllJadwal()
    {
        $jadwal = Jadwal::with(['acara'])->get();

        $data = [
            'jadwal' => $jadwal,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Per Jadwal'
        ];

        $report = PDF::loadView('jadwals.print', $data)->setPaper('A4', 'potrait');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('Laporan Data Jadwal ' . $nama_tgl . '_' . $nama_jam . '.pdf');
    }

    public function printJadwalbyID($id)
    {
        $jadwal = DB::table('jadwals')
            ->select('jadwals.*', 'acaras.nama_acara')
            ->leftJoin('acaras', 'jadwals.id_acara', '=', 'acaras.id')
            ->where('jadwals.id', $id)
            ->get();

        // Convert to array or object and add the nama_acara manually
        foreach ($jadwal as $data) {
            $data->acara = new \stdClass();
            $data->acara->nama_acara = $data->nama_acara;
        }

        $data = [
            'jadwal' => $jadwal,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data PER Jadwal'
        ];

        $report = PDF::loadView('jadwals.printbyId', $data)->setPaper('A4', 'landscape');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('report_' . $nama_tgl . $nama_jam . '.pdf');
    }

    public function printAllLokasi()
    {
        $lokasi = Lokasi::with(['acaras', 'province', 'regency', 'district', 'village'])->get();

        $data = [
            'lokasi' => $lokasi,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Lokasi'
        ];

        $report = PDF::loadView('lokasis.print', $data)->setPaper('A4', 'potrait');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('Laporan Data Lokasi ' . $nama_tgl . '_' . $nama_jam . '.pdf');
    }

    public function printLokasibyID($id)
    {
        $lokasi = DB::table('lokasis')
            ->select('lokasis.*', 'acaras.nama_acara', 'provinces.name as province_name', 'regencies.name as regency_name', 'districts.name as district_name', 'villages.name as village_name')
            ->leftJoin('acaras', 'lokasis.id_acara', '=', 'acaras.id')
            ->leftJoin('provinces', 'lokasis.province_id', '=', 'provinces.id')
            ->leftJoin('regencies', 'lokasis.regency_id', '=', 'regencies.id')
            ->leftJoin('districts', 'lokasis.district_id', '=', 'districts.id')
            ->leftJoin('villages', 'lokasis.village_id', '=', 'villages.id')
            ->where('lokasis.id', $id)
            ->get();

        foreach ($lokasi as $data) {
            $data->acara = new \stdClass();
            $data->acara->nama_acara = $data->nama_acara;
            $data->province = new \stdClass();
            $data->province->name = $data->province_name;
            $data->regency = new \stdClass();
            $data->regency->name = $data->regency_name;
            $data->district = new \stdClass();
            $data->district->name = $data->district_name;
            $data->village = new \stdClass();
            $data->village->name = $data->village_name;
        }

        $data = [
            'lokasi' => $lokasi,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data PER Lokasi'
        ];

        $report = PDF::loadView('lokasis.printbyId', $data)->setPaper('A4', 'potrait');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('Laporan Data Lokasi ' . $nama_tgl . '_' . $nama_jam . '.pdf');
    }


    public function printAllAcaraDetail()
    {
        $acaradetail = AcaraDetail::with(['acara', 'eventOrganizer', 'lokasi', 'jadwal'])->get();

        $data = [
            'acaradetail' => $acaradetail,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Acara Detail'
        ];

        $report = PDF::loadView('acara_details.print', $data)->setPaper('A4', 'potrait');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('Laporan Data Acara Detail ' . $nama_tgl . '_' . $nama_jam . '.pdf');
    }

    public function printAcaraDetailbyID($id)
    {
        // Fetch the AcaraDetail with its related models
        $acaradetail = DB::table('acara_details')
            ->select('acara_details.*', 'event_organizers.nama_organisasi', 'acaras.nama_acara', 'acaras.kategori', 'jadwals.tanggal_mulai', 'jadwals.tanggal_akhir', 'lokasis.address')
            ->leftJoin('event_organizers', 'acara_details.id_eo', '=', 'event_organizers.id')
            ->leftJoin('acaras', 'acara_details.id_acara', '=', 'acaras.id')
            ->leftJoin('jadwals', 'acara_details.id_jadwal', '=', 'jadwals.id')
            ->leftJoin('lokasis', 'acara_details.id_lokasi', '=', 'lokasis.id')
            ->where('acara_details.id', $id)
            ->get();

        foreach ($acaradetail as $data) {
            $data->acara = new \stdClass();
            $data->acara->nama_acara = $data->nama_acara;
            $data->acara->kategori = $data->kategori;
            $data->eventOrganizer = new \stdClass();
            $data->eventOrganizer->nama_organisasi = $data->nama_organisasi;
            $data->jadwal = new \stdClass();
            $data->jadwal->tanggal_mulai = $data->tanggal_mulai;
            $data->jadwal->tanggal_akhir = $data->tanggal_akhir;
            $data->lokasi = new \stdClass();
            $data->lokasi->address = $data->address;
        }

        $data = [
            'acaradetail' => $acaradetail,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Per Acara Detail'
        ];

        // Load the view with the data and generate the PDF
        $report = PDF::loadView('acara_details.printbyId', $data)->setPaper('A4', 'potrait');

        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('Laporan Data Acara Detail ' . $nama_tgl . '_' . $nama_jam . '.pdf');
    }


    public function printAllBookingTiket()
    {
        $bookingtiket = BookingTiket::with(['acara'])->get();

        $data = [
            'bookingtiket' => $bookingtiket,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Booking Tiket'
        ];

        $report = PDF::loadView('booking_tikets.print', $data)->setPaper('A4', 'potrait');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('Laporan Data Booking Tiket ' . $nama_tgl . '_' . $nama_jam . '.pdf');
    }

    public function printBookingTiketbyID($id)
    {
        $bookingtiket = DB::table('booking_tikets')
            ->select('booking_tikets.*', 'acaras.nama_acara')
            ->leftJoin('acaras', 'booking_tikets.id_acara', '=', 'acaras.id')
            ->where('booking_tikets.id', $id)
            ->get();

        foreach ($bookingtiket as $data) {
            $data->acara = new \stdClass();
            $data->acara->nama_acara = $data->nama_acara;
        }

        $data = [
            'bookingtiket' => $bookingtiket,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Booking Tiket'
        ];

        $report = PDF::loadView('booking_tikets.printbyId', $data)->setPaper('A4', 'potrait');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('Laporan Data Booking Tiket ' . $nama_tgl . '_' . $nama_jam . '.pdf');
    }

    public function printAllPemasukan()
    {
        $pemasukan = Pemasukan::with(['acara'])->get();

        $data = [
            'pemasukan' => $pemasukan,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Booking Tiket'
        ];

        $report = PDF::loadView('pemasukans.print', $data)->setPaper('A4', 'potrait');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('Laporan Data Pemasukan ' . $nama_tgl . '_' . $nama_jam . '.pdf');
    }

    public function printPemasukanbyID($id)
    {
        $pemasukan = DB::table('pemasukans')
            ->select('pemasukans.*', 'acaras.nama_acara')
            ->leftJoin('acaras', 'pemasukans.id_acara', '=', 'acaras.id')
            ->where('pemasukans.id', $id)
            ->get();

        foreach ($pemasukan as $data) {
            $data->acara = new \stdClass();
            $data->acara->nama_acara = $data->nama_acara;
        }

        $data = [
            'pemasukan' => $pemasukan,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data per Pemasukan'
        ];

        $report = PDF::loadView('pemasukans.printbyId', $data)->setPaper('A4', 'potrait');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('Laporan Data Pemasukan ' . $nama_tgl . '_' . $nama_jam . '.pdf');
    }

    public function printAllPengeluaran()
    {
        $pengeluaran = Pengeluaran::with(['acara'])->get();

        $data = [
            'pengeluaran' => $pengeluaran,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data Booking Tiket'
        ];

        $report = PDF::loadView('pengeluarans.print', $data)->setPaper('A4', 'potrait');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('Laporan Data Pengeluaran ' . $nama_tgl . '_' . $nama_jam . '.pdf');
    }
    
    public function printPengeluaranbyID($id)
    {
        $pengeluaran = DB::table('pengeluarans')
            ->select('pengeluarans.*', 'acaras.nama_acara')
            ->leftJoin('acaras', 'pengeluarans.id_acara', '=', 'acaras.id')
            ->where('pengeluarans.id', $id)
            ->get();

        foreach ($pengeluaran as $data) {
            $data->acara = new \stdClass();
            $data->acara->nama_acara = $data->nama_acara;
        }

        $data = [
            'pengeluaran' => $pengeluaran,
            'tanggal' => date('d F Y'),
            'judul' => 'Laporan Data per Pengeluaran'
        ];

        $report = PDF::loadView('pengeluarans.printbyId', $data)->setPaper('A4', 'potrait');
        $nama_tgl = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('d/m/y'), 6, 2);
        $nama_jam = substr(date('d/m/y'), 0, 2) . substr(date('d/m/y'), 3, 2) . substr(date('h:i:s'), 6, 2);

        return $report->stream('Laporan Data Pengeluaran ' . $nama_tgl . '_' . $nama_jam . '.pdf');
    }
}
