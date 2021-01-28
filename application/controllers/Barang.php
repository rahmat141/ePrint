<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *         http://example.com/index.php/welcome
     *    - or -
     *         http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelBarang');
    }

    public function index()
    {
        $data['title'] = 'Daftar Barang';
        $data['allUser'] = $this->ModelBarang->getUserData();

        $dats['barang'] = $this->ModelBarang->tampilBarang();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Barang/v_barang', $dats);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan',
            'required|trim'
        );
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim');
        $this->form_validation->set_rules(
            'kategori',
            'Kategori',
            'required|trim'
        );
        $this->form_validation->set_rules('foto', 'Foto', 'required');

        $owner = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $kategori = $this->input->post('kategori');
        $foto = $_FILES['foto'];
        if ($foto = '') {
            # code...
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo 'FAILED';
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = [
            'nama' => $nama,
            'keterangan' => $keterangan,
            'harga' => $harga,
            'stok' => $stok,
            'kategori' => $kategori,
            'foto' => $foto,
            'owner' => $owner,
        ];

        $this->ModelBarang->input_data($data, 'barang');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully</strong> Inserted
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
        );
        redirect('Barang/index');
    }

    public function detail($id)
    {
        // $this->load->model('m_mhs');
        $data['title'] = 'Detail Barang';
        $data['allUser'] = $this->ModelBarang->getUserData();
        $data['detail'] = $this->ModelBarang->detail_data($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Barang/detail_barang', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $where = [
            'idbarang' => $id,
        ];

        $this->ModelBarang->hapus_data($where, 'barang');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Successfully</strong> Deleted
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
        );
        redirect('Barang/index');
    }

    public function edit($id)
    {
        $where = [
            'idbarang' => $id,
        ];

        $data['title'] = 'Edit Data Barang';
        $data['allUser'] = $this->ModelBarang->getUserData();
        $data['barang'] = $this->ModelBarang
            ->edit_data($where, 'barang')
            ->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Barang/edit_barang', $data);
        $this->load->view('templates/footer');
    }

    public function update()
    {
        $id = $this->input->post('idbarang');
        $nama = $this->input->post('nama');
        $keterangan = $this->input->post('keterangan');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $kategori = $this->input->post('kategori');
        $foto = $_FILES['foto'];
        if ($foto = '') {
            # code...
        } else {
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo 'Gagal Upload Foto';
                die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        $data = [
            'nama' => $nama,
            'keterangan' => $keterangan,
            'harga' => $harga,
            'stok' => $stok,
            'kategori' => $kategori,
            'foto' => $foto,
        ];

        $where = [
            'idbarang' => $id,
        ];

        $this->ModelBarang->update_data($where, $data, 'barang');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Successfully</strong> Updated
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
        );
        redirect('Barang/index');
    }

    public function dataPemesan()
    {
        $id = $this->session->userdata('id_user');
        $data['allUser'] = $this->ModelBarang->getUserData();
        $data['pemesan'] = $this->ModelBarang->getPemesan($id);
        $data['title'] = 'Daftar Pemesan';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Barang/pemesan', $data);
        $this->load->view('templates/footer');
    }

    public function detailPesanan($id)
    {
        $data['title'] = 'Detail Pesanan';
        $data['allUser'] = $this->ModelBarang->getUserData();
        $data['detail'] = $this->ModelBarang->getDetailPemesan($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Barang/detailPesanan', $data);
        $this->load->view('templates/footer');
    }

    public function accPesanan($id)
    {
        $data = [
            'statuspemesanan' => 'Diterima',
        ];

        $this->ModelBarang->terimaPesanan($id, $data);
        redirect('Barang/dataPemesan');
    }

    public function tolakPesanan($id)
    {
        $data = [
            'statuspemesanan' => 'Ditolak',
        ];

        $this->ModelBarang->tolak_pesanan($id, $data);
        redirect('Barang/dataPemesan');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['allUser'] = $this->ModelBarang->getUserData();
        $data['vendordata'] = $this->ModelBarang->getVendorData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('Barang/profile', $data);
        $this->load->view('templates/footer');
    }

    public function editProfile()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->editProfile();
        } else {
            $name = $this->input->post('name', true);
            $email = htmlspecialchars($this->input->post('email', true));
            $gender = htmlspecialchars(
                $this->input->post('jenis_kelamin', true)
            );
            $city = htmlspecialchars($this->input->post('alamat', true));
            $username = htmlspecialchars($this->input->post('username', true));

            $data = [
                'nama_lengkap_vendor' => $name,
                'jenis_kelamin' => $gender,
                'alamat' => $city,
                'username' => $username,
            ];

            $data2 = [
                'email' => $email,
                'username' => $username,
            ];

            $username = $this->session->userdata('username');

            $datas = $this->db
                ->query(
                    "SELECT * FROM user join vendor using(username) where username ='$username'"
                )
                ->result();

            foreach ($datas as $d) {
                if ($d->email == $email) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success alert-dismissible" role="alert">
            <strong>Congratulastions!</strong> your profile is updated!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
                    );

                    $this->ModelBarang->editProfile($data, $data2);

                    redirect('Barang/profile');
                } else {
                    $cekdulu = $this->db->query(
                        "select * from user where email ='$email'"
                    );

                    if ($cekdulu->num_rows() > 0) {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-danger alert-dismissible" role="alert">
            <strong>Sorry :( </strong>' .
                                $email .
                                ' email already used!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
                        );
                        redirect('Barang/profile');
                    } else {
                        $this->session->set_flashdata(
                            'message',
                            '<div class="alert alert-success alert-dismissible" role="alert">
                        <strong>Congratulastions </strong> your profile is updated <br> Please login again!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>'
                        );

                        $this->ModelBarang->editProfile($data, $data2);

                        $this->session->unset_userdata('email');
                        $this->session->unset_userdata('role_id');
                        $this->session->unset_userdata('id');

                        redirect('auth');
                    }
                }
            }
        }

        // $this->Profile_model->editBasicModel($data);
    }
}