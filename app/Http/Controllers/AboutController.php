<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\About;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::latest()->get();
        return view('admin.about.index', compact('abouts'));
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
            'visi' => 'required',
            'misi' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        About::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('about.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abouts = About::findOrFail($id);
        return view('admin.about.edit', compact('abouts'));
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
        $about = About::findOrFail($id);
        
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');  
        $visi = $request->input('visi'); 
        $misi = $request->input('misi');
        
        $about->judul = $judul;
        $about->deskripsi = $deskripsi;
        $about->visi = $visi;
        $about->misi = $misi;

        $about->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('about.index')->with('success', 'Data Berhasil Di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = About::findOrFail($id);
        $data->delete();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('about.index')->with('success', 'Data Berhasil Dihapus');
    }
}
