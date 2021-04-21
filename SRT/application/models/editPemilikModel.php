<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class editPemilikModel extends CI_Model {

	public function edtProfile(){
    $data = [
        "idPemilik" => $this->input->post('id',true),
        "namaPemilik" => $this->input->post('nama', true),
        "alamatPemilik" => $this->input->post('alamat', true),
    ];
    $this->db->where('idPemilik = ',$data['idPemilik']);
    $this->db->update('pemilik', $data);
    $this->session->set_userdata('namaPemilik', $data['namaPemilik']);
    $this->session->set_userdata('alamatPemilik', $data['alamatPemilik']);
    $this->session->set_flashdata('flash','<div class="alert alert-success nav-justified" style="margin-top:20px" role="alert">Profile  anda <strong>berhasil</strong> disimpan</div>');
    }

    public function edtPassProfile(){
        $id = $this->input->post('id');
        $password =  $this->input->post('passLama');
        $cek = $this->db->get_where('pemilik',['idPemilik' => $id])->row_array();
        if(password_verify($password, $cek['password'])){
            $data = ["password" => password_hash($this->input->post('passBaru', true), PASSWORD_DEFAULT)];
            $this->db->where('idPemilik = ',$id);
            $this->db->update('pemilik', $data);
            $this->session->set_flashdata('flash','<div class="alert alert-success nav-justified" style="margin-top:20px" role="alert">Password akun anda <strong>berhasil</strong> diubah</div>');
        }
        else {
            $this->session->set_flashdata('flash','<div class="alert alert-danger nav-justified" style="margin-top:20px" role="alert">Password yang anda masukkan <strong>salah</strong></div>');
        }
    }

    public function hapusProfile(){
        $id = $this->input->post('id');
        $password =  $this->input->post('password');
        $cek = $this->db->get_where('pemilik',['idPemilik' => $id])->row_array();
        if(password_verify($password, $cek['password'])){
            $this->session->sess_destroy();
            $this->db->where("idPemilik",$id);
            $this->db->delete("pemilik");
            $this->session->set_flashdata('flash','<div class="alert alert-success" style="margin-top:20px; width:325px" role="alert">Akun anda <strong>berhasil dihapus</strong><hr>Terima kasih atas partisipasi anda sebagai mitra penyedia tempat pada SRT</div>');
            redirect('loginControl');
        }
        else {
            $this->session->set_flashdata('flash','<div class="alert alert-danger nav-justified" style="margin-top:20px" role="alert">Password yang anda masukkan <strong>salah</strong></div>');
            redirect('pemilikControl');
        }
    }

    public function keluar(){
        $this->session->sess_destroy();
        redirect('loginControl');
    }
}