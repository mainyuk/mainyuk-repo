<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pemilikControl extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('editPemilikModel');
        $this->load->model('tempatModel');
        $this->load->model('reservasiModel');
    }

  	public function index()
  	{
  		$this->load->view('editPemilikForm');
  	}

    public function index2(){
      $this->load->view('tes');
    }

  	public function editProfile(){
  		$this->form_validation->set_rules('nama','Nama','required', ['required' =>'Kolom Nama Lengkap tidak boleh kosong']);
    	$this->form_validation->set_rules('alamat','Alamat','required', ['required' =>'Kolom Alamat Lengkap tidak boleh kosong']);
    	if($this->form_validation->run() != TRUE){
		    $this->index();
      	} else {
        	$this->editPemilikModel->edtProfile();
        	redirect('pemilikControl');
      	}
  	}

  	public function editPassProfile(){
  		$this->form_validation->set_rules('passLama','passLama','required|trim|min_length[6]',[
            'min_length'=>'Panjang minimal password adalah 6 karakter',
            'required' =>'Kolom password lama harus diisi'
        ]);
  		$this->form_validation->set_rules('passBaru','passBaru','required|trim|min_length[6]|matches[passBaruCon]',[
            'matches' => 'Pasword baru tidak sesuai',
            'min_length'=>'Panjang minimal password adalah 6 karakter',
            'required' =>'Kolom password baru harus diisi'
        ]);
        $this->form_validation->set_rules('passBaruCon','passBaruCon','required|trim|min_length[6]|matches[passBaru]');
        if($this->form_validation->run() != TRUE){
		    $this->index();
      	} else {
        	$this->editPemilikModel->edtPassProfile();
        	redirect('pemilikControl');
      	}
  	}

  	public function delProfile(){
  		$this->form_validation->set_rules('pernyataanDefault','passBaruCon','required|trim|matches[pernyataan]');
  		$this->form_validation->set_rules('pernyataan','pernyataan','required|trim|matches[pernyataanDefault]',[
  			'matches' => 'Salinan pernyataan tidak sesuai',
  			'required' =>'Kolom pernyataan harus dilengkapi'
  		]);
  		$this->form_validation->set_rules('password','password','required|trim|min_length[6]',[
            'min_length'=>'Panjang minimal password adalah 6 karakter',
            'required' =>'Kolom password harus dilengkapi'
        ]);	
  		if($this->form_validation->run() != TRUE){
		    $this->index();
      	} else {
        	$this->editPemilikModel->hapusProfile();
      	}
  	}

    public function lihatTempat($id){
      $data['tempat'] = $this->tempatModel->getTempat2($id);
      $this->load->view('dashboardPemilik',$data);
    }

    public function keluar(){
      $this->session->sess_destroy();
      redirect('loginControl');
    }

    public function tambahTempatForm(){
      $this->load->view('tempatConfig');
    }

    public function editTempatForm($id){
      $data['tempat'] = $this->tempatModel->getTempatSpesifik($id);
      $this->load->view('editTempat',$data);
    }

    public function tambahTempat(){
      $this->form_validation->set_rules('namatempat','namaTempat','required', ['required' =>'Kolom Nama Tempat tidak boleh kosong']);
      $this->form_validation->set_rules('tarif','tarif','required', ['required' =>'Kolom Tarif Sewa Tempat tidak boleh kosong']);
      $this->form_validation->set_rules('provinsi','provinsi','required', ['required' =>'Kolom Provinsi tidak boleh kosong']);
      $this->form_validation->set_rules('kota','kota','required', ['required' =>'Kolom Kota tidak boleh kosong']);
      $this->form_validation->set_rules('kecamatan','kecamatan','required', ['required' =>'Kolom Kecamatan tidak boleh kosong']);
      $this->form_validation->set_rules('alamat','alamat','required', ['required' =>'Kolom Alamat Tempat tidak boleh kosong']);
      $this->form_validation->set_rules('deskripsi','deskripsi','required', ['required' =>'Kolom Deskripsi Tempat tidak boleh kosong']);
      if($this->form_validation->run() != TRUE){
        $this->tambahTempatForm();
      } else {
        $this->tempatModel->tambahTempat();
      } 
    }

    public function editTempat($id){
      $this->form_validation->set_rules('namatempat','namaTempat','required', ['required' =>'Kolom Nama Tempat tidak boleh kosong']);
      $this->form_validation->set_rules('tarif','tarif','required', ['required' =>'Kolom Tarif Sewa Tempat tidak boleh kosong']);
      $this->form_validation->set_rules('provinsi','provinsi','required', ['required' =>'Kolom Provinsi tidak boleh kosong']);
      $this->form_validation->set_rules('kota','kota','required', ['required' =>'Kolom Kota tidak boleh kosong']);
      $this->form_validation->set_rules('kecamatan','kecamatan','required', ['required' =>'Kolom Kecamatan tidak boleh kosong']);
      $this->form_validation->set_rules('alamat','alamat','required', ['required' =>'Kolom Alamat Tempat tidak boleh kosong']);
      $this->form_validation->set_rules('deskripsi','deskripsi','required', ['required' =>'Kolom Deskripsi Tempat tidak boleh kosong']);
      if($this->form_validation->run() != TRUE){
        $this->editTempatForm($id);
      } else {
        $this->tempatModel->editTempat($id);
      } 
    }

    public function hapusTempat($id){
      $this->tempatModel->hapusTempat($id);
    }

    public function lihatPemesanan(){
      $this->load->view('lihatPemesananPemilik');
    }

    public function hapusReservasiPemilik($id){
      $this->reservasiModel->hapusReservasi($id);
    }
}
