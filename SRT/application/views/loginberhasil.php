<?php $this->load->view('page_header') ?>
<div class="bungkus">
  <img class="nav-justified" src="<?= base_url('assets/img/bg-main.png') ?>">
  <div class="example">
    <h2 class="bingung">Bingung Cari <span style="color: #00BCD4;">Lapangan</span> Olahraga?</h2>
    <h4 class="bingung2">Kami siap membantu Anda menemukan lapangan</h5>
      <h4 class="bingung2">dengan harga TERMURAH</h5>
        <br>
        <br>
        <div class="kotakCari">

        </div>
  </div>
  </img>
</div>

<div class="listTempat">
  <div class="labelTempat">
    <h2 class="labelReko1">Rekomendasi <span style="color: #00BCD4;">Lapangan</span> untuk Anda</h2>
    <h4 class="labelReko2">Kami menyediakan lapangan yang terbaik untuk Anda</h4>
  </div>
</div>

<div class="row" style="width:1130px; height: auto; margin-left:130px; margin-right: 130px;margin-top: 50px">
  <div class="card-columns">
    <?php
    if (!empty($tempat)) {
      foreach ($tempat as $row) { ?>
        <a href="<?= site_url('penyewaControl/detailTempat/') ?><?= $row->idTempat ?>" class="link-item">
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


              <a href="<?= site_url('penyewaControl/detailTempat/') ?><?= $row->idTempat ?>" class="btn btn-primary" style="width: 100%; background-color: #0BC21D; border:none; padding:10px"><span style="font-family: Roboto; font-style: normal; font-weight: 400; font-size: 18px; line-height: 14px;">Detail Tempat</span> </a>
            </div>
          </div>
        </a>
      <?php
      }
    } else { ?>
      <div style="width:100%;">
        <h5 style="text-align: center;">Belum Ada Tempat</h5>
      </div>
    <?php } ?>
  </div>
</div>
</div>



</body>
<script type="text/javascript">
  function profileOption(evt) {
    var i, tabcontent;

    tablinks = document.getElementsByClassName("nav-link");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    evt.currentTarget.className += " active";
  }
</script>

</html>