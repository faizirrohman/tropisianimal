<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('contacts'));
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
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        Contact::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('contact.index')->with('success', 'Contact Berhasil Disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contacts'));
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
        $contact = Contact::findOrFail($id);

        $email = $request->input('email');
        $phone = $request->input('phone');  
        $address = $request->input('address'); 

        $contact->email = $email;
        $contact->phone = $phone;
        $contact->address = $address;

        $contact->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('contact.index')->with('success', 'Contact Berhasil Di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Contact::findOrFail($id);
        $data->delete();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('contact.index')->with('success', 'Contact Berhasil Dihapus');
    }
}
