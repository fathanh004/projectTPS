<?php
class Crud extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }
    function index()
    {
        $data['user'] = $this->product_model->tampil_data();
        $data['title'] = 'Admin Page';
        $this->load->view('header', $data);
        $this->load->view('product_view', $data);
        $this->load->view('footer');
    }
    function faq()
    {
        $data['title'] = 'FAQ Page';
        $this->load->view('header', $data);
        $this->load->view('faq');
        $this->load->view('footer');
    }
    function searchFAQ()
    {
        $keyword = $this->input->get('keyword');
        $data = $this->product_model->cari_pertanyaan($keyword);
        $data = array(
            'title' => 'Hasil Cari',
            'keyword'    => $keyword,
            'pertanyaan' => $data
        );

        $this->load->view('header', $data);
        $this->load->view('faq', $data);
        $this->load->view('footer');
    }
    function tambahFAQ()
    {
        $quest = $this->input->post('quest');

        $data = array(
            'pertanyaan' => $quest,
            'jawaban' => 'Belum ada jawaban'	
        );
        $this->product_model->input_data($data, 'pertanyaan');
        redirect('crud/faq');
    }
    function graph()
    {
        $data['graph'] = $this->product_model->tampil_data();
        $data['title'] = 'Grafik Produk';
        $this->load->view('header', $data);
        $this->load->view('chart', $data);
        $this->load->view('footer');
    }
    function biasa()
    {
        $data['user'] = $this->product_model->tampil_data();
        $data['title'] = 'User Page';
        $this->load->view('header', $data);
        $this->load->view('userView', $data);
        $this->load->view('footer');
    }
    function manajer()
    {
        $data['graph'] = $this->product_model->tampil_data();
        $data['graph2'] = $this->product_model->tampil_data2();
        $data['title'] = 'Grafik 2 Toko';
        $this->load->view('header', $data);
        $this->load->view('managerView', $data);
        $this->load->view('footer');
    }
    function karyawan()
    {
        $data['graph'] = $this->product_model->tampil_karyawanPria();
        $data['graph2'] = $this->product_model->tampil_karyawanWanita();
        $data['title'] = 'Grafik Karyawan';
        $this->load->view('header', $data);
        $this->load->view('karyawan', $data);
        $this->load->view('footer');
    }
    function tambah()
    {
        $this->load->view('info_input');
    }

    function tambah_aksi()
    {
        $produk = $this->input->post('produk');
        $harga = $this->input->post('harga');
        $jumlah = $this->input->post('jumlah');

        $data = array(
            'produk' => $produk,
            'harga' => $harga,
            'jumlah' => $jumlah
        );
        $this->product_model->input_data($data, 'user');
        redirect('crud/index');
    }

    function hapus($id)
    {
        $where = array('id' => $id);
        $this->product_model->hapus_data($where, 'user');
        redirect('crud/index');
    }
    function beli($id){
        $where = array('id' => $id);
        $temp = $this->product_model->edit_data($where, 'user')->result();
        $jumlah = $temp[0]->jumlah;
        $tempINT = $jumlah - 1;
        $data = array('jumlah' => $tempINT);
        $this->product_model->update_data($where, $data, 'user');
        redirect('crud/index');
    }

    function edit($id)
    {
        $where = array('id' => $id);
        $data['user'] = $this->product_model->edit_data($where, 'user')->result();
        $this->load->view('info_edit', $data);
    }

    function update()
    {
        $id = $this->input->post('id');
        $produk = $this->input->post('produk');
        $harga = $this->input->post('harga');
        $jumlah = $this->input->post('jumlah');

        $data = array(
            'produk' => $produk,
            'harga' => $harga,
            'jumlah' => $jumlah
        );

        $where = array(
            'id' => $id
        );

        $this->product_model->update_data($where, $data, 'user');
        redirect('crud/index');
    }

    function search()
    {
        $keyword = $this->input->get('keyword');
        $role = ($this->session->userdata['logged_in']['role']);
        $data = $this->product_model->cari_data($keyword);
        $data = array(
            'title' => 'Hasil Cari',
            'keyword'    => $keyword,
            'user'        => $data
        );
        $this->load->view('header', $data);
        if ($role == 'admin') {
            $this->load->view('product_view', $data);
        } else if ($role == 'user') {
            $this->load->view('userView', $data);
        } else if ($role == 'mngr') {
            $this->load->view('product_view', $data);
        }
        $this->load->view('footer');
    }
}
