<?php $this->load->view('page_header') ?>
<div style="margin-top: 150px;margin-left: 300px;margin-right: 300px">
  <div style="width: 800px; height: 400px; border-radius: 10px;background: url(tempat-img-1.png), #C4C4C4;"></div>
  <div style="width: 800px; height: auto; margin-top: 40px; margin-bottom: 50px">
    <?php
    if (!empty($tempat)) {
      foreach ($tempat as $row) { ?>
        <div class="row">
          <div class="col">
            <h1 style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 36px; line-height: 30px; color: #787878;"><?= $row->namaTempat ?></h1>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <h3 style="font-family: Sunflower; font-style: normal; font-weight: 500; font-size: 24px; line-height: 10px; color: #787878;">oleh <?= $row->namaPemilik ?></h3>
          </div>
        </div>

        <div class="row">
          <div class="col-7">
            <div class="row" style="margin-bottom: 20px;margin-top: 25px">
              <div class="col-1"><i class="fa fa-map" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
              <div class="col-10" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767"><?= $row->alamat ?>, <?= $row->kecamatan ?>, <?= $row->kota ?>, <?= $row->provinsi ?></div>
            </div>
            <div class="row" style="margin-bottom: 20px">
              <div class="col-1"><i class="fa fa-tags" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
              <div class="col-10" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767"><?= $row->kategori ?></div>
            </div>
            <!-- <div class="row" style="">
            <div class="col-1"><i class="fa fa-user-circle" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
            <div class="col-10" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767"><?= $row->kapasitas ?></div>
          </div> -->
          </div>
          <div class="col" style="margin-top: 40px">
            <div class="row d-flex justify-content-end">
              <p style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 28px; line-height: 20px; letter-spacing: 0.25px; color: #787878;">Rp <?= $row->tarif ?>/ net</p>
            </div>
            <div class="row d-flex justify-content-end">
              <form action="<?= site_url('penyewaControl/aturPemesanan/') ?><?= $row->idTempat ?>">
                <button class="btnPesanSkrg" type="submit"><span style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 18px; line-height: 20px; letter-spacing: 0.25px; color: #FFFFFF;">Pesan Sekarang</span></button>
              </form>
            </div>
          </div>
        </div>

        <div class="row" style="margin-top: 40px">
          <div class="col">
            <h1 style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 32px; line-height: 20px; letter-spacing: 0.25px; color: #787878;">Deskripsi Tempat</h1>
          </div>
        </div>

        <div class="row" style="margin-top: 10px">
          <div class="col">
            <h1 style="font-family: Sunflower; font-style: normal; font-weight: 300; font-size: 16px; line-height: 20px; text-align: justify; letter-spacing: 0.25px; color: #676767;"><?= $row->deskripsi ?></h1>
          </div>
        </div>
    <?php }
    } ?>
  </div>
</div>
</div>
</body>

</html>