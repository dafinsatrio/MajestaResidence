<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\booking;

class AutoDeleteBooking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:delete_booking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Auto delete booking data that has passed the date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
           // Menghapus data booking yang sudah lewat tanggal pada kolom 'date'
           Booking::where('date', '<', now())->delete();
           $this->info('Auto delete completed for booking data.');
    }
}
