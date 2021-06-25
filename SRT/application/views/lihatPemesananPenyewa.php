<?php $this->load->view('page_header') ?>
<div style="margin-top: 150px;margin-left: 200px;margin-right: 200px">
  <h1 style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 36px; line-height: 20px; letter-spacing: 0.25px; color: #787878;">Riwayat Pemesanan</h1>
  <div class="row ml-auto">
    <div class="col d-flex justify-content-center">
      <?= $this->session->flashdata('flash'); ?>
    </div>
  </div>
  <div class="row" style="margin-top: 20px">
    <div class="col">
      <h1 style="font-family: Sunflower; font-style: normal; font-weight: 500; font-size: 24px; line-height: 20px; letter-spacing: 0.25px; color: #787878;">Pemesanan Belum Lunas</h1>
    </div>
  </div>
  <?php
  $ci = &get_instance();
  $ci->load->model('reservasiModel');
  $data = $ci->reservasiModel->getReservasiBelum($this->session->userdata('idPenyewa'));
  if (!empty($data)) {
    foreach ($data as $d) {
  ?>
      <div class="row" style="margin-top: 20px;">
        <div class="col" style="">
          <div class="row" style="">
            <div class="col atas" style="border-radius: 5px">
              <div class="row" style="padding-bottom: 20px; padding-top: 20px; padding-left: 10px; padding-right: 20px;">
                <div class="col-3" style="margin-right: 10px">
                  <div class="tempatThumbnail"></div>

                  <div class="row">
                    <div class="col" style="margin-top: 10px">
                      <p style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 20px; line-height: 35px; color: #787878;"><?= $d['namaTempat'] ?></p>
                    </div>
                  </div>

                  <div class="row" style="margin-bottom: 10px;margin-top: 5px">
                    <div class="col-1"><i class="fa fa-map" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
                    <div class="col-9" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767; margin-left: 10px;"><?= $d['alamat'] ?></div>
                  </div>
                  <div class="row" style="margin-bottom: 10px">
                    <div class="col-1"><i class="fa fa-tags" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
                    <div class="col-9" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767; margin-left: 10px;"><?= $d['kategori'] ?></div>
                  </div>
                  <!-- <div class="row" style="">
                  <div class="col-1"><i class="fa fa-user-circle" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
                  <div class="col-9" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767; margin-left: 10px;"><?= $d['kapasitas'] ?></div>
                </div> -->

                </div>
                <div class="col">
                  <div class="row">
                    <div class="detilPemesanan">
                      <div class="detilPemesananIn">
                        <div class="row">
                          <p class="textDetilPemesanan">Waktu Penyewaan</p>
                        </div>
                        <div class="row" style="margin-bottom: 15px">
                          <div class="col textDetilPemesanan2">
                            <?= $d['mulaiSewa'] ?> sampai <?= $d['akhirSewa'] ?>
                          </div>
                        </div>
                        <div class="row">
                          <p class="textDetilPemesanan">Metode Pembayaran</p>
                        </div>
                        <div class="row" style="margin-bottom: 15px">
                          <div class="col textDetilPemesanan2">
                            <?= $d['jenisPembayaran'] ?>
                          </div>
                        </div>
                        <div class="row">
                          <p class="textDetilPemesanan">Biaya Sewa</p>
                        </div>
                        <div class="row" style="margin-bottom: 15px">
                          <div class="col textDetilPemesanan2">
                            Rp <?= $d['biaya'] ?>
                          </div>
                        </div>
                        <div class="row">
                          <p class="textDetilPemesanan">Status Pembayaran</p>
                        </div>
                        <div class="row" style="">
                          <div class="col-3 statusPem">
                            <p style="padding-left: 15px; padding-top: 4px">Belum Lunas</p>
                          </div>
                          <div class="col-3 btnUnggahBukti" style="margin-left: 20px; padding-left: 27px; padding-top: 4px;">
                            <a href="<?= site_url('penyewaControl/unggahBuktiPemesanan/') ?><?= $d['idReservasi'] ?>" style="text-decoration: none; color: #FFFFFF;">Unggah Bukti</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-1">
              <div class="d-flex align-items-center" style="height: 350px">
                <a href="" onclick="confirmHapus(<?= $d['idReservasi'] ?>)" style="width: 50px; height: 50px; background-color: #C02C2C; border-radius: 100px; text-decoration: none; padding-top: 2px;">
                  <span style="font-family: Arial Rounded MT Bold; font-size: 32px; padding-left: 15px; color:white;">X</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php }
  } else { ?>
    <p>Belum ada pemesanan
    <?php } ?>
    <div class="row" style="margin-top: 20px">
      <div class="col">
        <h1 style="font-family: Sunflower; font-style: normal; font-weight: 500; font-size: 24px; line-height: 20px; letter-spacing: 0.25px; color: #787878;">Pemesanan Sudah Lunas</h1>
      </div>
    </div>
    <?php
    $ci = &get_instance();
    $ci->load->model('reservasiModel');
    $data = $ci->reservasiModel->getReservasiLunas($this->session->userdata('idPenyewa'));
    if (!empty($data)) {
      foreach ($data as $d) {
    ?>
        <div class="row" style="margin-top: 20px;">
          <div class="col" style="">
            <div class="row" style="">
              <div class="col atas" style="border-radius: 5px">
                <div class="row" style="padding-bottom: 20px; padding-top: 20px; padding-left: 10px; padding-right: 20px;">
                  <div class="col-3" style="margin-right: 10px">
                    <div class="tempatThumbnail"></div>

                    <div class="row">
                      <div class="col" style="margin-top: 10px">
                        <p style="font-family: Sunflower; font-style: normal; font-weight: bold; font-size: 20px; line-height: 35px; color: #787878;"><?= $d['namaTempat'] ?></p>
                      </div>
                    </div>

                    <div class="row" style="margin-bottom: 10px;margin-top: 5px">
                      <div class="col-1"><i class="fa fa-map" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
                      <div class="col-9" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767; margin-left: 10px;"><?= $d['alamat'] ?></div>
                    </div>
                    <div class="row" style="margin-bottom: 10px">
                      <div class="col-1"><i class="fa fa-tags" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
                      <div class="col-9" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767; margin-left: 10px;"><?= $d['kategori'] ?></div>
                    </div>
                    <div class="row" style="">
                      <div class="col-1"><i class="fa fa-user-circle" aria-hidden="true" style="color:#00BCD4;font-size:20px"></i></div>
                      <div class="col-9" style="font-family: Roboto; font-style: normal; font-weight: normal; font-size: 14px; line-height: 20px;color: #676767; margin-left: 10px;"><?= $d['kapasitas'] ?></div>
                    </div>

                  </div>
                  <div class="col">
                    <div class="row">
                      <div class="detilPemesanan">
                        <div class="detilPemesananIn">
                          <div class="row">
                            <p class="textDetilPemesanan">Waktu Penyewaan</p>
                          </div>
                          <div class="row" style="margin-bottom: 15px">
                            <div class="col textDetilPemesanan2">
                              <?= $d['mulaiSewa'] ?> sampai <?= $d['akhirSewa'] ?>
                            </div>
                          </div>
                          <div class="row">
                            <p class="textDetilPemesanan">Metode Pembayaran</p>
                          </div>
                          <div class="row" style="margin-bottom: 15px">
                            <div class="col textDetilPemesanan2">
                              <?= $d['jenisPembayaran'] ?>
                            </div>
                          </div>
                          <div class="row">
                            <p class="textDetilPemesanan">Biaya Sewa</p>
                          </div>
                          <div class="row" style="margin-bottom: 15px">
                            <div class="col textDetilPemesanan2">
                              <?= $d['biaya'] ?>
                            </div>
                          </div>
                          <div class="row">
                            <p class="textDetilPemesanan">Status Pembayaran</p>
                          </div>
                          <div class="row" style="">
                            <div class="col-3 statusPemLunas">
                              <p style="padding-left: 35px; padding-top: 4px">Lunas</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="col-1">
              </div>
            </div>
          </div>
        </div>
      <?php }
    } else { ?>
      <p>Belum ada pemesanan
      <?php } ?>
</div>
</div>
<p id="d">
  </body>
  <script type="text/javascript">
    function confirmHapus(id) {
      var notice = confirm("Apakah Anda ingin pemesanan tempat ini?")
      if (notice == true) {
        window.location.href = "<?= site_url('penyewaControl/hapusReservasiPenyewa/') ?>" + id;
      } else {
        x = "Anda telah membatalkan penghapusan tempat";
        alert(x);
      }
    }
  </script>

  </html>