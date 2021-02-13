<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\News;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'news_image' => 'required',
            'type' => 'required',
        ]);
        
        $file = $request->news_image;
        $namaFile = $file->getClientOriginalName();
        $file->move(public_path().'/news_photos', $namaFile);
        News::create([
            "news_image" => $namaFile,
            "judul" => $request->judul,
            "deskripsi" => $request->deskripsi,
            "type" => $request->type
        ]);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('news.index')->with('success', 'Berita Berhasil Tersimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
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
        $berita = News::findOrFail($id);
        if($request->file('news_image') != null && $request->hasFile('news_image'))
        {
            $file = 'news_photos/'.$berita->news_image;
            if(is_file($file))
            {
                unlink($file);
            }
            $file = $request->file('news_image');
            $filename = $file->getClientOriginalName();
            $request->file('news_image')->move('news_photos/', $filename);
            $berita->news_image = $filename;
        }
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        $berita->type = $request->type;
        $berita->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('news.index')->with('success', 'Berita berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = News::findOrFail($id);
        $file = 'news_photos/'.$data->news_image;
        if(is_file($file))
        {
            unlink($file);
        }
        $data->delete();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('news.index')->with('success', 'Berita Berhasil Dihapus');
    }
}
