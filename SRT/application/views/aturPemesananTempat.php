<?php $this->load->view('page_header') ?>
<?php
if (!empty($tempat)) {
  foreach ($tempat as $row) { ?>
    <div style="margin-top: 150px;margin-left: 200px;margin-right: 200px">
      <div class="row" style="background-color: white">
        <div class="col-1">
          <div class="tempatThumbnail"></div>
        </div>
        <div class="col">

        </div>
        <div class="col-6" style="margin-left: -150px">

          <div class="row">
            <div class="col" style="">
              <p style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 28px; line-height: 35px; color: #787878;"><?= $row->namaTempat ?>
            </div>
          </div>

          <div class="row">
            <div class="col" style="">
              <p style="font-family: Sunflower; font-style: normal; font-weight: normal; font-size: 20px; line-height: 35px; color: #787878;">oleh <?= $row->namaPemilik ?></p>
            </div>
          </div>

        </div>

        <div class="col">

          <div class="row" style="margin-bottom: 10px;margin-top: 5px">
            <div class="col-1"><i class="fa fa-map" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
            <div class="col-9" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767; margin-left: 10px;"><?= $row->alamat ?></div>
          </div>
          <div class="row" style="margin-bottom: 10px">
            <div class="col-1"><i class="fa fa-tags" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
            <div class="col-9" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767; margin-left: 10px;"><?= $row->kategori ?></div>
          </div>
          <!-- <div class="row" style="">
          <div class="col-1"><i class="fa fa-user-circle" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
          <div class="col-9" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767; margin-left: 10px;"><?= $row->kapasitas ?></div>
        </div> -->

        </div>
      </div>

      <div class="row" style="margin-top: 60px;">
        <div class="col" style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 28px; line-height: 20px; letter-spacing: 0.25px; color: #787878;">Pengaturan Pemesanan
        </div>
      </div>


      <div class="row" style="margin-top: 30px;">
        <div class="col">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="namaTempat" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px; margin-right: 5px">Pilih Tanggal masuk</label>
                <input id="mulai" type="date" name="mulai" style="font-family: Sunflower; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px; letter-spacing: 0.25px; color: #00BCD4; background-color: white; height: 40px; width: 150px; border-radius: 5px; border:none; padding-left: 22px;border: 3px solid #00BCD4;">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="namaTempat" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px; margin-right: 5px">Pilih Tanggal keluar</label>
                <input id="keluar" type="date" name="keluar" style="font-family: Sunflower; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px; letter-spacing: 0.25px; color: #00BCD4; background-color: white; height: 40px; width: 150px; border-radius: 5px; border:none; padding-left: 22px; border: 3px solid #00BCD4;">
              </div>
            </div>
            <div class="col ml-auto">
              <a onclick="totalHarga(<?= $row->tarif ?>)" style="text-decoration: none; text-align: center;">
                <div style="height: 40px; background-color: #00BCD4; padding-top: 10px; color:white; font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 16px; line-height: 20px; letter-spacing: 1px; border-radius: 5px">
                  Terapkan
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="row" style="margin-top: 30px">
        <div class="col" style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 28px; line-height: 20px; letter-spacing: 0.25px; color: #787878;">
          Metode pembayaran
        </div>
      </div>

      <div class="row" style="margin-top: 30px">
        <div class="col">
          <div class="form-group">
            <label for="pilihKapasitas" style="font-family: Roboto; font-style: normal; font-weight: 550; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px">Pilih Metode Pembayaran</label>
            <select name="kapasitas" class="form-control" id="pilihMetode">
              <option value="TransferVirtualAccount">Transfer Virtual Account</option>
              <option value="AplikasiDana">Aplikasi Dana</option>
              <option value="AplikasiLinkAja">Aplikasi Link Aja</option>
              <option value="AplikasiOVO">Aplikasi OVO</option>
              <option value="AplikasiGo-Pay">Aplikasi Go-Pay</option>
            </select>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="namaTempat" style="font-family: Roboto; font-style: normal; font-weight: 550; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px; margin-right: 5px">Lama sewa (Hari)</label>
            <p id="lamaSewa" name="namatempat" class="form-control" style="border:none; background-color: white">
          </div>
        </div>
        <div class="col">
          <div class="form-group">
            <label for="namaTempat" style="font-family: Roboto; font-style: normal; font-weight: 550; font-size: 14px; line-height: 20px;color: #676767;margin-bottom: 10px">Biaya Sewa (Rp)</label>
            <input id="idTempat" value="<?= $row->idTempat ?>" hidden>
            <p id="hargaSewa" name="namatempat" class="form-control" style="border:none; background-color: white">
          </div>
        </div>
      </div>
      <div class="row ml-auto">
        <a onclick="pesanTempat()" style="text-align: center">
          <div class="col" style="height: 40px; width: 945px; background-color: #00BCD4; padding-top: 10px; color:white; font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 16px; line-height: 20px; letter-spacing: 1px; border-radius: 5px">
            Pesan Tempat </div>
        </a>

      </div>
      <p id="detail"></p>

    </div>
<?php }
} ?>
</div>
</body>
<script type="text/javascript">
  var cek = false;
  var cHarga = false;
  var harga = 0;
  var idTempat = document.getElementById("idTempat").value;

  function confirmHapus(id) {
    var notice = confirm("Apakah Anda ingin menghapus pemesanan tempat ini?")
    if (notice == true) {
      window.location.href = "<?= site_url('penyewaControl/hapusReservasiPenyewa/') ?>" + id;
    } else {
      x = "Anda telah membatalkan penghapusan tempat";
      alert(x);
    }
  }

  function totalHarga($tSewa) {
    var date1 = new Date(document.getElementById("mulai").value);
    var date2 = new Date(document.getElementById("keluar").value);
    var Difference_In_Time = date2.getTime() - date1.getTime();
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
    if (Date.parse(date1) && Date.parse(date2)) {
      document.getElementById("lamaSewa").innerHTML = (Difference_In_Days + 1);
      document.getElementById("hargaSewa").innerHTML = (Difference_In_Days + 1) * $tSewa;
      harga = (Difference_In_Days + 1) * $tSewa;
      cek = true;
      if (harga > 0) {
        cHarga = true;
      }
    } else if (!Date.parse(date1) && !Date.parse(date2)) {
      x = "Anda belum melengkapi tanggal pemesanan tempat";
      alert(x);
    }
  }

  function pesanTempat() {
    if (cek == true) {
      var masuk = new Date(document.getElementById("mulai").value);
      var dd = masuk.getDate();
      var mm = masuk.getMonth() + 1;
      var yyyy = masuk.getFullYear();
      var tglMasuk = dd + '-' + mm + '-' + yyyy;
      var keluar = new Date(document.getElementById("keluar").value);
      var dd = keluar.getDate();
      var mm = keluar.getMonth() + 1;
      var yyyy = keluar.getFullYear();
      var tglKeluar = dd + '-' + mm + '-' + yyyy;
      var biaya = harga;
      var metode = document.getElementById("pilihMetode").value;
      if (cHarga) {
        if (biaya <= 0) {
          x = "Tanggal yang anda masukkan tidak valid";
          alert(x);
        } else {
          var notice = confirm("Apakah Anda ingin memesan tempat ini?")
          if (notice == true) {
            window.location.href = "<?= site_url('penyewaControl/tambahPemesanan/') ?>" + idTempat + "/" + tglMasuk + "/" + tglKeluar + "/" + biaya + "/" + metode;
          } else {
            x = "Anda telah membatalkan pemesanan tempat";
            alert(x);
          }
        }
      } else {
        x = "Tanggal yang anda masukkan tidak valid";
        alert(x);
      }
    } else {
      x = "Anda belum menetapkan tanggal pemesanan tempat";
      alert(x);
    }
  }
</script>

</html>