<?php

namespace App\Http\Controllers;

use App\Models\DataJemaat;
use Illuminate\Http\Request;

class DataJemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Data Jemaat';
        $data['jemaat'] = DataJemaat::orderBy('id','desc')->get();

		return view('data-jemaat.index',$data);
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
            $data = new DataJemaat();
            $data->nama = $request->nama;
            $data->tgl_lahir = $request->tgl_lahir;
            $data->tempatLahir = $request->tempatLahir;
            $data->jenisKelamin = $request->jenisKelamin;
            $data->alamat = $request->alamat;
            $data->statusBaptis = $request->statusBaptis;
            $data->save();

            return redirect()->back()->with('success','Save data successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Failed save data successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DataJemaat $dataJemaat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataJemaat $dataJemaat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        try {
            $data = DataJemaat::find($id);
            $data->nama = $request->nama;
            $data->tgl_lahir = $request->tgl_lahir;
            $data->tempatLahir = $request->tempatLahir;
            $data->jenisKelamin = $request->jenisKelamin;
            $data->alamat = $request->alamat;
            $data->statusBaptis = $request->statusBaptis;
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
            $data = DataJemaat::find($id);
            $data->delete();

            return redirect()->back()->with('success','delete data successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Failed delete data successfully');
        }
    }
}
