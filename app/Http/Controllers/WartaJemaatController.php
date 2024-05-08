<?php

namespace App\Http\Controllers;

use App\Models\WartaJemaat;
use Illuminate\Http\Request;

class WartaJemaatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Warta Jemaat';
        $data['warta'] = WartaJemaat::orderBy('id','desc')->get();

		return view('warta.index',$data);
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
            $data = new WartaJemaat();
            $data->judul = $request->judul;
            $data->keterangan = $request->keterangan;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/foto-warta/');
                $image->move($destinationPath, $name);
                $data->foto = $name;
            }
            $dokumenval = $request->file;
            if ($dokumenval) {
                $documentLaporanPath = public_path('assets/file-warta/');
                $documentNameLaporan = $dokumenval->getClientOriginalName();
                $i = 1;
                while (file_exists($documentLaporanPath . $documentNameLaporan)) {
                    $documentNameLaporan = pathinfo($dokumenval->getClientOriginalName(), PATHINFO_FILENAME) . "($i)." . $dokumenval->getClientOriginalExtension();
                    $i++;
                }
                $dokumenval->move($documentLaporanPath, $documentNameLaporan);
                $data->file = $documentNameLaporan;
            }
            $data->save();

            return redirect()->back()->with('success','Save data successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Failed save data successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(WartaJemaat $wartaJemaat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WartaJemaat $wartaJemaat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = WartaJemaat::find($id);
            $data->judul = $request->judul;
            $data->keterangan = $request->keterangan;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/foto-warta/');
                $image->move($destinationPath, $name);
                $data->foto = $name;
            }
            $dokumenval = $request->file;
            if ($dokumenval) {
                $documentLaporanPath = public_path('assets/file-warta/');
                $documentNameLaporan = $dokumenval->getClientOriginalName();
                $i = 1;
                while (file_exists($documentLaporanPath . $documentNameLaporan)) {
                    $documentNameLaporan = pathinfo($dokumenval->getClientOriginalName(), PATHINFO_FILENAME) . "($i)." . $dokumenval->getClientOriginalExtension();
                    $i++;
                }
                $dokumenval->move($documentLaporanPath, $documentNameLaporan);
                $data->file = $documentNameLaporan;
            }
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
            $data = WartaJemaat::find($id);
            $data->delete();

            return redirect()->back()->with('success','delete data successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Failed delete data successfully');
        }
    }
}
