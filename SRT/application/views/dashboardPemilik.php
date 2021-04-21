<?php $this->load->view('page_header_pem') ?>
<div class="bungkus">
  <img class="nav-justified" src="<?= base_url('assets/img/bg-main.png') ?>">
  <div class="example">
    <?php
    $myvalue = $this->session->userdata('namaPemilik');
    $arr = explode(' ', trim($myvalue)); ?>
    <h2 class="bingung">Selamat Datang, <?= $arr[0] ?></h2>
    <h4 class="bingung2">Kelola Tempatmu Di Sini</h4>
    <br>
    <div class="kotakCari" style="padding-top: 25px; padding-bottom: 20px; padding-right: 140px; padding-left: 150px">
      <table>
        <tr>
          <td>
            <?php
            $ci = &get_instance();
            $ci->load->model('tempatModel');
            $data = $ci->tempatModel->countTempat($this->session->userdata('idPemilik'));
            foreach ($data as $d) {
            ?>
              <div class="d-flex justify-content-start">
                <p style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 36px; line-height: 45px; margin-left: 12px; color: white">0<?= $d['pemCount'] ?></p>
              </div>
            <?php } ?>
          </td>
          <td>
            <?php
            $ci = &get_instance();
            $ci->load->model('tempatModel');
            $data = $ci->tempatModel->countPemesanan($this->session->userdata('idPemilik'));
            foreach ($data as $s) {
            ?>
              <div class="d-flex justify-content-end">
                <p style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 36px; line-height: 45px; margin-right: 30px; color: white">0<?= $s['temCount'] ?></p>
              </div>
            <?php } ?>
          </td>
        </tr>
      </table>
      <table>
        <tr>
          <td>
            <div class="d-flex justify-content-start">
              <p style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 20px; line-height: 25px;color: white">Tempat</p>
            </div>
          </td>
          <td>
            <div class="d-flex justify-content-end">
              <p style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 20px; line-height: 25px;color: white">Pemesanan</p>
            </div>
          </td>
        </tr>
      </table>
      <table>
        <tr>
          <td>
            <div class="d-flex justify-content-start">
              <p style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 16px; line-height: 10px;color: white; margin-left: 6px">Dimiliki</p>
            </div>
          </td>
          <td>
            <div class="d-flex justify-content-end">
              <p style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 16px; line-height: 8px;color: white; margin-right: 28px;">Terjadi</p>
            </div>
          </td>
        </tr>
      </table>
    </div>
  </div>
  </img>
</div>


<div class="listTempat">
  <div class="labelTempat">
    <h2 class="labelReko1">Daftar <span style="color: #00BCD4;">Tempat</span> yang Anda miliki</h2>
  </div>
</div>
<div class="row ml-auto">
  <div class="col d-flex justify-content-center">
    <?= $this->session->flashdata('flash'); ?>
  </div>
</div>
<div class="row" style="width:1130px; height: auto; margin-left:130px; margin-right: 130px;margin-top: 50px">
  <div class="card-columns">
    <?php
    if (!empty($tempat)) {
      foreach ($tempat as $row) { ?>
        <div class="card" style="width:320px; height:auto;margin-bottom: 20px">
          <img class="card-img-top img-fluid" src="<?= base_url('assets/img/daftarSRT.png') ?>" alt="Card image" style="width:100%; height: 190px;">
          <div class="card-body">
            <h4 class="card-title" style="font-family: Roboto;font-style: normal;font-weight: 500;font-size: 20px;line-height: 23px;"><?= $row->namaTempat ?></h4>
            <h5 class="card-title" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767">oleh <?= $row->namaPemilik ?></h5>

            <div style="margin-left: 30px;margin-right: 30px">
              <div class="row" style="margin-bottom: 10px;margin-top: 25px">
                <div class="col-1"><i class="fa fa-map" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
                <div class="col-10" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767"><?= $row->alamat ?></div>
              </div>
              <div class="row" style="margin-bottom: 10px">
                <div class="col-1"><i class="fa fa-tags" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
                <div class="col-10" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767"><?= $row->kategori ?></div>
              </div>
              <!-- <div class="row" style="margin-bottom: 30px">
                <div class="col-1"><i class="fa fa-user-circle" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
                <div class="col-10" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767"><?= $row->kapasitas ?></div>
              </div> -->
            </div>
            <div class="row">
              <div class="col">
                <a href="<?= base_url('index.php/pemilikControl/editTempatForm/') ?><?= $row->idTempat ?>" class="btn btn-primary" style="width: 100%; background-color: #0BC21D; border:none; padding:10px"><span style="font-family: Roboto; font-style: normal; font-weight: 500; font-size: 14px; line-height: 14px;">Edit Tempat</span> </a>
              </div>
              <div class="col"><a class="btn btn-primary" onclick="confirmHapus(<?= $row->idTempat ?>)" style="width: 100%; background-color: red; border:none; padding:10px"><span style="color: white; font-family: Roboto; font-style: normal; font-weight: 500; font-size: 14px; line-height: 14px;">Hapus Tempat</span></a></div>
            </div>

          </div>
        </div>

      <?php
      }
    } else { ?>
  </div>
</div>
<table style="width: 1340px; border-radius:5px;">
  <tr>
    <td>
      <h1 class="d-flex justify-content-center" style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 24px; color: #676767">Belum ada tempat yang terdaftar</h1>
    </td>
  </tr>
  <tr>
    <td>
      <h3 class="d-flex justify-content-center" style="font-family: Sunflower; font-style: normal; font-weight: 500; font-size: 18px; color: #676767;margin-bottom: 30px">Tekan tombol di bawah untuk daftarkan tempat</h3>
    </td>
  </tr>
  <tr>
    <td>
      <div class="d-flex justify-content-center" style="margin-bottom: 100px">
        <a class="btnDaftarTmp" href="<?= base_url('index.php/pemilikControl/tambahTempatForm') ?>">Daftarkan Tempat Anda</a>
      </div>
    </td>
  </tr>
</table>
<?php } ?>
</div>
</body>
<script type="text/javascript">
  function confirmHapus(id) {
    var notice = confirm("Apakah Anda ingin menghapus tempat ini?")
    if (notice == true) {
      window.location.href = "<?= site_url('pemilikControl/hapusTempat/') ?>" + id;
    } else {
      x = "Anda telah membatalkan penghapusan tempat";
      alert(x);
    }
  }
</script>

</html>