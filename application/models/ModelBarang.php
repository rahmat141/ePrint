<?php
class ModelBarang extends CI_model
{
    public function getUser()
    {
        return $this->db
            ->get_where('user', [
                'username' => $this->session->userdata('username'),
                'role_id' => $this->session->userdata('role_id'),
                'id_user' => $this->session->userdata('id_user'),
            ])
            ->row_array();
    }

    public function getUserData()
    {
        return $this->db
            ->get_where('user', [
                'id_user' => $this->session->userdata('id_user'),
            ])
            ->result();
    }

    public function getVendorData()
    {
        $username = $this->session->userdata('username');
        $query = $this->db->query(
            "SELECT * FROM vendor join user using(username) where username = '$username'"
        );

        return $query->result();
    }

    public function editProfile($data, $data2)
    {
        $this->db->set($data);
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('vendor');

        $this->db->set($data2);
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('user');
    }

    public function tampilBarang()
    {
        $query = $this->db->query('SELECT * FROM barang');
        return $query->result();
    }

    public function input_data($data)
    {
        $this->db->insert('barang', $data);
    }

    public function detail_data($id = null)
    {
        $query = $this->db->get_where('barang', ['idbarang' => $id])->row();
        return $query;
    }

    public function hapus_data($where)
    {
        $this->db->delete('barang', $where);
    }

    public function edit_data($where)
    {
        return $this->db->get_where('barang', $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update('barang', $data);
    }

    public function getPemesan($id)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('barang', 'idbarang');
        $this->db->where('owner', $id);
        return $this->db->get()->result_array();
    }

    public function getDetailPemesan($id)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->join('barang', 'idbarang');
        $this->db->where('idpesanan', $id);
        return $this->db->get()->row();
    }

    public function terimaPesanan($id, $data)
    {
        $this->db->where('idpesanan', $id);
        $this->db->update('pesanan', $data);
    }

    public function tolak_pesanan($id, $data)
    {
        $this->db->where('idpesanan', $id);
        $this->db->update('pesanan', $data);
    }
}