<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User; 
use Illuminate\Database\Eloquent\Builder;
use App\Models\Content; 
use App\Mail\JadwalConfirmationMail;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class MajestaController extends Controller
{
    //
    public function tiperumah()
    {
        return view ('tiperumah');
    }

    public function galeri()
    {
        return view ('galeri');
    }

    public function booking()
    {
        return view ('booking');
    }

    public function simulasikpr()
    {
        return view ('simulasikpr');
    }

    public function content()
    {
        return view ('content');
    }

    public function storebooking(Request $request)
    {
        // insert data ke table booking
	    DB::table('booking')->insert([
        'nama' => $request->namalengkap,
        'email' => $request->email,
        'no_hp' => $request->no_hp,
        'date' => $request->tanggalbooking
        ]);
    
        return redirect('/booking');
    }

    public function showContent()
    {
        $contents = Content::orderBy('created_at', 'desc')->paginate(6); // Menampilkan 6 konten per halaman
        return view('content', compact('contents'));
    }

    public function show($id)
    {
        $content = Content::findOrFail($id);
        return view('show', compact('content'));
    }
}
