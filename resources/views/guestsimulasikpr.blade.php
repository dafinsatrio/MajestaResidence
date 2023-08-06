@extends('layouts.guestt')
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
		<div class="menu">
			<button onclick="showKPR()">Simulasi KPR</button>
			<button onclick="showPembayaranCash()">Simulasi Pembayaran Cash</button>
    	</div>

	<div id="kprSection" style="display: none;">
        <!-- Simulasi KPR Section -->
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
                          <label for="uangMukaPersen">Uang Muka (%)</label><br/><br/>
                          <input type="number" name="uangMukaPersen" min="0" max="99" id="uangMukaPersen" class="form-control input-sm" required placeholder="0-99" value="" oninput="validateUangMuka()" />
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

	<div id="cashSection" style="display: none;">
        <!-- Simulasi Pembayaran Cash Section -->
        <div class="container">
            <br/>
            <div class="section-head">
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2>Simulasi Pembayaran <span>Cash</span></h2>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .section-head -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-4 col-md-6">
                    <form onsubmit="event.preventDefault(); hitungPembayaranCash();">
                        <div class="form-group">
                            <label for="hargaRumahCash">Harga Rumah (dalam Rp)</label><br/><br/>
                            <input type="number" name="hargaRumahCash" min="1" id="hargaRumahCash" class="form-control input-sm" required autofocus placeholder="Contoh : 300000000" value="" />
                        </div><br/>
                        <div class="form-group">
                            <label for="diskonCash">Diskon (%)</label><br/><br/>
                            <input type="number" name="diskonCash" min="0" max="99" id="diskonCash" class="form-control input-sm" required placeholder="0-99" value="" oninput="validateDiskon()" />
                        </div><br/>
                        <button type="submit" class="btn btn-primary btn-md col-xs-12">HITUNG PEMBAYARAN CASH</button>
                        <button type="reset" class="btn btn-danger btn-md col-xs-12" onclick="resetCashForm()">RESET</button>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-12 col-lg-8 col-md-6">
                    <div id="hasilPembayaranCash"></div>
                </div>
            </div>
            <hr />
        </div> <!-- /container -->
    </div>
</div>

<script>
        function showKPR() {
            document.getElementById("kprSection").style.display = "block";
            document.getElementById("cashSection").style.display = "none";
        }

        function showPembayaranCash() {
            document.getElementById("kprSection").style.display = "none";
            document.getElementById("cashSection").style.display = "block";
        }

        // Add the JavaScript code for KPR and Pembayaran Cash sections here
		// Default view when the page loads
		window.onload = function () {
        showKPR(); // Display "Simulasi KPR" section by default
        };
		</script>

		<script>
		function validateUangMuka() {
		const jumlahPinjaman = parseFloat(document.getElementById('jumlahPinjaman').value);
		let uangMukaPersen = parseFloat(document.getElementById('uangMukaPersen').value);

		if (uangMukaPersen > 99) {
			alert('Uang Muka Max 99 persen');
			uangMukaPersen = 99;
			document.getElementById('uangMukaPersen').value = uangMukaPersen;
		}

		const uangMuka = (uangMukaPersen / 100) * jumlahPinjaman;
		document.getElementById('uangMuka').value = uangMuka.toFixed(2);
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
		const uangMukaPersen = parseFloat(document.getElementById('uangMukaPersen').value);
		const sukuBungaFloating = parseFloat(document.getElementById('sukuBungaFloating').value);
		const jangkaWaktuTahun = parseFloat(document.getElementById('jangkaWaktuTahun').value);

		if (isFieldEmpty(jumlahPinjaman) || isFieldEmpty(uangMukaPersen) || isFieldEmpty(sukuBungaFloating) || isFieldEmpty(jangkaWaktuTahun)) {
			alert('Harap isi semua field sebelum melakukan perhitungan.');
			return;
			}
			const uangMuka = (uangMukaPersen / 100) * jumlahPinjaman; // Convert percentage to actual amount
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
		document.getElementById('uangMukaPersen').value = "";
		document.getElementById('sukuBungaFloating').value = "";
		document.getElementById('jangkaWaktuTahun').value = "";

		document.getElementById('hasilKPR').innerHTML = "";
		}
  </script>

<script>
    function hitungPembayaranCash() {
        const hargaRumahCash = parseFloat(document.getElementById("hargaRumahCash").value);
        const diskonCash = parseFloat(document.getElementById("diskonCash").value);

        // Validate inputs
        if (isNaN(hargaRumahCash) || isNaN(diskonCash)) {
            alert("Masukkan angka yang valid untuk Harga Rumah dan Diskon.");
            return;
        }

        const totalPembayaranCash = hargaRumahCash - (hargaRumahCash * (diskonCash / 100));

        const hasilPembayaranCash = document.getElementById("hasilPembayaranCash");
        hasilPembayaranCash.innerHTML = `
            <div class="alert alert-success">
                <h4>Hasil Simulasi Pembayaran Cash</h4>
                <p>Total Pembayaran Cash: Rp ${totalPembayaranCash.toLocaleString()}</p>
            </div>
        `;
    }

    function resetCashForm() {
        document.getElementById("hargaRumahCash").value = "";
        document.getElementById("diskonCash").value = "";
        document.getElementById("hasilPembayaranCash").innerHTML = "";
    }

    function validateDiskon() {
        const diskonCash = parseFloat(document.getElementById("diskonCash").value);
        if (isNaN(diskonCash) || diskonCash < 0 || diskonCash > 99) {
            alert("Diskon harus di antara 0 hingga 99.");
            document.getElementById("diskonCash").value = "";
        }
    }
</script>

@endsection