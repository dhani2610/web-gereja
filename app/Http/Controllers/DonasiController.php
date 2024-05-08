<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Donasi';
        $data['donasi'] = Donasi::orderBy('id','desc')->get();

		return view('donasi.index',$data);
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
            $data = new Donasi();
            $data->category = $request->category;
            $data->tanggal = $request->tanggal;
            $data->nama = $request->nama;
            $data->deskripsi = $request->deskripsi;
            $data->jumlah = $request->jumlah;
            $data->save();

            return redirect()->back()->with('success','Save data successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Failed save data successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Donasi $donasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donasi $donasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = Donasi::find($id);
            $data->category = $request->category;
            $data->tanggal = $request->tanggal;
            $data->nama = $request->nama;
            $data->deskripsi = $request->deskripsi;
            $data->jumlah = $request->jumlah;
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
            $data = Donasi::find($id);
            $data->delete();

            return redirect()->back()->with('success','Delete data successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Failed delete data successfully');
        }
    }
}
