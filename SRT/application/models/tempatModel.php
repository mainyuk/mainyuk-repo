<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tempatModel extends CI_Model
{

    function getTempat()
    {
        $this->db->select("tempat.idTempat, pemilik.namaPemilik, tempat.namaTempat, tempat.deskripsi, tempat.provinsi, tempat.kota, tempat.kecamatan, tempat.alamat, tempat.kategori, tempat.tarif");
        $this->db->from("tempat");
        $this->db->join("pemilik", "tempat.idPemilik = pemilik.idPemilik");
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getTempat2($id)
    {
        $this->db->select("tempat.idTempat, pemilik.namaPemilik, tempat.namaTempat, tempat.deskripsi, tempat.provinsi, tempat.kota, tempat.kecamatan, tempat.alamat, tempat.kategori, tempat.tarif");
        $this->db->from("tempat");
        $this->db->join("pemilik", "tempat.idPemilik = pemilik.idPemilik");
        $this->db->where("tempat.idPemilik", $id);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function getTempatSpesifik($id)
    {
        $this->db->select("tempat.idTempat, pemilik.namaPemilik, tempat.namaTempat, tempat.deskripsi, tempat.provinsi, tempat.kota, tempat.kecamatan, tempat.alamat, tempat.kategori, tempat.tarif");
        $this->db->from("tempat");
        $this->db->join("pemilik", "tempat.idPemilik = pemilik.idPemilik");
        $this->db->where("tempat.idTempat", $id);
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function countTempat($id)
    {
        $this->db->select('count(idPemilik)as "pemCount"');
        $this->db->from('tempat');
        $this->db->where('idPemilik =', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function countPemesanan($id)
    {
        $this->db->select('count(reservasi.idTempat)as "temCount"');
        $this->db->from('reservasi');
        $this->db->join("tempat", "tempat.idTempat = reservasi.idTempat");
        $this->db->where('tempat.idPemilik =', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function tambahTempat()
    {
        $data = [
            "idPemilik" => $this->input->post('id', true),
            "namaTempat" => $this->input->post('namatempat', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            // "kapasitas" => $this->input->post('kapasitas', true),
            "provinsi" => $this->input->post('provinsi', true),
            "kota" => $this->input->post('kota', true),
            "kecamatan" => $this->input->post('kecamatan', true),
            "alamat" => $this->input->post('alamat', true),
            "kategori" => $this->input->post('kategori', true),
            "tarif" => $this->input->post('tarif', true),
        ];
        $this->db->insert('tempat', $data);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" style="width:1110px">Selamat Anda berhasil mendaftarkan tempat!</div>');
        redirect('pemilikControl/lihatTempat');
    }

    function editTempat($id)
    {
        $data = [
            "namaTempat" => $this->input->post('namatempat', true),
            "deskripsi" => $this->input->post('deskripsi', true),
            // "kapasitas" => $this->input->post('kapasitas', true),
            "provinsi" => $this->input->post('provinsi', true),
            "kota" => $this->input->post('kota', true),
            "kecamatan" => $this->input->post('kecamatan', true),
            "alamat" => $this->input->post('alamat', true),
            "kategori" => $this->input->post('kategori', true),
            "tarif" => $this->input->post('tarif', true),
        ];
        $this->db->where('idTempat = ', $id);
        $this->db->update('tempat', $data);
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" style="width:500px">Perubahan Anda telah berhasil disimpan!</div>');
        redirect('pemilikControl/editTempatForm/' . $id);
    }

    function hapusTempat($id)
    {
        $idpem = $this->session->userdata('idPemilik');
        $this->db->where("idTempat", $id);
        $this->db->delete("tempat");
        $this->session->set_flashdata('flash', '<div class="alert alert-success" role="alert" style="width:600px">Anda berhasil menghapus tempat!</div>');
        redirect('pemilikControl/lihatTempat/' . $idpem);
    }
}
