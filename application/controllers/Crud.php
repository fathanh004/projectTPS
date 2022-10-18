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
    function graph()
    {
        $data['graph'] = $this->product_model->tampil_data();
        $this->load->view('chart', $data);
    }
    function biasa()
    {
        $data['user'] = $this->product_model->tampil_data();
        $data['title'] = 'User Page';
        $this->load->view('header', $data);
        $this->load->view('userView', $data);
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
        }
        $this->load->view('footer');
    }
}
