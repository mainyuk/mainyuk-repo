<html>
<head>
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-4.2.1.css')?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>"/>
    <link rel="stylesheet" href="<?= base_url('assets/css/editForm.css')?>"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta meta name="viewport" content="width=device-width, user-scalable=no" /> 
</head>
<style>
  body{
    overflow-x:hidden;
  }
  .bungkus{
    width: 100%;
    position: relative;
    margin-top:80px;
  }

	.example {
      position: absolute;
      bottom: 15%;
      right: 30%;
      text-align: center;
	}
  .bingung{
    font-family: Sunflower;
    font-style: normal;
    font-weight: bold;
    font-size: 48px;
    color: #FFFFFF;
    text-shadow: 2px 4px 4px #424242;
  }
  .bingung2{
    font-family: Sunflower;
    font-style: normal;
    font-weight: 500;
    font-size: 34px;
    line-height: 60px;
    color: #FFFFFF;
  }
  .kotakCari{
    width: 560px;
    height: 160px;
    left: 195px;
    top: 356px;
    background: rgba(0, 0, 0, 0.7);
    border-radius: 10px;
  }
  .listTempat{
    padding-left: 135px;
    padding-right: 135px;
  }
  .labelReko2{
    font-family: Sunflower;
    font-style: normal;
    font-weight: 300;
    font-size: 24px;
    line-height: 30px;
    color: #676767;
  }
  .labelReko1{
    font-family: Sunflower;
    font-style: normal;
    font-weight: bold;
    font-size: 36px;
    line-height: 45px;
    color: #676767;
  }
  .labelTempat{
    margin-top: 50px;
    text-align: center;
  }
  .atas{
    box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25);
  }
  .dropdown-menu {
    background:rgba(0, 188, 212, 0.7);
    border:none; 
    border-radius: 20;
  }
  .dropdown-item{
    margin-top: 5px;
    margin-bottom: 10px
    font-family: Roboto;
    font-style: normal;
    font-weight: 520;
    font-size: 14px;
    line-height: 22px;
    color:white;
  }
  .tempatThumbnail{
    width: 180px;
    height: 100px;
    background-color: grey;
    border-radius: 5px;
  }
  .detilPemesanan{
    width: 100%;
    height: 300px;
    background: rgba(196, 196, 196, 0.2);
    border-radius: 5px;
  }
  .detilPemesananIn{
    padding-bottom: 20px;
    padding-top: 20px;
    padding-left: 50px;
    padding-right: 50px;
  }
  .statusPem{
    height: 27px;
    background: #C02C2C;
    border-radius: 5px;
    font-family: Sunflower;
    font-style: normal;
    font-weight: bold;
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0.25px;
    color: #FFFFFF;
  }
  .statusPemLunas{
    height: 27px;
    background: #00BCD4;
    border-radius: 5px;
    font-family: Sunflower;
    font-style: normal;
    font-weight: bold;
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0.25px;
    color: #FFFFFF;
  }
  .btnUnggahBukti{
    height: 27px;
    background: #0BC21D;
    border-radius: 5px;
    font-family: Sunflower;
    font-style: normal;
    font-weight: bold;
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0.25px;
    color: #FFFFFF;
    text-decoration: none;
  }
  .textDetilPemesanan{
    font-family: Sunflower;
    font-style: normal;
    font-weight: bold;
    font-size: 20px;
    line-height: 20px;
    letter-spacing: 0.25px;
    color: #676767;
  }
  .textDetilPemesanan2{
    font-family: Sunflower;
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0.25px;
    color: #676767;
  }
</style>
<body>

<div style="width:100%">
  <nav class="navbar navbar-fixed-top navbar-expand-sm navbar-light atas" style="background-color: #ffffff; height: 80px">
    <a class="navbar-brand" href="<?= base_url('index.php/pemilikControl/lihatTempat/')?><?=$this->session->userdata('idPemilik')?>"><img src="<?= base_url('assets/img/icon-Logo.png')?>" height="40" style="margin-top: -10px;margin-left: 130px"/></a>
  <!-- Links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="btnDaftarTmp" href="<?= base_url('index.php/pemilikControl/tambahTempatForm')?>">Daftarkan Tempat Anda</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="margin-right:130px"><span style="font-family: Roboto; font-style: normal; font-weight: bold; font-size: 16px; line-height: 20px; color: #00BCD4;"><?= $this->session->userdata('namaPemilik')?></span></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= site_url('pemilikControl/lihatPemesanan')?>">Pemesanan</a>
          <a class="dropdown-item" href="<?= base_url('index.php/pemilikControl')?>">Edit Profile</a>
          <a class="dropdown-item" href="<?= base_url('index.php/pemilikControl/keluar')?>">Keluar</a>
        </div>
      </li>
    </ul>
  </nav>