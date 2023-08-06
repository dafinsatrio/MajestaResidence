@component('mail::message')
# Konfirmasi Jadwal

Halo {{ $booking->nama }},

Jadwal Anda untuk pertemuan pada {{ $booking->date }} telah dikonfirmasi. Berikut adalah detail pertemuan:

- Tanggal: {{ date('d - F - Y', strtotime($booking->date)) }}
- Jam: {{ $booking->jam }}

Terima kasih telah menggunakan layanan kami.

Salam,
Majesta Residence
@endcomponent