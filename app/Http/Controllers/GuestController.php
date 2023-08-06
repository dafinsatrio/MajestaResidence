<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Content; 
use App\Mail\JadwalConfirmationMail;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class GuestController extends Controller
{
    //
    public function guesttiperumah()
    {
        return view ('guesttiperumah');
    }

    public function guestsimulasikpr()
    {
        return view ('guestsimulasikpr');
    }

    public function guestgaleri()
    {
        return view ('guestgaleri');
    }

    public function guestcontent()
    {
        return view ('guestcontent');
    }

    public function showguestcontent()
    {
        $contents = Content::orderBy('created_at', 'desc')->paginate(6); // Menampilkan 6 konten per halaman
        return view('guestcontent', compact('contents'));
    }

    public function showcontent($id)
    {
        $content = Content::findOrFail($id);
        return view('guestcontentshow', compact('content'));
    }
}
