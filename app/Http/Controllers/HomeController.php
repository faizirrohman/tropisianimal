<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Home;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homes = Home::latest()->get();
        return view('admin.home.index', compact('homes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Home::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('home.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homes = Home::findOrFail($id);
        return view('admin.home.edit', compact('homes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $home = Home::findOrFail($id);
        
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');
        
        $home->judul = $judul;
        $home->deskripsi = $deskripsi;

        $home->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('home.index')->with('success', 'Data Berhasil Di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Home::findOrFail($id);
        $data->delete();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('home.index')->with('success', 'Data Berhasil Dihapus');
    }
}
