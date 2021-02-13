<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = Gallery::latest()->get();
        return view('admin.gallery.index', compact('gallerys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->gallery_photos;
        $namaFile = $file->getClientOriginalName();
        $file->move(public_path().'/galery_photo', $namaFile);
        Gallery::create([
            'gallery_photos' => $namaFile
        ]);

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('gallery.index')->with('success', 'Image Berhasil Tersimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $gallerys = Gallery::findOrFail($id);
       return view('admin.gallery.edit', compact('gallerys'));
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
        $galery = Gallery::findOrFail($id);
        if($request->file('gallery_photos') == null)
        {
            $galery->gallery_photos = $galery->gallery_photos;
        } else {
            if($request->hasFile('gallery_photos'))
            {
                $file = 'galery_photo/'.$galery->gallery_photos;
                if(is_file($file))
                {
                    unlink($file);
                }
                $file = $request->file('gallery_photos');
                $filename = $file->getClientOriginalName();
                $request->file('gallery_photos')->move('galery_photo/', $filename);
                $galery->gallery_photos = $filename;
            }
        }
        $galery->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('gallery.index')->with('success', 'Image Berhasil Di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Gallery::findOrFail($id);
        $file = 'galery_photo/'.$data->gallery_photos;
        if(is_file($file))
        {
            unlink($file);
        }
        $data->delete();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('gallery.index')->with('success', 'Berita Berhasil Dihapus');
    }
}
