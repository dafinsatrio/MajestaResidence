<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User; 
use Illuminate\Database\Eloquent\Builder;



class MajestaController extends Controller
{
    //
    public function dashboardadmin()
    {
        return view ('dashboardadmin');
    }

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

    public function storebooking(Request $request)
    {
        // insert data ke table booking
	    DB::table('booking')->insert([
        'nama' => $request->namalengkap,
        'email' => $request->email,
        'date' => $request->tanggalbooking
        ]);
    
        return redirect('/booking');
    }

    public function viewbooking()
    {
        // mengambil data dari table booking
    	$booking = DB::table('booking')->get();
 
    	return view('dashboardadmin',['booking' => $booking]);
    }

    public function hapus_booking($id)
    {
        // menghapus data booking berdasarkan id yang dipilih
        DB::table('booking')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman dashboard admin
        return redirect('/dashboardadmin');
    }


    public function filter(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $booking = DB::table('booking')->whereDate('date', '>=',$start_date)
                            ->whereDate('date', '<=',$end_date)
                            ->get();
                
        return view('dashboardadmin', compact('booking'));
    }
}
