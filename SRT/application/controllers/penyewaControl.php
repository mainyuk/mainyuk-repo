<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penyewaControl extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('editPenyewaModel');
        $this->load->model('tempatModel');
        $this->load->model('reservasiModel');
    }

  	public function index()
  	{
  		$this->load->view('editPenyewaForm');
  	}

  	public function editProfile(){
  		$this->form_validation->set_rules('nama','Nama','required', ['required' =>'Kolom Nama Lengkap tidak boleh kosong']);
    	$this->form_validation->set_rules('alamat','Alamat','required', ['required' =>'Kolom Alamat Lengkap tidak boleh kosong']);
    	if($this->form_validation->run() != TRUE){
		    $this->index();
      	} else {
        	$this->editPenyewaModel->edtProfile();
        	redirect('penyewaControl');
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
        	$this->editPenyewaModel->edtPassProfile();
        	redirect('penyewaControl');
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
        	$this->editPenyewaModel->hapusProfile();
      	}
  	}

    public function lihatTempat(){
      $data['tempat'] = $this->tempatModel->getTempat();
      $this->load->view('loginberhasil',$data);
    }

    public function keluar(){
        $this->session->sess_destroy();
        redirect('loginControl');
    }

    public function detailTempat($id){
      $data['tempat'] = $this->tempatModel->getTempatSpesifik($id);
      $this->load->view('detailTempat', $data);
    }

    public function lihatPemesanan(){
      $this->load->view('lihatPemesananPenyewa');
    }

    public function hapusReservasiPenyewa($id){
      $this->reservasiModel->hapusReservasi($id);
    }

    public function aturPemesanan($id){
      $data['tempat'] = $this->tempatModel->getTempatSpesifik($id);
      $this->load->view('aturPemesananTempat', $data);
    }

    public function tambahPemesanan($id,$masuk,$keluar,$biaya,$metode){
      $data = [
        "idPenyewa" => $this->session->userdata('idPenyewa'),
        "idTempat" => $id,
        "mulaiSewa" => $masuk,
        "akhirSewa" => $keluar,
        "status" => 'belum',
        "jenisPembayaran" => $metode,
        "biaya" => $biaya,
        ];
      $this->db->insert('reservasi', $data);
      $this->session->set_flashdata('flash','<div class="alert alert-success" role="alert" style="width:900px;margin-top:10px;">Anda berhasil memesan tempat!</div>');
      redirect('penyewaControl/lihatPemesanan');
    }

    public function unggahBuktiPemesanan($id){
      $value = array('status'=>'lunas');
      $this->db->where('idReservasi',$id);
      $this->db->update('reservasi',$value);
      $this->session->set_flashdata('flash','<div class="alert alert-success" role="alert" style="width:900px;margin-top:10px;">Anda berhasil mengunggah bukti pemesanan tempat!</div>');
      redirect('penyewaControl/lihatPemesanan');
    }
}
