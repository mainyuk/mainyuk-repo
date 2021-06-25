<?php $this->load->view('page_header')?>
  <div style="margin-left: 330px;margin-right:335px;margin-top: 120px">
    <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
      <li class="nav-item rounded-top">
        <a class="nav-link active" id="penyewa-tab" onclick="profileOption(event)" data-toggle="tab" href="#editProfile" role="tab" aria-selected="true">Edit Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pemilik-tab" onclick="profileOption(event)" data-toggle="tab" href="#passProfile" role="tab" aria-selected="false">Ubah Password</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pemilik-tab" onclick="profileOption(event)" data-toggle="tab" href="#hapusProfile" role="tab" aria-selected="false">Hapus Akun</a>
      </li>
    </ul>
  </div>
  <div style="margin-right:365px;margin-left:330px">
    <?= $this->session->flashdata('flash'); ?>
    <?= form_error('passBaru','<div class="alert alert-danger nav-justified" style="margin-top:20px" role="alert"><p style="padding-left:0px;" class="text-danger">','</p></div>');?>
    <?= form_error('passLama','<div class="alert alert-danger nav-justified" style="margin-top:20px" role="alert"><p style="padding-left:0px;" class="text-danger">','</p></div>');?>
    <?= form_error('nama','<div class="alert alert-danger nav-justified" style="margin-top:20px" role="alert"><p style="padding-left:0px;" class="text-danger">','</p></div>');?>
    <?= form_error('alamat','<div class="alert alert-danger nav-justified" style="margin-top:20px" role="alert"><p style="padding-left:0px;" class="text-danger">','</p></div>');?>
    <?= form_error('pernyataan','<div class="alert alert-danger nav-justified" style="margin-top:20px" role="alert"><p style="padding-left:0px;" class="text-danger">','</p></div>');?>
    <?= form_error('password','<div class="alert alert-danger nav-justified" style="margin-top:20px" role="alert"><p style="padding-left:0px;" class="text-danger">','</p></div>');?>
  </div>

  <div class="tab-content">
    <div style="margin-top:25px" class="tab-pane active " id="editProfile" role="tabpanel">
        <form method="post" action="<?= base_url('index.php/penyewaControl/editProfile')?>">
            
            <div class="txt-login">Edit Profile Penyewa Tempat</div>
            <input type="text" class="form-control" name="id" hidden value="<?= $this->session->userdata('idPenyewa')?>"/>  
            
            <div style="margin-bottom: 15px">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" value="<?= $this->session->userdata('namaPenyewa')?>"/>
            </div>

            <div style="margin-bottom: 15px">
                <label>Alamat Email</label>
                <input type="email" class="form-control" name="email" value="<?= $this->session->userdata('email')?>" readonly/>
            </div>
            
            <div style="margin-bottom: 15px">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" class="form-control"><?= $this->session->userdata('alamatPenyewa')?></textarea>
            </div>

            <br>
            <div style="text-align: center">
              <input class="btnLogin" type="submit" name="btnEdit" value="Simpan"/>
            </div>
        </form>
    </div>

    <div style="margin-top:25px" class="tab-pane" id="passProfile" role="tabpanel">
        <form method="post" action="<?= base_url('index.php/penyewaControl/editPassProfile')?>">
            <div class="txt-login">Ubah Password</div>
            <input type="Password" class="form-control" name="id" hidden value="<?= $this->session->userdata('idPenyewa')?>"/>  

            <div style="margin-bottom: 15px">
                <label>Password lama</label>
                <input type="Password" class="form-control" name="passLama">
            </div>
            <div style="margin-bottom: 15px">
                <label>Password Baru</label>
                <input type="Password" class="form-control" name="passBaru">
            </div>
            <div style="margin-bottom: 15px">
                <label>Ketik Ulang Password Baru</label>
                <input type="Password" class="form-control" name="passBaruCon">
            </div>
            <br>
            <div style="text-align: center">
              <input class="btnLogin" type="submit" name="btnEdit" value="Ubah Password"/>
            </div>
        </form>
    </div>

    <div style="margin-top:25px" class="tab-pane" id="hapusProfile" role="tabpanel">
        <form method="post" action="<?= base_url('index.php/penyewaControl/delProfile')?>">
            <div class="txt-login">Hapus Akun</div>
            <p align="justify">Penghapusan akun ini hanya bergantung pada keputusan yang anda ambil. Bila anda menghapus akun ini, segala tempat dan transaksi pemesanan tempat yang berhubungungan dengan akun ini akan turut dihilangkan. Bila anda benar-benar ingin menghapus akun ini, silahkan anda salin pernyataan berikut ini, <strong><i>"Saya berkeputusan untuk menghapus akun yang saya miliki, dan saya sepakat dengan konsekuensi yang akan saya dapatkan."</i></strong>          
            <br><br>
            <div style="margin-bottom: 15px">
                <input type="text" class="form-control" name="pernyataanDefault" value="Saya berkeputusan untuk menghapus akun yang saya miliki, dan saya sepakat dengan konsekuensi yang akan saya dapatkan." hidden>
            </div>
            <input type="Password" class="form-control" name="id" hidden value="<?= $this->session->userdata('idPenyewa')?>"/>
            <div style="margin-bottom: 15px">
                <label>Kolom Pernyataan</label>
                <textarea class="form-control" name="pernyataan"></textarea>
            </div>

            <div style="margin-bottom: 15px">
                <label>Masukkan Password</label>
                <input type="Password" class="form-control" name="password">
            </div>
            <div style="text-align: center">
              <input class="btnLogin" type="submit" name="btnEdit" value="Hapus Akun"/>
            </div>
        </form>
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