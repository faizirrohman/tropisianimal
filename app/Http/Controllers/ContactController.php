<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }

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

    public function edit($id)
    {
        $contacts = Contact::findOrFail($id);
        return view('admin.contact.edit', compact('contacts'));
    }

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

    public function destroy($id)
    {
        $data = Contact::findOrFail($id);
        $data->delete();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('contact.index')->with('success', 'Contact Berhasil Dihapus');
    }
}
