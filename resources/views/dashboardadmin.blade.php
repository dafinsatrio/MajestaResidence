<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin Majesta Residence</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="images/majesta.png" alt="logo" style="height: 54px; width: 84px;" />                
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="/dashboardadmin" style="margin-top: 30px">
                        Dashboard
                    </a>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="/tambahkonten" style="margin-top: 30px">
                        Tambah Konten
                    </a>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="/editkonten" style="margin-top: 30px">
                        Edit Konten
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

            <!-- Page Content -->
            <main>
            <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div>
                            <form action="/filter" method="get">
                                <div class="row">
                                    <div class="col-md-5 form-group">
                                        <label for="">Start Date</label>
                                        <input type="date" name="start_date" class="form-control" value="" required>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label for="">End Date</label>
                                        <input type="date" name="end_date" class="form-control" value="" required>
                                    </div>
                                    <div class="col-md-1 form-group" style="margin-top:25px;">
                                        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><input type="submit"value="Search"></a>
                                    </div>
                                    <div class="col-md-1 form-group" style="margin-top:25px;">
                                        <a href="/dashboardadmin" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" >Reset</a>
                                    </div>
                                </div>
                            </form>
                            </div>

                            <br/>
                            <br/>
                            <table border="1" class="table">
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Tanggal</th>
                                    <th>Status</th> 
                                    <th>Opsi</th>
                                </tr>
                                @foreach($booking as $booking)
                                    <tr>
                                        <td>{{ $booking->nama }}</td>
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->no_hp }}</td>
                                        <td>{{ date('j \\ F Y', strtotime($booking->date)) }}</td>
                                        <td>{{ $booking->status }}</td>
                                        <td>
                                            @if ($booking->status == 'pending')
                                                <button type="button" class="konfirmasi-button" data-toggle="modal" data-target="#exampleModal" onclick='konfirmasi({{ $booking->id }})'>Konfirmasi</button>
                                            @else
                                                Sudah Dikonfirmasi
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Jadwal</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form id="konfirmasiForm" method="post" action="{{ route('admin.booking.confirm') }}">
                                            <div class="modal-body">
                                                @csrf
                                                <input type="hidden" name="id" id="jadwal_id">
                                                <label for="jam">Jam Bertemu:</label>
                                                <input type="time" name="jam" id="jam">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" data-dismiss="modal">Close</button>
                                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Konfirmasi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        const modal = $('#exampleModal');
    // Wait for the document to be ready
        $(document).ready(function () {
            // Dapatkan referensi ke tombol "Konfirmasi"
            const konfirmasiButton = $('.konfirmasi-button');

            // Dapatkan referensi ke elemen modal

            // Tambahkan event listener untuk mengatur tampilan modal saat tombol "Konfirmasi" diklik

            // Tambahkan event listener untuk menyembunyikan modal saat tombol "Close" atau "Save changes" diklik
            $('.close, .btn-secondary, .btn-primary').click(function () {
                // Sembunyikan modal
                modal.modal('hide');
            });

            // Jika ingin menambahkan fungsi untuk menangani perubahan yang disimpan, dapat ditambahkan di sini
        });
        function konfirmasi(id) {
                // Tampilkan modal
            console.log(id);    
            modal.modal('show');
            $('#jadwal_id').val(id)
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>
