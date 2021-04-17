<?php
class Konsumen_model extends CI_model
{

    public function getStatususer()
    {
        $this->db->select('*');
        $this->db->from('role');
        $this->db->where('role_id <>', 5);
        return $this->db->get()->result();
    }
    public function getNilai()
    {
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->order_by('id_feedback', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result();
    }

    public function getProduct()
    {
        $this->db->select('*');
        $this->db->from('postingan');
        $this->db->join(
            'kategori',
            'postingan.id_kategori=kategori.id_kategori'
        );
        return $this->db->get()->result();
    }

    public function getKategori()
    {
        $query = 'SELECT * FROM kategori';

        return $this->db->query($query)->result();
    }

    public function getDetailProduct($id_posting)
    {
        $this->db->select('*');
        $this->db->from('postingan');
        $this->db->join(
            'kategori',
            'postingan.id_kategori=kategori.id_kategori'
        );
        $this->db->where('id_posting =', $id_posting);
        return $this->db->get()->row();
    }

    public function getBarang($kategori)
    {
        // $kategori = strtolower($kategori);

        $query = "SELECT * FROM pakaiian p JOIN kategori kt on(p.id_kategori=kt.id_kategori) where p.id_kategori = $kategori";

        return $this->db->query($query)->result();
    }

    public function getNamaBarang($kategori)
    {

        $query = "SELECT nama_kategori FROM pakaiian p JOIN kategori kt on(p.id_kategori=kt.id_kategori)";

        return $this->db->query($query)->row_array();
    }

    public function idKategori($kategori)
    {
        $query = "SELECT * FROM kategori where nama_kategori = '$kategori'";

        return $this->db->query($query)->row();
    }

    public function getKonsumenData($id)
    {
        // return $this->db->get_where('user', array('id_user' => $id))->result_array();
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('role', 'user.role_id = role.role_id');
        $this->db->where('id_user', $id);
        return $this->db->get()->result_array();
    }

    public function cekHarga($namaKategori, $id_barang)
    {
        $query = "SELECT harga FROM pakaiian where id_pakaiian = $id_barang";

        return $this->db->query($query)->row_array();
    }

    public function getCountKeranjang($idUser)
    {
        $this->db->select('COUNT(id_pesanan) jml');
        $this->db->from('pemesanan');
        $this->db->where('id_user =', $idUser);
        $this->db->where('status_pesanan =', 'di dalam keranjang');
        $this->db->group_by('id_user');

        return $this->db->get()->row();
    }

    public function getIsiKeranjang($idUser)
    {
        $this->db->select('*');
        $this->db->from('pemesanan p');
        $this->db->join('kategori k', 'p.id_kategori=k.id_kategori');
        $this->db->where('id_user =', $idUser);
        $this->db->where('status_pesanan =', 'di dalam keranjang');

        return $this->db->get()->result();
    }

    public function getCountCheckout($idUser)
    {
        $this->db->select('COUNT(id_pesanan) jml');
        $this->db->from('pemesanan');
        $this->db->where('id_user =', $idUser);
        $this->db->where('status_pesanan =', 'checkout');
        $this->db->group_by('tanggal_checkout');
        $this->db->order_by('tanggal_checkout', 'DESC');
        $this->db->limit(1);

        return $this->db->get()->row_array();
    }

    public function getCheckout($idUser, $limit)
    {
        $this->db->select('*');
        $this->db->from('pemesanan p');
        $this->db->join('kategori k', 'p.id_kategori=k.id_kategori');
        $this->db->where('id_user =', $idUser);
        $this->db->where('status_pesanan =', 'checkout');
        $this->db->order_by('tanggal_checkout', 'DESC');
        $this->db->limit($limit);

        return $this->db->get()->result();
    }

    public function getPesananbyId($id, $stat)
    {

        $query = "SELECT p.id_pesanan, p.id_user, pb.id_bayar, sum(total_harga) as total_harga, sum(jumlah_barang) as jumlah_barang, status_pesanan, bukti_bayar from pembayaran pb JOIN pemesanan p on(pb.id_bayar = p.id_bayar) WHERE p.id_user=$id AND status_pesanan LIKE '%$stat%' GROUP by pb.id_bayar ORDER BY p.id_pesanan DESC";

        // $query = "SELECT p.id_pesanan, p.id_user, pb.id_bayar, sum(total_harga) as total_harga, sum(jumlah_barang) as jumlah_barang, status_pesanan, bukti_bayar from pembayaran pb JOIN pemesanan p on(pb.id_bayar = p.id_bayar) WHERE p.id_user=$id AND status_pesanan LIKE '%pending%' OR status_pesanan LIKE '%kurang%' OR status_pesanan LIKE '%proses%' OR status_pesanan LIKE '%dikirim%' GROUP by pb.id_bayar";

        return $this->db->query($query)->result_array();
    }

    public function getAllPesananbyId($id)
    {
        $this->db->select('*');
        $this->db->from('pemesanan p');
        $this->db->join('kategori k', 'p.id_kategori=k.id_kategori');
        // $this->db->join('pembayaran pb', 'p.id_bayar=pb.id_bayar');
        $this->db->where('id_user =', $id);
        $this->db->where('status_pesanan =', 'pesanan selesai');
        return $this->db->get()->result_array();
    }

    public function editJumlahBarang($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_pesanan', $id);
        $this->db->update('pemesanan');
    }

    public function update_pesanan($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id_pesanan', $id);
        $this->db->update('pemesanan');
    }

    public function cekIdBayarLast()
    {
        // $query1 = "SELECT * FROM user where username='$field' or email = '$field'";

        $query = "SELECT id_bayar FROM pemesanan order by id_bayar DESC limit 1";

        return $this->db->query($query)->row_array();
    }

    // public function updateTotal($data, $id)
    // {
    //     $this->db->set($data);
    //     $this->db->where('id_pesanan', $id);
    //     $this->db->update('pemesanan');
    // }

    public function editProfile($data)
    {
        $this->db->set($data);
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('user');
    }

    // public function tampilBarang()
    // {
    //     $query = $this->db->query('SELECT * FROM barang');
    //     return $query->result();
    // }

    // public function getPesanan()
    // {
    //     $username = $this->session->userdata('username');
    //     $query = $this->db->query(
    //         "SELECT * FROM Pesanan where namakonsumen = '$username' and statuspemesanan = 'Pending' or statuspemesanan = 'Proses' order by idpesanan desc"
    //     );
    //     return $query->result();
    // }

    // public function getHistoryPesanan()
    // {
    //     $username = $this->session->userdata('username');
    //     $query = $this->db->query(
    //         "SELECT * FROM Pesanan where namakonsumen = '$username' order by idpesanan desc"
    //     );
    //     return $query->result();
    // }

    // public function getPesananDetail()
    // {
    //     $query = $this->db->query(
    //         ' SELECT * FROM pesanan where idpesanan = ' .
    //             $this->uri->segment('3')
    //     );
    //     return $query->result();
    // }

    // public function detail_data()
    // {
    //     $query = $this->db->query(
    //         ' SELECT * from barang where idbarang = ' . $this->uri->segment('3')
    //     );
    //     return $query->result();
    // }

    // public function tambahPesanan($data)
    // {
    //     return $this->db->insert('pesanan', $data);
    // }

    // public function batalkanPesanan($id)
    // {
    //     $this->db->where('idpesanan', $id);
    //     $this->db->delete('pesanan');
    // }

    // public function getAllVendor()
    // {
    //     $this->db->select('*');
    //     $this->db->from('vendor');
    //     $this->db->join('user', 'username');
    //     return $this->db->get()->result_array();
    // }

    // public function getBarang($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('user');
    //     $this->db->join('barang', 'user.id_user=barang.owner');
    //     $this->db->where('id_user', $id);
    //     return $this->db->get()->result();
    // }

    // public function getPassword()
    // {
    //     $username = $this->session->userdata('username');
    //     $query = $this->db->query(
    //         "SELECT password FROM user where username = '$username'"
    //     );
    //     return $query->result();
    // }

    // public function editPassword($data)
    // {
    //     $this->db->set($data);
    //     $this->db->where('username', $this->session->userdata('username'));
    //     $this->db->update('user');
    // }

    // public function editPhoto($data)
    // {
    //     $this->db->set($data);
    //     $this->db->where('username', $this->session->userdata('username'));
    //     $this->db->update('konsumen');
    // }

    public function getDetailPesan($id_bayar)
    {
        $this->db->select('*');
        $this->db->from('pemesanan p');
        $this->db->join('kategori k', 'p.id_kategori=k.id_kategori');
        $this->db->where('id_bayar', $id_bayar);

        return $this->db->get()->result_array();
    }

    public function history_pesanan($id)
    {
        $query = "SELECT p.id_pesanan, p.id_user, pb.id_bayar, sum(total_harga) as total_harga, sum(jumlah_barang) as jumlah_barang, status_pesanan, bukti_bayar from pembayaran pb JOIN pemesanan p on(pb.id_bayar = p.id_bayar) WHERE p.id_user=$id AND status_pesanan LIKE '%dibatalkan%' OR  status_pesanan LIKE '%selesai%' GROUP by pb.id_bayar";

        return $this->db->query($query)->result_array();
    }

    public function getDetailPembayaran($id_bayar)
    {

        // $query = "SELECT * from pembayaran where id_bayar = $id_bayar";

        $this->db->select("*");
        $this->db->from("pembayaran");
        $this->db->where("id_bayar =", $id_bayar);

        return $this->db->get()->row_array();
    }

    public function invoice_item($id_bayar)
    {
        $this->db->select('*');
        $this->db->from('pemesanan p');
        $this->db->join('kategori k', 'p.id_kategori=k.id_kategori');
        $this->db->where('id_bayar', $id_bayar);
        $this->db->where('status_pesanan LIKE', "%selesai%");

        return $this->db->get()->result_array();
    }
}