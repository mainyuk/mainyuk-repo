<html>

<head>
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-4.2.1.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-4.2.1.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/loginform.css') ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-fixed-top navbar-expand-sm navbar-light atas" style="background-color: #ffffff; height: 80px">
    <a class="navbar-brand" href="#"><img src="<?= base_url('assets/img/icon-Logo.png') ?>" height="40" style="margin-top: -12px;margin-left: 130px" /></a>
    <ul class="navbar-nav ml-auto">
      <div class="nav-link" style="border:none">
        <form action="<?= base_url('index.php/daftarControl') ?>">
          <input type="submit" id="btnmasuk" value="Daftar" />
        </form>
      </div>
    </ul>
  </nav>

  <div class="bungkus" style="margin-top: 100px">
    <div class="row">
      <div class="col-sm">
        <div class="boundary" style="background-color: #626CFC; height: 480px; width: 520px; border-radius: 10px; background-image: url(<?= base_url('/assets/img/daftarSRT.png') ?>)">
          <div class="top-left logo-white"><img src="<?= base_url('/assets/img/icon-Logo.png') ?>" width="250px"></div>
          <div class="top-left intro" style="margin-top: 10px">Halo, <br> Selamat datang di MainYuk</div>
        </div>
      </div>
      <div class="col-sm kiri">
        <h1 class="masukText">Masuk</h1>
        <?= $this->session->flashdata('flash'); ?>
        <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
          <li class="nav-item rounded-top">
            <a class="nav-link active" id="penyewa-tab" onclick="loginprofile(event)" data-toggle="tab" href="#loginPenyewa" role="tab" aria-selected="true">Penyewa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pemilik-tab" onclick="loginprofile(event)" data-toggle="tab" href="#loginPemilik" role="tab" aria-selected="false">Pemilik</a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="loginPenyewa" role="tabpanel">
            <form action="<?= base_url('index.php/loginControl/loginPenyewa') ?>" method="POST">
              <?= form_error('usernamePenyewa', '<small class="text-danger">', '</small>'); ?>
              <div class="inputWicon">
                <input class="inputUsrname" name="usernamePenyewa" type="text" placeholder="Username">
                <i class="fa fa-user fa-lg icon"></i>
              </div>
              <?= form_error('passPenyewa', '<small class="text-danger">', '</small>'); ?>
              <div class="inputWicon">
                <input class="inputPassword" name="passPenyewa" type="password" placeholder="Password">
                <i class="fa fa-lock fa-lg icon"></i>
              </div>
              <button class="btnLogin" type="submit">Masuk</button>
            </form>
          </div>
          <div class="tab-pane" id="loginPemilik" role="tabpanel">
            <form action="<?= base_url('index.php/loginControl/loginPemilik') ?>" method="POST">
              <?= form_error('usernamePemilik', '<small class="text-danger">', '</small>'); ?>
              <div class="inputWicon">
                <input class="inputUsrname" name="usernamePemilik" type="text" placeholder="Username">
                <i class="fa fa-user fa-lg icon"></i>
              </div>
              <?= form_error('passPemilik', '<small class="text-danger">', '</small>'); ?>
              <div class="inputWicon">
                <input class="inputPassword" name="passPemilik" type="password" placeholder="Password">
                <i class="fa fa-lock fa-lg icon"></i>
              </div>
              <button class="btnLogin" type="submit">Masuk</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
  function loginprofile(evt) {
    var i, tabcontent;

    tablinks = document.getElementsByClassName("nav-link");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    evt.currentTarget.className += " active";
  }
</script>

</html>