<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Home;
use \App\Models\About;
use \App\Models\Gallery;
use \App\Models\News;
use \App\Models\Pesan;
use \App\Models\Contact;
class UserController extends Controller
{  
   // HOME
   public function home()
   {
      $homes = Home::get();
      $beritas = News::get();
      $tntg = About::get();
      $galeris = Gallery::get();
      return view('frontend.home', compact('homes', 'beritas', 'tntg', 'galeris'));
   }

   // ABOUT
   public function about()
   {
      $abouts = About::get();
      return view('frontend.about', compact('abouts'));
   }

   // GALLERY
   public function gallery()
   {
      $galerys = Gallery::get();
      return view('frontend.gallery', compact('galerys'));
   }
   // NEWS
   public function news()
   {
      $news = News::get();
      $galeris = Gallery::get();
      return view('frontend.news', compact('news', 'galeris'));
   }


   public function contact(Request $request)
   {
      return view('frontend.contact');
   }
    
   public function pesan(Request $request)
   {
      //melakukan validasi data
      $request->validate([
         'nama' => 'required',
         'email' => 'required',
         'phone' => 'required',
         'pesan' => 'required',
      ]);
      Pesan::create($request->all());

      //jika data berhasil ditambahkan, akan kembali ke halaman utama
      return redirect()->route('contact')->with('success', 'Pesan Sudah Terkirim');
   }

   public function contactUs()
   {
      $contacts = Contact::get();
      return view('layouts.tropisi', compact('contacts'));
   }
}
