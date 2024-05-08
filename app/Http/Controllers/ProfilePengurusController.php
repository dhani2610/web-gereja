<?php

namespace App\Http\Controllers;

use App\Models\ProfilePengurus;
use Illuminate\Http\Request;

class ProfilePengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['page_title'] = 'Pengurus';
        $data['pengurus'] = ProfilePengurus::orderBy('id','desc')->get();

		return view('profile-pengurus.index',$data);
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
            $data = new ProfilePengurus();
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/pengurus/');
                $image->move($destinationPath, $name);
                $data->foto = $name;
            }
            $data->namaPengurus = $request->namaPengurus;
            $data->category = $request->category;
            $data->jabatan = $request->jabatan;
            $data->deskripsi = $request->deskripsi;
            $data->save();

            return redirect()->back()->with('success','Save data successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Failed save data successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfilePengurus $profilePengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfilePengurus $profilePengurus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = ProfilePengurus::find($id);
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('assets/img/pengurus/');
                $image->move($destinationPath, $name);
                $data->foto = $name;
            }
            $data->namaPengurus = $request->namaPengurus;
            $data->category = $request->category;
            $data->jabatan = $request->jabatan;
            $data->deskripsi = $request->deskripsi;
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
            $data = ProfilePengurus::find($id);
            $data->delete();

            return redirect()->back()->with('success','delete data successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('failed','Failed delete data successfully');
        }
    }
}
