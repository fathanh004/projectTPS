<?php
class product_model extends CI_Model
{
    function tampil_data()
    {

        return $this->db->get('user')->result();
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
		if(!empty($keyword)){
			$this->db->like('produk',$keyword);
            $this->db->or_like('harga',$keyword);
		}
		return $this->db->get()->result();
    }
}
