@extends('layouts.utama')
@section('content')
				<!-- Start .header-section -->
				<div class="header-section header-slider" id="header">
					<div class="single-hSlider hSlide-one" style="width: 100%;" data-vide-bg="poster: video/bg" data-vide-options="position: 50% 50%">
						<div class="overlay light">
							<div class="container">
								<div class="row">
									<div class="">
										<div class="header-texts">
											<h1 class="appear-from-left">Booking Pertemuan</h1>
											<h5 class="appear-from-right"> Majesta Residence <br/> South Tangerang City, Banten, 15414 </h5>
										</div>
									</div><!-- .col -->
								</div><!-- .row -->
							</div><!-- .container -->
						</div><!-- .overlay -->
					</div><!-- .header-section -->
				</div><!-- .header-section -->

             <!-- Start .booking-section -->
            <div class="gallery-section alt-bg" id="">
                <div class="container">
                    <div class="section-head">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <h2>Booking <span>Pertemuan</span></h2>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .section-head -->
                    <div class="col-md-5">
                        <div class="appointment-form">
                            <form action="" method="post" onsubmit="submitForm(event)">
                            {{ csrf_field() }}

                                <div class="input-box">
                                <label for="email" class="form-label">Email</label>
                                <br/>
                                <br/>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="email" value="{{ Auth::user()->email }}" readonly>
                                </div>
                                <br/>
                                <div class="input-box">
                                <label for="namalengkap" class="form-label">Nama Lengkap</label>
                                <br/>
                                <br/>
                                <input type="name" class="form-control" name="namalengkap" id="namalengkap" value="{{ Auth::user()->name }}" readonly>
                                </div>
                                <br/>
                                <div class="input-box">
                                <label for="tanggalbooking" class=" form-control-label">Tanggal Booking</label>
                                <br/>
                                <br/>
                                <input type="date" id="tanggalbooking"  name="tanggalbooking" class="form-control" required>
                                </div>
                                <br/>
                                <br/>
                                <button type="submit" class="button">Submit</button>
                                <br/>
                                <br/>
                                <br/>
                                <br/>
                                <div id="notification" style="display: none;"></div>
                            </form>
                        </div>
                    </div>
                </div><!-- .container -->
        </div><!-- .booking-section -->

        
    <script>
    // Dapatkan elemen input tanggal
    var inputTanggal = document.getElementById('tanggalbooking');

    // Dapatkan tanggal hari ini dalam format YYYY-MM-DD
    var today = new Date().toISOString().split('T')[0];

    // Atur nilai minimal pada input tanggal menjadi tanggal hari ini
    inputTanggal.setAttribute('min', today);
    </script>

<script>
function showNotification(message, type) {
    var notification = document.getElementById('notification');
    notification.style.display = 'block';
    notification.innerHTML = '<div class="alert alert-' + type + '">' + message + '</div>';
    setTimeout(function() {
        notification.style.display = 'none';
    }, 5000); // Menghilangkan notifikasi setelah 5 detik (5000 ms)
}

function submitForm(event) {
    event.preventDefault(); // Mencegah form untuk submit secara langsung

    // Dapatkan form element
    var form = event.target;

    // Simpan data form ke server menggunakan AJAX atau cara lainnya
    // Misalnya menggunakan library Axios untuk melakukan request POST
    axios.post(form.action, new FormData(form))
        .then(function(response) {
            // Jika request berhasil (status 2xx), tampilkan notifikasi berhasil
            showNotification('Form berhasil disubmit!', 'success');

            // Atur form menjadi kosong setelah berhasil disubmit (opsional)
            form.reset();
        })
        .catch(function(error) {
            // Jika terjadi error pada request, tampilkan notifikasi gagal
            showNotification('Form gagal disubmit!', 'danger');
        });
}
</script>
@endsection