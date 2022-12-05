<?php
class product_model extends CI_Model
{
    function tampil_data()
    {
        return $this->db->get('user')->result();
    }
    function tampil_dataBiasa()
    {
        $this->db->limit('3');
        $this->db->order_by('terjual DESC');
        return $this->db->get('user')->result();
    }
    function tampil_data2()
    {
        return $this->db->get('toko2')->result();
    }
    function tampil_karyawanPria()
    {
        return $this->db->get_where('karyawan', array('jk' => 'Pria'))->result();
    }
    function tampil_karyawanWanita()
    {
        return $this->db->get_where('karyawan', array('jk' => 'Wanita'))->result();
    }
    function cari_pertanyaan($keyword)
    {
        $this->db->select('*');
        $this->db->from('pertanyaan');
        if (!empty($keyword)) {
            $this->db->like('pertanyaan', $keyword);
            $this->db->or_like('jawaban', $keyword);
        }
        return $this->db->get()->result();
    }
    function input_data($data, $table)
    {
        $this->db->insert($table, $data);
    }
    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    function cari_data($keyword)
    {
        $this->db->select('*');
        $this->db->from('user');
        if (!empty($keyword)) {
            $this->db->like('produk', $keyword);
            $this->db->or_like('harga', $keyword);
            $this->db->order_by('terjual DESC, harga ASC');
        }
        return $this->db->get()->result();
    }
}
