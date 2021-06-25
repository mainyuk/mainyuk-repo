<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class daftarModel extends CI_Model {

	public function daftarPem(){
    $data = [
        "namaPemilik" => $this->input->post('namaPemilik', true),
        "alamatPemilik" => $this->input->post('alamatPemilik', true),
        "email" => $this->input->post('emailPemilik', true),
        "username" => $this->input->post('usernamePemilik', true),
        "password" => password_hash($this->input->post('passPemilik', true), PASSWORD_DEFAULT)
    ];
    $this->db->insert('pemilik', $data);
    $this->session->set_flashdata('flash','<div class="alert alert-success" role="alert"><h3>Selamat</h3>Anda telah terdaftar sebagai <strong>pemilik tempat</strong> <hr>
    	<a href="loginControl/index"class="alert-link">klik untuk masuk</a></div>');
    redirect('daftarControl');
    }

    public function daftarPen(){
    $data = [
        "namaPenyewa" => $this->input->post('namaPenyewa', true),
        "alamatPenyewa" => $this->input->post('alamatPenyewa', true),
        "email" => $this->input->post('emailPenyewa', true),
        "username" => $this->input->post('usernamePenyewa', true),
        "password" => password_hash($this->input->post('passPenyewa', true), PASSWORD_DEFAULT)
    ];
    $this->db->insert('penyewa', $data);
    $this->session->set_flashdata('flash','<div class="alert alert-success" role="alert"><h3><strong>Selamat</strong></h3>Anda telah terdaftar sebagai <strong>penyewa tempat</strong><hr>
    	<a href="loginControl/index"class="alert-link">klik untuk masuk</a></div>');
    redirect('daftarControl');
    }
}