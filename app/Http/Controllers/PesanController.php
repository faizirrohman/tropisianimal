<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Pesan;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesans = Pesan::latest()->get();
        return view('admin.pesan.index', compact('pesans'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pesan::findOrFail($id);
        $data->delete();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('pesan.index')->with('success', 'Pesan Berhasil Dihapus');
    }
}
