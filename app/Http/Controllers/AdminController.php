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

class AdminController extends Controller
{
    //
    public function tambahkonten()
    {
        return view ('tambahkonten');
    }

    public function dashboardadmin()
    {
        return view ('dashboardadmin');
    }

    public function viewbooking()
    {
        // mengambil data dari table booking
        $booking = Booking::all();
        return view('dashboardadmin', compact('booking'));
    }

    public function confirm(Request $request)
    {
        // Validasi request di sini, jika diperlukan
        $booking = Booking::find($request->id);
        if (!$booking) {
            return response()->json(['error' => 'Booking not found'], 404);
        }

        $booking->status = 'confirmed';
        $booking->jam = $request->jam;
        $booking->save();

        // Kirim email konfirmasi ke pengguna
        Mail::to($booking->email)->send(new JadwalConfirmationMail($booking));

        return redirect()->back();
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
    
        $booking = DB::table('booking')->whereDate('date', '>=', $start_date)
                            ->whereDate('date', '<=', $end_date)
                            ->get();
                
        return view('dashboardadmin', compact('booking'));
    }

    public function store_content(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imagePath = $request->file('image')->store('images', 'public');
        $imageName = basename($imagePath);
    
        // Store the full image path including the directory
        $imageFullPath = 'storage/' . $imagePath;
    
        Content::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $imagePath,
        ]);
    
        return redirect()->route('tambahkonten')->with('success', 'Konten berhasil ditambahkan!');
    }
    public function adminkonten()
    {
        return view ('editkonten');
    }

    public function showcontent()
    {
        $contents = Content::latest()->get();
        return view('editkonten', compact('contents'));
    }

    public function hapuskonten($id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        return redirect()->route('contents.index')
            ->with('success', 'Content has been deleted successfully.');
    }

    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $content = Content::findOrFail($id);
        $content->title = $request->input('title');
        $content->description = $request->input('description');
    
        // Check if the 'image' field exists in the request and is valid
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Delete the old image from storage if it exists
            if ($content->image) {
                Storage::disk('public')->delete($content->image);
            }
    
            // Store the new image and update the image path in the database
            $imagePath = $request->file('image')->store('images', 'public');
            $content->image = $imagePath;
        }
    
        $content->save();
    
        return redirect()->route('contents.index')
            ->with('success', 'Content has been updated successfully.');
    }

}
