<?php

namespace App\Http\Controllers;

use App\Models\JadwalIbadah;
use Illuminate\Http\Request;

class JadwalIbadahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Jadwal Ibadah';
        $data['jadwal_ibadah'] = JadwalIbadah::orderBy('id','desc')->get();

		return view('jadwal-ibadah.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = new JadwalIbadah();
            $data->namaIbadah = $request->namaIbadah;
            $data->ayatAlkitab = $request->ayatAlkitab;
            $data->tanggal = $request->tanggal;
            $data->deskripsi = $request->deskripsi;
            $data->waktu = $request->waktu;
            $data->save();

            return redirect()->back()->with('success','Save data successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Failed save data successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalIbadah $jadwalIbadah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalIbadah $jadwalIbadah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = JadwalIbadah::find($id);
            $data->namaIbadah = $request->namaIbadah;
            $data->ayatAlkitab = $request->ayatAlkitab;
            $data->tanggal = $request->tanggal;
            $data->deskripsi = $request->deskripsi;
            $data->waktu = $request->waktu;
            $data->save();

            return redirect()->back()->with('success','Save data successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Failed save data successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = JadwalIbadah::find($id);
            $data->delete();

            return redirect()->back()->with('success','delete data successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Failed delete data successfully');
        }
    }
}
