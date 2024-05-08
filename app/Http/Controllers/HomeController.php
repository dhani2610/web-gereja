<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\DataJemaat;
use App\Models\Donasi;
use App\Models\Faq;
use App\Models\Galery;
use App\Models\JadwalIbadah;
use App\Models\ProfilePengurus;
use App\Models\WartaJemaat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard(Request $request)
    {
        $data['page_title'] = 'Dashboard';
        
        $tahunReq = $request->tahun;

        if ($tahunReq != null) {
           $tahun = $tahunReq;
        }else{
            $tahun = date('Y');
        }

        $data['donasi'] = Donasi::whereYear('tanggal',$tahun)->get()->sum('jumlah');

        $data['charts_donasi'] = [];
        $bulan = range(1,12);
        foreach ($bulan as $key => $value) {
            $donasiData = Donasi::whereYear('tanggal',$tahun)->whereMonth('tanggal',$value)->get()->sum('jumlah');
            array_push($data['charts_donasi'], $donasiData);
        }

        $data['tahun'] = $tahun;

        return view('dashboard', $data);
    }

    public function index(Request $request)
    {
        $data['page_title'] = 'Home';
        $data['about'] = About::first();
        $data['pengurus'] = ProfilePengurus::get();
        $data['jemaat'] = DataJemaat::get();
        $data['warta'] = WartaJemaat::get();
        $data['donasi'] = Donasi::get();
        $data['jadwal'] = JadwalIbadah::get();
        $data['faq'] = Faq::get();
       

        return view('landing/index', $data);
    }
    public function pengurus(Request $request)
    {
        $data['page_title'] = 'Pengurus';
        $data['about'] = About::first();
        $data['pengurus'] = ProfilePengurus::get();
        return view('landing/pengurus', $data);
    }
    public function galery(Request $request)
    {
        $data['page_title'] = 'Galery';
        $data['galery'] = Galery::get();
        return view('landing/galery', $data);
    }
    public function jadwal(Request $request)
    {
        $data['page_title'] = 'Jadwal Ibadah';
        $data['jadwal_ibadah'] = JadwalIbadah::get();
        return view('landing/jadwal-ibadah', $data);
    }
    public function jemaat(Request $request)
    {
        $data['page_title'] = 'Jadwal Ibadah';
        $data['jemaat'] = DataJemaat::get();
        return view('landing/jemaat', $data);
    }
    public function donasi(Request $request)
    {
        $data['page_title'] = 'Jadwal Ibadah';
        $data['donasi'] = Donasi::get();
        return view('landing/donasi', $data);
    }
    public function warta(Request $request)
    {
        $data['page_title'] = 'Warta Jemaat';
        $data['warta'] = WartaJemaat::get();
        return view('landing/warta', $data);
    }


}
