<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class daftarControl extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('daftarModel');
    }

  	public function index()
  	{
  		$this->load->view('daftarForm');
  	}

	  public function daftarPemilik()
	  {

      $this->form_validation->set_rules('usernamePemilik','Username','required|is_unique[pemilik.username]', ['required' =>'Kolom Username harus diisi', 'is_unique'=>'Username telah digunakan']);
      $this->form_validation->set_rules('passPemilik','Password','required|min_length[6]', ['required' =>'Kolom Password harus diisi','min_length'=>'Panjang minimal password adalah 6 karakter']);
      $this->form_validation->set_rules('emailPemilik','Email','required|is_unique[pemilik.email]', ['required' =>'Kolom Email harus diisi', 'is_unique' =>'Email tidak bisa digunakan']);
      $this->form_validation->set_rules('namaPemilik','Nama','required', ['required' =>'Kolom Nama Lengkap harus diisi']);
      $this->form_validation->set_rules('alamatPemilik','Alamat','required', ['required' =>'Kolom Alamat harus diisi']);
      if($this->form_validation->run() != TRUE){
		    $this->load->view('daftarForm');
      } else {
        $this->daftarModel->daftarPem();            
      }
    }

    public function daftarPenyewa()
    {
      $this->form_validation->set_rules('usernamePenyewa','Username','required|is_unique[pemilik.username]', ['required' =>'Kolom Username harus diisi', 'is_unique'=>'Username telah digunakan']);
      $this->form_validation->set_rules('passPenyewa','Password','required|min_length[6]', ['required' =>'Kolom Password harus diisi','min_length'=>'Panjang minimal password adalah 6 karakter']);
      $this->form_validation->set_rules('emailPenyewa','Email','required|is_unique[pemilik.email]', ['required' =>'Kolom Email harus diisi', 'is_unique' =>'Email tidak bisa digunakan']);
      $this->form_validation->set_rules('namaPenyewa','Nama','required', ['required' =>'Kolom Nama Lengkap harus diisi']);
      $this->form_validation->set_rules('alamatPenyewa','Alamat','required', ['required' =>'Kolom Alamat harus diisi']);
      if($this->form_validation->run() != TRUE){
        $this->load->view('daftarForm');
      } else {
        $this->daftarModel->daftarPen();                       
      }
    }
}
