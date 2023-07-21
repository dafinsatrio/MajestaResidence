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
											<h1 class="appear-from-left">Simulasi KPR</h1>
											<h5 class="appear-from-right"> Majesta Residence <br/> South Tangerang City, Banten, 15414 </h5>
										</div>
									</div><!-- .col -->
								</div><!-- .row -->
							</div><!-- .container -->
						</div><!-- .overlay -->
					</div><!-- .header-section -->
				</div><!-- .header-section -->

		<br/>
        <div class="gallery-section" id="">

		<div class="container">
			<br/>
			<div class="section-head">
				<div class="row text-center">
					<div class="col-md-12">
						<h2>Simulasi <span>KPR</span></h2>
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .section-head -->
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-lg-4 col-md-6">
                    <form onsubmit="event.preventDefault(); hitungKPR();">
                        <div class="form-group">
                          <label for="jumlahPinjaman">Harga Rumah (dalam Rp)</label><br/><br/>
                          <input type="number" name="jumlahPinjaman" min="1" id="jumlahPinjaman" class="form-control input-sm" required autofocus placeholder="Contoh : 300000000" value="" />
                        </div><br/>
                        <div class="form-group">
                          <label for="uangMuka">Uang Muka </label><br/><br/>
                          <input type="number" name="uangMuka" min="0" id="uangMuka" class="form-control input-sm"  required placeholder="minimal 0" value="" oninput="validateUangMuka()" />
                        </div><br/>
                        <div class="form-group">
                          <label for="sukuBungaFloating">Bunga (%)</label><br/><br/>
                          <input type="number" name="sukuBungaFloating" min="0.1" max="30" id="sukuBungaFloating" class="form-control input-sm" required step="0.01" placeholder="0.1-30" value="" />
                        </div><br/>
                        <div class="form-group">
                          <label for="jangkaWaktuTahun">Jangka Waktu (dalam tahun)</label><br/><br/>
                          <input type="number" id="jangkaWaktuTahun" min="1" max="30" step="1" class="form-control input-sm" placeholder="1-30" required /><br>
                        </div><br/>
                        <button type="submit" class="btn btn-primary btn-md col-xs-12">HITUNG CICILAN</button>
						<button type="reset" class="btn btn-danger btn-md col-xs-12" onclick="resetForm()">RESET</button>
                      </form>
				</div>
				<div class="col-xs-12 col-sm-12 col-lg-8 col-md-6">
					<div id="hasilKPR"></div>
				</div>
			</div>
			
			<hr />
		</div> <!-- /container -->
</div>

<script>
	
            function validateUangMuka() {
            const jumlahPinjaman = parseFloat(document.getElementById('jumlahPinjaman').value);
            const uangMuka = parseFloat(document.getElementById('uangMuka').value);

            if (uangMuka > jumlahPinjaman) {
            alert('Uang Muka tidak boleh melebihi Harga Rumah.');
            document.getElementById('uangMuka').value = jumlahPinjaman;
            }
            }

            function formatAngka(angka) {
              return angka.toLocaleString('id-ID', { maximumFractionDigits: 2 });
            }
          
            function isFieldEmpty(fieldValue) {
              return isNaN(fieldValue) || fieldValue.toString().trim() === '';
            }
          
            function calculateKPRFloating(jumlahPinjaman, uangMuka, sukuBungaTahun, jangkaWaktuTahun) {
                      if (jumlahPinjaman <= 0 || uangMuka < 0 || sukuBungaTahun <= 0 || jangkaWaktuTahun <= 0) {
                        alert('Nilai input harus positif atau nol.');
                        return null;
                      }
                
                      const sukuBungaBulanan = sukuBungaTahun / 12 / 100;
                      const jumlahPinjamanSetelahDP = jumlahPinjaman - uangMuka;
                      const jumlahAngsuran = jumlahPinjamanSetelahDP * (sukuBungaBulanan / (1 - Math.pow(1 + sukuBungaBulanan, -jangkaWaktuTahun * 12)));
                      const rincianBulanan = [];
                      let sisaPinjaman = jumlahPinjamanSetelahDP;
                      let totalBunga = 0;
                      let totalAngsuran = 0;
                
                      for (let bulan = 1; bulan <= jangkaWaktuTahun * 12; bulan++) {
                        const bungaBulanan = sisaPinjaman * sukuBungaBulanan;
                        const pembayaranPokok = jumlahAngsuran - bungaBulanan;
                        sisaPinjaman -= pembayaranPokok;
                
                        rincianBulanan.push({
                          bulan: bulan,
                          angsuranBulanan: jumlahAngsuran,
                          bungaBulanan: bungaBulanan,
                          pembayaranPokok: pembayaranPokok,
                          sisaPinjaman: sisaPinjaman
                        });
                
                        totalBunga += bungaBulanan;
                        totalAngsuran += jumlahAngsuran;
                      }
                
                      return {
                        rincianBulanan: rincianBulanan,
                        totalPinjaman: jumlahPinjamanSetelahDP,
                        totalBunga: totalBunga,
                        totalAngsuran: totalAngsuran
                      };
                    }
          
            function hitungKPR() {
              const jumlahPinjaman = parseFloat(document.getElementById('jumlahPinjaman').value);
              const uangMuka = parseFloat(document.getElementById('uangMuka').value);
              const sukuBungaFloating = parseFloat(document.getElementById('sukuBungaFloating').value);
              const jangkaWaktuTahun = parseFloat(document.getElementById('jangkaWaktuTahun').value);
          
              if (isFieldEmpty(jumlahPinjaman) || isFieldEmpty(uangMuka) || isFieldEmpty(sukuBungaFloating) || isFieldEmpty(jangkaWaktuTahun)) {
                alert('Harap isi semua field sebelum melakukan perhitungan.');
                return;
              }
          
              const hasilKPR = calculateKPRFloating(jumlahPinjaman, uangMuka, sukuBungaFloating, jangkaWaktuTahun);
              if (!hasilKPR) return; // Jika terjadi error validasi, berhenti.
          
              const rincianKPRFloating = hasilKPR.rincianBulanan;
              const totalPinjaman = formatAngka(hasilKPR.totalPinjaman);
              const totalBunga = formatAngka(hasilKPR.totalBunga);
              const totalAngsuran = formatAngka(hasilKPR.totalAngsuran);
          
              // Tampilkan hasil perhitungan dalam bentuk tabel
              let tableHtml = '<table><tr><th>Bulan</th><th>Angsuran Bulanan</th><th>Bunga Bulanan</th><th>Pokok Bayar</th><th>Sisa Pinjaman</th></tr>';
              rincianKPRFloating.forEach((rincian) => {
                tableHtml += `<tr><td>${rincian.bulan}</td><td>Rp ${formatAngka(rincian.angsuranBulanan)}</td><td>Rp ${formatAngka(rincian.bungaBulanan)}</td><td>Rp ${formatAngka(rincian.pembayaranPokok)}</td><td>Rp ${formatAngka(rincian.sisaPinjaman)}</td></tr>`;
              });
              tableHtml += '</table>';
          
              tableHtml += `<p>Total Pinjaman Setelah DP: Rp ${totalPinjaman}</p>`;
              tableHtml += `<p>Total Bunga: Rp ${totalBunga}</p>`;
              tableHtml += `<p>Total Angsuran: Rp ${totalAngsuran}</p>`;
          
              document.getElementById('hasilKPR').innerHTML = tableHtml;
            }

			function resetForm() {
			document.getElementById('jumlahPinjaman').value = "";
			document.getElementById('uangMuka').value = "";
			document.getElementById('sukuBungaFloating').value = "";
			document.getElementById('jangkaWaktuTahun').value = "";

			document.getElementById('hasilKPR').innerHTML = "";
			}
          </script>
@endsection