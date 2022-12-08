<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Content extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("m_Penjualan", "", TRUE);
  }
  // Home
  public function index()
  {
    if (!$this->session->userdata('email')) {
      redirect('auth');
    } else {
      $data['title'] = 'Beranda';
      $data['user'] = $this->db->get_where('user', ['email' =>
      $this->session->userdata('email')])->row_array();

      $this->load->view('templates/beranda_header', $data);
      $data['barang'] = $this->m_Penjualan->tampil_Data();

      $this->load->view('Beranda/Content', $data);
      $this->load->view('templates/beranda_footer');
    }
  }
  // end Home

  // tambah data tabel Penjualan-----------------------------------------------------------------------------------------------------
  public function tambah_aksi()
  {
    $nama_barang          =   $this->input->post('nama_barang');
    $kode_barang          =   $this->input->post('kode_barang');
    $id_stok              =   $this->input->post('id_stok');
    $stok                 =   $this->input->post('stok');
    $jumlah_terjual       =   $this->input->post('jumlah_terjual');
    $tanggal_transaksi    =   $this->input->post('tanggal_transaksi');
    $jenis_barang         =   $this->input->post('jenis_barang');
    $data = array(
      'nama_barang'                       => $nama_barang,
      'stok'                              => $stok,
      'jumlah_terjual'                    => $jumlah_terjual,
      'tanggal_transaksi'                 => $tanggal_transaksi,
      'jenis_barang'                      => $jenis_barang,
      'kode_barang'                       => $kode_barang,
      'id_stok'                           => $id_stok,
    );
    $this->m_Penjualan->input_Data($data, 'daftar_barang');
    $this->session->set_flashdata('barang', '<div class="alert alert-success" role="alert">
      <p class="alert-heading">Selamat! Anda Berhasil</p>
    </div>');
    redirect('C_Content');
  }
  
  public function del($id)
  {

    $this->m_Penjualan->del($id);
    $this->session->set_flashdata('barang', '<div class="alert-success" role="alert">Anda Berhasil menghapus Data</div>');
    redirect('C_Content');
  }


  function update(){
    $nama_barang       =   $this->input->post('nama_barang');
    $kode_barang       =   $this->input->post('kode_barang');
    $id_stok           =   $this->input->post('id_stok');
    $stok              =   $this->input->post('stok');
    $jumlah_terjual    =   $this->input->post('jumlah_terjual');
    $tanggal_transaksi =   $this->input->post('tanggal_transaksi');
    $jenis_barang      =   $this->input->post('jenis_barang');
    $data = array(
      'nama_barang'                       => $nama_barang,
      'stok'                              => $stok,
      'jumlah_terjual'                    => $jumlah_terjual,
      'tanggal_transaksi'                 => $tanggal_transaksi,
      'jenis_barang'                      => $jenis_barang,
      'kode_barang'                       => $kode_barang,
      'id_stok'                           => $id_stok,
    );
   
    $where = array(
      'nama_barang'                       => $nama_barang,
    );
   
    $this->m_Penjualan->update_data($where,$data,'daftar_barang');
    $this->session->set_flashdata('barang', '<div class="alert alert-success" role="alert">
      <p class="alert-heading">Anda Berhasil Update</p>
    </div>');
    redirect('C_Content');
  }

  public function Ascending(){

    $data['title'] = 'ASC/DESC';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['barang'] = $this->m_Penjualan->tampil_Data();
  
    $this->load->view('templates/beranda_header',$data);
    $this->load->view('Beranda/ascending',$data);
    $this->load->view('templates/beranda_footer',$data);
}

  public function filter(){
    $data['title'] = 'Filter';
    $data['user'] = $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();
    $data['barang'] = $this->m_Penjualan->tampil_Data();
  
    $this->load->view('templates/beranda_header',$data);
    $this->load->view('Beranda/filter',$data);
    $this->load->view('templates/beranda_footer',$data);
  }
}
