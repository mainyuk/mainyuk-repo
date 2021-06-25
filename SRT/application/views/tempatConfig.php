<?php $this->load->view('page_header_pem') ?>
<form action="<?= base_url('index.php/pemilikControl/tambahTempat') ?>" method="POST" style="margin-top: 130px; margin-left: 120px; margin-right: 120px">
	<div class="row">
		<p style="font-family: Roboto; font-style: normal; font-weight: 600; font-size: 28px; line-height: 20px;color: #00BCD4; margin-bottom: 50">Lapangan Seperti Apa yang Ingin Anda Iklankan</p>
	</div>
	<div class="row" style="width: 500px">
		<div>
			<?= $this->session->flashdata('flash'); ?>
			<?= form_error('namatempat', '<div class="alert alert-danger nav-justified" style="margin-top:5px; width:1110px" role="alert"><p style="padding-left:0px;" class="text-danger">', '</p></div>'); ?>
			<?= form_error('tarif', '<div class="alert alert-danger nav-justified" style="margin-top:5px; width:1110px" role="alert"><p style="padding-left:0px;" class="text-danger">', '</p></div>'); ?>
			<?= form_error('provinsi', '<div class="alert alert-danger nav-justified" style="margin-top:5px; width:1110px" role="alert"><p style="padding-left:0px;" class="text-danger">', '</p></div>'); ?>
			<?= form_error('kota', '<div class="alert alert-danger nav-justified" style="margin-top:5px; width:1110px" role="alert"><p style="padding-left:0px;" class="text-danger">', '</p></div>'); ?>
			<?= form_error('kecamatan', '<div class="alert alert-danger nav-justified" style="margin-top:5px; width:1110px" role="alert"><p style="padding-left:0px;" class="text-danger">', '</p></div>'); ?>
			<?= form_error('alamat', '<div class="alert alert-danger nav-justified" style="margin-top:5px; width:1110px" role="alert"><p style="padding-left:0px;" class="text-danger">', '</p></div>'); ?>
			<?= form_error('deskripsi', '<div class="alert alert-danger nav-justified" style="margin-top:5px; width:1110px" role="alert"><p style="padding-left:0px;" class="text-danger">', '</p></div>'); ?>
		</div>
	</div>
	<div class="row">
		<input type="text" class="form-control" name="id" hidden value="<?= $this->session->userdata('idPemilik') ?>" />
		<div class="col ml-auto">
			<div class="form-group">
				<label for="namaTempat" style="font-family: Roboto; font-style: normal; font-weight: 550; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px">Nama Lapangan</label>
				<input name="namatempat" type="text" class="form-control" id="namaTempat" placeholder="Nama Tempat">
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 20px">
		<div class="col">
			<div class="form-group">
				<label for="pilihKategori" style="font-family: Roboto; font-style: normal; font-weight: 550; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px">Pilih Kategori Lapangan</label>
				<select name="kategori" class="form-control" id="pilihKategori">
					<option value="Futsal" selected>Futsal</option>
					<option value="Badminton">Badminton</option>
					<option value="Basket">Basket</option>
				</select>
			</div>
		</div>
		<!-- <div class="col">
			<div class="form-group">
				<label for="pilihKapasitas" style="font-family: Roboto; font-style: normal; font-weight: 550; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px">Durasi</label>
				<select name="kapasitas" class="form-control" id="pilihKapasitas">
					<option value="1 - 2 orang">1 - 2 orang</option>
					<option value="3 - 5 orang">3 - 5 orang</option>
					<option value="5 - 10 orang">5 - 10 orang</option>
					<option value="10 - 15 orang">10 - 15 orang</option>
					<option value="> 15 orang" selected>> 15 orang</option>
				</select>
			</div>
		</div> -->
		<div class="col-5">
			<div class="form-group">
				<label for="namaTempat" style="font-family: Roboto; font-style: normal; font-weight: 550; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px">Tarif</label>
				<input name="tarif" type="text" class="form-control" id="tarif" placeholder="Masukkan tarif sewa misal: 50000">
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 20px">
		<div class="col">
			<div class="form-group">
				<label for="namaTempat" style="font-family: Roboto; font-style: normal; font-weight: 550; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px">Provinsi</label>
				<input name="provinsi" type="text" class="form-control" id="pilihProvinsi" placeholder="Provinsi">
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label for="namaTempat" style="font-family: Roboto; font-style: normal; font-weight: 550; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px">Kota</label>
				<input name="kota" type="text" class="form-control" id="pilihProvinsi" placeholder="Kota">
			</div>
		</div>
		<div class="col">
			<div class="form-group">
				<label for="namaTempat" style="font-family: Roboto; font-style: normal; font-weight: 550; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px">Kecamatan</label>
				<input name="kecamatan" type="text" class="form-control" id="pilihProvinsi" placeholder="Kecamatan">
			</div>
		</div>
		<div class="col-5">
			<div class="form-group">
				<label for="namaTempat" style="font-family: Roboto; font-style: normal; font-weight: 550; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px">Alamat Lengkap</label>
				<input name="alamat" type="text" class="form-control" id="pilihProvinsi" placeholder="Alamat">
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 20px">
		<div class="col">
			<div class="form-group">
				<label for="deskripsiTempat" style="font-family: Roboto; font-style: normal; font-weight: 550; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px">Deskripsi Tempat</label>
				<textarea class="form-control" name="deskripsi"></textarea>
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 20px">
		<div class="col">
			<div class="form-group">
				<input class="btnLogin" style="width: 100%" type="submit" name="btntambahtempat" value="Simpan" />
			</div>
		</div>
	</div>

</form>
</div>
</body>

</html>