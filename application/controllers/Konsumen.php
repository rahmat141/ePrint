<?php

//perubahan

defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konsumen_model');
        $this->load->library('form_validation');

        $id_user = $this->session->userdata('id_user');
        // if (!$id_user) {
        //     $this->session->set_flashdata(
        //         'pesan',
        //         '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        //             Login terlebih dahulu!
        //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //           <span aria-hidden="true">&times;</span>
        //         </button>
        //       </div>'
        //     );
        //     redirect('auth');
        // }
    }

    public function sessionLogin()
    {
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Login first!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>'
        );

        redirect('auth');
    }

    public function index()
    {
        $data['postingan'] = $this->Konsumen_model->getProduct();
        $data['kategori'] = $this->Konsumen_model->getKategori();

        // harus ditambah disetiap method
        $id_user = $this->session->userdata('id_user');
        $data['jumlah_keranjang'] = $this->Konsumen_model->getCountKeranjang(
            $id_user
        );

        $data['barang_keranjang'] = $this->Konsumen_model->getIsiKeranjang(
            $id_user
        );
        //------------------

        $data['nilai'] = $this->Konsumen_model->getNilai();
        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('konsumen/index', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function detail($id_posting)
    {
        // harus ditambah disetiap method
        $id_user = $this->session->userdata('id_user');
        $data['jumlah_keranjang'] = $this->Konsumen_model->getCountKeranjang(
            $id_user
        );

        $data['barang_keranjang'] = $this->Konsumen_model->getIsiKeranjang(
            $id_user
        );
        //------------------

        $data['detail'] = $this->Konsumen_model->getDetailProduct($id_posting);
        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('konsumen/productDetail', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function productList()
    {
        // $this->load->model('m_mhs');
        // $data['title'] = "Detail Barang";
        // $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();
        // $data['detail'] = $this->Konsumen_model->detail_data($id);
        $id_user = $this->session->userdata('id_user');

        $data['jumlah_keranjang'] = $this->Konsumen_model->getCountKeranjang(
            $id_user
        );
        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('konsumen/productList');
        $this->load->view('templatesKonsumen/footer');
    }

    public function cart()
    {
        // harus ditambah disetiap method
        $id_user = $this->session->userdata('id_user');
        $data['jumlah_keranjang'] = $this->Konsumen_model->getCountKeranjang(
            $id_user
        );

        $data['barang_keranjang'] = $this->Konsumen_model->getIsiKeranjang(
            $id_user
        );
        //------------------

        $data['pesanan'] = $this->Konsumen_model->getIsiKeranjang($id_user);

        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('konsumen/cart', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function checkout()
    {
        // harus ditambah disetiap method
        $id_user = $this->session->userdata('id_user');

        $data['jumlah_keranjang'] = $this->Konsumen_model->getCountKeranjang(
            $id_user
        );

        $data['barang_keranjang'] = $this->Konsumen_model->getIsiKeranjang(
            $id_user
        );

        $limit = $this->Konsumen_model->getCountCheckout($id_user);

        $ctn = $limit['jml'];

        // $data['barang_keranjang1'] = $this->Konsumen_model->getCheckout(
        //     $id_user, $ctn
        // );
        //------------------

        $data_upd = [
            'status_pesanan' => 'checkout',
            'tanggal_checkout' => date("Y-m-d"),
        ];

        $where_upd = [
            'status_pesanan' => 'di dalam keranjang',
            'tanggal_checkout' => null,
            'id_user' => $id_user,
        ];

        $this->db->update('pemesanan', $data_upd, $where_upd);

        $data['all_pesanan'] = $this->Konsumen_model->getCheckout($id_user, $ctn);

        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('konsumen/checkout', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function pesan_pilihkat()
    {
        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			   Login terlebih dahulu!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>'
            );
            redirect('auth');
        }

        $data['pilih_kategori'] = $this->Konsumen_model->getKategori();

        // harus ditambah disetiap method
        $id_user = $this->session->userdata('id_user');
        $data['jumlah_keranjang'] = $this->Konsumen_model->getCountKeranjang(
            $id_user
        );

        $data['barang_keranjang'] = $this->Konsumen_model->getIsiKeranjang(
            $id_user
        );
        //------------------

        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('konsumen/p_pilihkat', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function pesanBarang($kategori)
    {

        $data['barang'] = $this->Konsumen_model->getBarang($kategori);

        $nama_kategori = $this->Konsumen_model->getNamaBarang($kategori);

        $data['nama_barang'] = $nama_kategori['nama_kategori'];

        $data['id_kategori'] = $kategori;

        // harus ditambah disetiap method
        $id_user = $this->session->userdata('id_user');
        $data['jumlah_keranjang'] = $this->Konsumen_model->getCountKeranjang(
            $id_user
        );

        $data['barang_keranjang'] = $this->Konsumen_model->getIsiKeranjang(
            $id_user
        );
        //------------------

        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('konsumen/form_pemesanan', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function masukKeranjang()
    {
        $nama_barang = strtolower($this->input->post('nama_barang'));
        $id_kategori = $this->input->post('id_kategori');
        $id_pakaiian = $this->input->post('paket');

        if ($id_pakaiian == 'no') {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible" role="alert">
					<strong>Pilih</strong> Paket terlebih dahulu !
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		 					<span aria-hidden="true">&times;</span>
						</button>
	  			</div>'
            );
            redirect("konsumen/pesanBarang/$nama_barang");
        } else {
            $cekHarga = $this->Konsumen_model->cekHarga(
                $nama_barang,
                $id_pakaiian
            );

            $ukuranS = $this->input->post('uk_s');
            $ukuranM = $this->input->post('uk_m');
            $ukuranL = $this->input->post('uk_l');
            $ukuranXL = $this->input->post('uk_xl');
            $ukuranXXL = $this->input->post('uk_xxl');
            $ukuran3XL = $this->input->post('uk_3xl');

            $jumlah_barang =
                $ukuranS +
                $ukuranM +
                $ukuranL +
                $ukuranXL +
                $ukuranXXL +
                $ukuran3XL;

            if (
                $ukuran3XL <= 0 &&
                $ukuranL <= 0 &&
                $ukuranM <= 0 &&
                $ukuranS <= 0 &&
                $ukuranXL <= 0 &&
                $ukuranXXL <= 0
            ) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible" role="alert">
			Sepertinya anda tidak memasukkan jumlah baju deh :(
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>'
                );
                redirect("konsumen/pesanBarang/$nama_barang");
            } else {
                $harga_paket = $cekHarga['harga'];
                $total_harga =
                    $cekHarga['harga'] * $jumlah_barang +
                    10000 * $ukuranXXL +
                    10000 * $ukuran3XL;

                $tanggal_bayar = '';
                $status = 'di dalam keranjang';
                $id_user = $this->session->userdata('id_user');

                $files = $_FILES['desain']['name'];
                if ($files == '') {
                    $desain = 'tidak upload desain';
                } else {
                    $desain = $this->fileUpload();
                }

                $data = [
                    // 'id_barang' => htmlspecialchars($id_barang),
                    'id_kategori' => htmlspecialchars($id_kategori),
                    'ukuran_s' => htmlspecialchars($ukuranS),
                    'ukuran_m' => htmlspecialchars($ukuranM),
                    'ukuran_l' => htmlspecialchars($ukuranL),
                    'ukuran_xl' => htmlspecialchars($ukuranXL),
                    'ukuran_xxl' => htmlspecialchars($ukuranXXL),
                    'ukuran_3xl' => htmlspecialchars($ukuran3XL),
                    'jumlah_barang' => htmlspecialchars($jumlah_barang),
                    'harga_paket' => htmlspecialchars($harga_paket),
                    'total_harga' => htmlspecialchars($total_harga),
                    'status_pesanan' => htmlspecialchars($status),
                    'desain_produk' => $desain,
                    'id_user' => htmlspecialchars($id_user),
                ];

                $this->db->insert('pemesanan', $data);

                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible" role="alert">
		<strong>Yeay!</strong> Pesanan behasil masuk ke keranjang !
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>'
                );
                redirect('konsumen/pesan_pilihkat');
            }
        }
    }

    public function statusPemesanan($stat = "pending")
    {
        // harus ditambah disetiap method
        $id_user = $this->session->userdata('id_user');

        if (!$id_user) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			   Login terlebih dahulu!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>'
            );
            redirect('auth');
        }

        $data['jumlah_keranjang'] = $this->Konsumen_model->getCountKeranjang(
            $id_user
        );

        $data['barang_keranjang'] = $this->Konsumen_model->getIsiKeranjang(
            $id_user
        );

        $data['aktif_pending'] = "";
        $data['aktif_proses'] = "";
        $data['aktif_kirim'] = "";
        $data['aktif_dp'] = "";

        if ($stat == "pending") {
            $data['aktif_pending'] = "active";
        } elseif ($stat == "proses") {
            $data['aktif_proses'] = "active";
        } elseif ($stat == "dikirim") {
            $data['aktif_kirim'] = "active";
        } else {
            $data['aktif_dp'] = "active";
        }

        $pesanan['allPesanan'] = $this->Konsumen_model->getPesananbyId($id_user, $stat);

        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('konsumen/statusPemesanan', $pesanan);
        $this->load->view('templatesKonsumen/footer');
    }

    public function historyPemesanan()
    {
        // harus ditambah disetiap method
        $id_user = $this->session->userdata('id_user');

        if (!$id_user) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			   Login terlebih dahulu!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>'
            );
            redirect('auth');
        }

        $data['jumlah_keranjang'] = $this->Konsumen_model->getCountKeranjang(
            $id_user
        );
        $data['barang_keranjang'] = $this->Konsumen_model->getIsiKeranjang(
            $id_user
        );
        //------------------
        $pesanan['allPesanan'] = $this->Konsumen_model->history_pesanan(
            $id_user
        );

        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('konsumen/historyPemesanan', $pesanan);
        $this->load->view('templatesKonsumen/footer');
    }

    public function selesaikan_pesanan($id_pesanan)
    {

        $data = [
            'status_pesanan' => 'pesanan selesai',
        ];
        $this->db->update('pemesanan', $data, ['id_pesanan' => $id_pesanan]);

        $this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissible show" role="alert">
		<strong>Berhasil!</strong> Pesanan telah diselesaikan!.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>');

        redirect('Konsumen/historyPemesanan');
    }

    private function fileUpload()
    {
        $namaFiles = $_FILES['desain']['name'];
        $ukuranFile = $_FILES['desain']['size'];
        $type = $_FILES['desain']['type'];
        $eror = $_FILES['desain']['error'];

        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES['desain']['tmp_name'];
        // $nama_folder = "assets_user/file_upload/";
        // $file_baru = $nama_folder . basename($nama_file);

        // if ((($type == "video/mp4") || ($type == "video/3gpp")) && ($ukuranFile < 8000000)) {

        //   move_uploaded_file($tmpName, $file_baru);
        //   return $file_baru;
        // }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'mp4', 'flv'];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible show" role="alert">
      Your uploaded file is not image/video
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>'
            );

            redirect('konsumen');
            return false;
        }

        $namaFilesBaru = uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file(
            $tmpName,
            'assetsKonsumen/images/desain_konsumen/' . $namaFilesBaru
        );

        return $namaFilesBaru;
    }

    public function profile($id)
    {
        // harus ditambah disetiap method
        $id_user = $this->session->userdata('id_user');
        $data['jumlah_keranjang'] = $this->Konsumen_model->getCountKeranjang(
            $id_user
        );
        $data['status'] = $this->Konsumen_model->getStatususer();

        $data['barang_keranjang'] = $this->Konsumen_model->getIsiKeranjang(
            $id_user
        );
        //------------------

        $data['user'] = $this->Konsumen_model->getKonsumenData($id);
        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('konsumen/profile', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function hapusCart($id_pesan)
    {
        $this->db->delete('pemesanan', ['id_pesanan' => $id_pesan]);

        redirect('konsumen');
    }

    public function hapusInCart($id_pesan)
    {
        $this->db->delete('pemesanan', ['id_pesanan' => $id_pesan]);

        redirect('konsumen/cart');
    }

    public function editJumlahBarang($id)
    {
        $ukuran_s = $this->input->post('ukuran_s');
        $ukuran_m = $this->input->post('ukuran_m');
        $ukuran_l = $this->input->post('ukuran_l');
        $ukuran_xl = $this->input->post('ukuran_xl');
        $ukuran_xxl = $this->input->post('ukuran_xxl');
        $ukuran_3xl = $this->input->post('ukuran_3xl');
        $harga_paket = $this->input->post('price');

        $jumlah_barang =
            $ukuran_s +
            $ukuran_m +
            $ukuran_l +
            $ukuran_xl +
            $ukuran_xxl +
            $ukuran_3xl;

        $total_harga =
            $harga_paket * $jumlah_barang +
            10000 * $ukuran_xxl +
            10000 * $ukuran_3xl;

        $data = [
            'ukuran_s' => $ukuran_s,
            'ukuran_m' => $ukuran_m,
            'ukuran_l' => $ukuran_l,
            'ukuran_xl' => $ukuran_xl,
            'ukuran_xxl' => $ukuran_xxl,
            'ukuran_3xl' => $ukuran_3xl,
            'jumlah_barang' => $jumlah_barang,
            'total_harga' => $total_harga,
        ];

        $this->Konsumen_model->editJumlahBarang($data, $id);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible" role="alert">
<strong>Yeay!</strong> Pesanan behasil diperbarui !
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>'
        );
        redirect('konsumen/cart');
    }

    // public function pesanBarang()
    // {
    //     $data = [
    //         'idpesanan' => '',
    //         'namabarang' => $this->input->post('namabarang'),
    //         'jumlahbarang' => $this->input->post('jumlahbarang'),
    //         'hargabarang' => $this->input->post('hargabarang'),
    //         'totalharga' =>
    //             $this->input->post('totalharga') *
    //             $this->input->post('jumlahbarang'),
    //         'kategoribarang' => $this->input->post('kategoribarang'),
    //         'keteranganbarang' => $this->input->post('keteranganbarang'),
    //         'alamat' => $this->input->post('alamat'),
    //         'namakonsumen' => $this->input->post('namakonsumen'),
    //         'idbarang' => $this->input->post('idbarang'),
    //         'statuspemesanan' => $this->input->post('statuspemesanan'),
    //     ];
    //     $this->Konsumen_model->tambahPesanan($data);
    //     redirect('konsumen/statusPemesanan');
    // }

    // public function profile()
    // {
    //     $data['title'] = 'Profile';
    //     $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();

    //     $this->load->view('templatesKonsumen/header', $data);
    //     $this->load->view('templatesKonsumen/sidebar', $data);
    //     $this->load->view('konsumen/profile', $data);
    //     $this->load->view('templatesKonsumen/footer');
    // }

    public function editProfile()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
        $email = htmlspecialchars($this->input->post('email', true));
        // $username = htmlspecialchars($this->input->post('username', true));
        $alamat = htmlspecialchars($this->input->post('alamat', true));
        $status = htmlspecialchars($this->input->post('status', true));
        $data = [
            'email' => $email,
            'alamat' => $alamat,
            'role_id' => $status,
            'status' => $status,
        ];
        $this->Konsumen_model->editProfile($data);
        redirect('konsumen/profile/' . $this->session->userdata('id_user'));
        // $username = $this->session->userdata('username');

        // $datas = $this->db->query("SELECT * FROM user join konsumen using(username) where username ='$username'")->result();
        // foreach ($datas as $d) {
        //     if ($d->email == $email) {
        //         $this->session->set_flashdata(
        //             'message',
        //             '<div class="alert alert-success alert-dismissible" role="alert">
        //                 <strong>Congratulastions!</strong> your profile is updated!
        //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                 <span aria-hidden="true">&times;</span>
        //                 </button>
        //             </div>'
        //         );
        //         $this->Konsumen_model->editProfile($data);
        //         redirect('konsumen');
        //     } else {
        //         $cekdulu = $this->db->query(
        //             "select * from user where email ='$email'"
        //         );
        //         if ($cekdulu->num_rows() > 0) {
        //             $this->session->set_flashdata(
        //                 'message',
        //                 '<div class="alert alert-danger alert-dismissible" role="alert">
        //                     <strong>Sorry :( </strong>' .
        //                                     $email .
        //                                     ' email already used!
        //                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                     <span aria-hidden="true">&times;</span>
        //                     </button>
        //                 </div>'
        //             );
        //             redirect('konsumen');
        //         } else {
        //             $this->session->set_flashdata(
        //                 'message',
        //                 '<div class="alert alert-success alert-dismissible" role="alert">
        //                 <strong>Congratulastions </strong> your profile is updated <br> Please login again!
        //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        //                   <span aria-hidden="true">&times;</span>
        //                 </button>
        //               </div>'
        //             );

        //             $this->Konsumen_model->editProfile($data);
        //             $this->session->unset_userdata('email');
        //             $this->session->unset_userdata('role_id');
        //             $this->session->unset_userdata('id');

        //             redirect('auth');
        //         }
        //     }
        // }

        // $this->Profile_model->editBasicModel($data);
    }

    public function editPass()
    {
        $cekoldPassword = $this->input->post('oldpassword');
        $newpassword = $this->input->post('newpassword');

        $oldpass['user'] = $this->db
            ->get_where('user', [
                'username' => $this->session->userdata('username'),
            ])
            ->row_array();

        if (password_verify($cekoldPassword, $oldpass['user']['password'])) {
            if (
                $this->input->post('newpassword') ==
                $this->input->post('newpassword2')
            ) {
                if (
                    !password_verify($newpassword, $oldpass['user']['password'])
                ) {
                    $data = [
                        'password' => password_hash(
                            $this->input->post('newpassword'),
                            PASSWORD_DEFAULT
                        ),
                    ];

                    $this->Konsumen_model->editPassword($data);

                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Password berhasil diubah!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
                    );
                    redirect('konsumen/editPassword');
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Password gagal diubah, Password baru tidak boleh sama dengan password lama!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
                    );
                    redirect('konsumen/editPassword');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Password gagal diubah, Password baru tidak sama!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
                );
                redirect('konsumen/editPassword');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Password gagal diubah! Periksa kembali password lama anda!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
            );
            redirect('konsumen/editPassword');
        }
    }

    public function editPassword()
    {
        $this->output->enable_profiler(true);
        $data['title'] = 'Edit Password';
        $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();

        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('templatesKonsumen/sidebar', $data);
        $this->load->view('konsumen/editPassword', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function editPhoto()
    {
        $data['title'] = 'Edit Photo';
        $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();

        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('templatesKonsumen/sidebar', $data);
        $this->load->view('konsumen/editPhoto', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function updateProfile()
    {
        $potolama = $this->input->post('potolama');
        $file = 'assets/foto/' . $potolama;

        $filename = $this->_uploadFile2();
        $data = [
            'gambar' => $filename,
        ];

        if ($potolama == 'default.png') {
            $this->Konsumen_model->editPhoto($data);

            $this->session->set_flashdata(
                'mm',
                '<div class="alert alert-success alert-dismissible show" role="alert">
			Berhasil diubah
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>'
            );

            redirect('konsumen/editPhoto');
        } elseif ($potolama != 'default.png') {
            if (is_readable($file) && unlink($file)) {
                $this->Konsumen_model->editPhoto($data);

                $this->session->set_flashdata(
                    'mm',
                    '<div class="alert alert-success alert-dismissible show" role="alert">
		Berhasil diubah
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>'
                );

                redirect('konsumen/editPhoto');
            } else {
                echo 'The file was not found or not readable and could not be deleted';
            }
        }
    }

    private function _uploadFile2()
    {
        $namaFiles = $_FILES['file']['name'];
        $ukuranFile = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $eror = $_FILES['file']['error'];

        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES['file']['tmp_name'];
        // $nama_folder = "assets_user/file_upload/";
        // $file_baru = $nama_folder . basename($nama_file);

        // if ((($type == "video/mp4") || ($type == "video/3gpp")) && ($ukuranFile < 8000000)) {

        //   move_uploaded_file($tmpName, $file_baru);
        //   return $file_baru;
        // }

        if ($eror === 4) {
            $this->session->set_flashdata(
                'mm',
                '<div class="alert alert-danger alert-dismissible show" role="alert">
      Chose an image or video first!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>'
            );

            redirect('konsumen/editPhoto');

            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'mp4', 'flv'];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $this->session->set_flashdata(
                'mm',
                '<div class="alert alert-danger alert-dismissible show" role="alert">
      Your uploaded file, is not image or video!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>'
            );

            redirect('konsumen/editPhoto');
            return false;
        }

        $namaFilesBaru = uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets/foto/' . $namaFilesBaru);

        return $namaFilesBaru;
    }

    // public function statusPemesanan()
    // {
    //     $data['title'] = 'Status Pemesanan';
    //     $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();
    //     $data['pesanan'] = $this->Konsumen_model->getPesanan();

    //     $this->load->view('templatesKonsumen/header', $data);
    //     $this->load->view('templatesKonsumen/sidebar', $data);
    //     $this->load->view('konsumen/statusPemesanan', $data);
    //     $this->load->view('templatesKonsumen/footer');
    // }

    public function detailPesanan($id)
    {
        // $this->load->model('m_mhs');
        $data['title'] = 'Detail Pesanan';
        $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();
        $data['detail'] = $this->Konsumen_model->detail_data($id);
        $data['pesanan'] = $this->Konsumen_model->getPesananDetail();

        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('templatesKonsumen/sidebar');
        $this->load->view('Konsumen/detail_Pesanan', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function batalkanPesanan($id)
    {
        $this->Konsumen_model->batalkanPesanan($id);
        redirect('konsumen/statusPemesanan');
    }

    public function daftarVendor()
    {
        $data['title'] = 'Daftar Vendor';
        $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();
        $data['vendor'] = $this->Konsumen_model->getAllVendor();
        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('templatesKonsumen/sidebar', $data);
        $this->load->view('konsumen/daftar_vendor', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function barangVendor($id)
    {
        $data['title'] = 'Barang Vendor';
        $data['konsumenData'] = $this->Konsumen_model->getKonsumenData();
        $data['barang'] = $this->Konsumen_model->getBarang($id);
        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('templatesKonsumen/sidebar', $data);
        $this->load->view('konsumen/barang_vendor', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function bayar_barang()
    {
        $id_user = $this->session->userdata('id_user');
        $tanggal_bayar = time();

        $nama_pemesan = $this->input->post('nama_pemesan');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $alamat = $this->input->post('alamat');
        $bukti_bayar = $this->input->post('bukti_bayar');
        $notes = $this->input->post('notes');

        $id_pesanan = $this->input->post('id_pesanan');

        $id_pesan_baru = explode('_', $id_pesanan);

        $jenis_bayar = $this->input->post('pembayarann');

        $total_bayar = $this->input->post('total_bayar');

        $jml_bayar = 0;
        if ($jenis_bayar == "dp") {
            $jml_bayar = $total_bayar / 2;
        } else {
            $jml_bayar = $total_bayar;
        }

        $data_bayar = [
            'id_user' => $id_user,
            'tanggal_bayar' => $tanggal_bayar,
            'total_bayar' => $jml_bayar,
            'nama_pemesan' => $nama_pemesan,
            'email' => $email,
            'phone' => $phone,
            'alamat_rumah' => $alamat,
            'bukti_bayar' => $this->_uploadFile(),
            'notes' => $notes,
        ];

        $this->db->insert('pembayaran', $data_bayar);

        $id_bayar = $this->Konsumen_model->cekIdBayarLast();

        $data_update_pesanan = [
            'status_pesanan' => 'pending',
            'id_bayar' => $id_bayar['id_bayar'] + 1,
        ];

        $data_updd = [
            'id_user' => $id_user,
            'status_pesanan' => 'checkout',
        ];

        $this->db->update('pemesanan', $data_update_pesanan, $data_updd);

        $this->kirimStatusPesanan($email);

        redirect('konsumen/cart');
    }

    public function kirimStatusPesanan($email)
    {

        $this->load->library('email');
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'admnartgraph@gmail.com',
            'smtp_pass' => 'sangatrahasia121',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);
        $this->email->from('admnartgraph@gmail.com', 'Admin E-Print');
        $this->email->to($email);

        $this->email->subject('Account Verification');
        $this->email->message(
            'Terimakasih telah berbelanja dengan kami :)'
        );

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }

    public function bayar_dp()
    {

        $data = [
            'bukti_dp' => $this->_uploadFile(),
        ];

        $id_bayar = $this->input->post('id_bayar');

        $this->db->update('pembayaran', $data, ['id_bayar' => $id_bayar]);

        redirect('konsumen/statusPemesanan/proses');

    }

    private function _uploadFile()
    {
        $namaFiles = $_FILES['bukti_bayar']['name'];
        $ukuranFile = $_FILES['bukti_bayar']['size'];
        $type = $_FILES['bukti_bayar']['type'];
        $eror = $_FILES['bukti_bayar']['error'];

        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES['bukti_bayar']['tmp_name'];
        // $nama_folder = "assets_user/file_upload/";
        // $file_baru = $nama_folder . basename($nama_file);

        // if ((($type == "video/mp4") || ($type == "video/3gpp")) && ($ukuranFile < 8000000)) {

        //   move_uploaded_file($tmpName, $file_baru);
        //   return $file_baru;
        // }

        if ($eror === 4) {
            $this->session->set_flashdata(
                'mm',
                '<div class="alert alert-danger alert-dismissible show" role="alert">
      Chose an image or video first!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>'
            );

            redirect('konsumen/checkout');

            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $this->session->set_flashdata(
                'mm',
                '<div class="alert alert-danger alert-dismissible show" role="alert">
      Your uploaded file is not image/video
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>'
            );

            redirect('konsumen/checkout');
            return false;
        }

        $namaFilesBaru = uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file(
            $tmpName,
            'assets/foto/bukti_bayar/' . $namaFilesBaru
        );

        return $namaFilesBaru;
    }

    public function batal_pesan($id)
    {

        $dataPb = ['notes' => 'dibatalkan'];
        $dataPm = ['status_pesanan' => 'dibatalkan'];

        $this->db->set($dataPb);
        $this->db->where('id_bayar', $id);
        $this->db->update('pembayaran');

        $this->db->set($dataPm);
        $this->db->where('id_bayar', $id);
        $this->db->update('pemesanan');

        redirect('Konsumen/statusPemesanan');
    }

    public function det_pesanan($id_bayar)
    {

        $id_user = $this->session->userdata('id_user');

        if (!$id_user) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			   Login terlebih dahulu!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>'
            );
            redirect('auth');
        }

        $data['jumlah_keranjang'] = $this->Konsumen_model->getCountKeranjang(
            $id_user
        );

        $data['barang_keranjang'] = $this->Konsumen_model->getIsiKeranjang(
            $id_user
        );
        //------------------

        $data['detail_pesan'] = $this->Konsumen_model->getDetailPesan($id_bayar);

        $this->load->view('templatesKonsumen/header', $data);
        $this->load->view('konsumen/detail_pesan', $data);
        $this->load->view('templatesKonsumen/footer');
    }

    public function print_invoice($id_bayar)
    {

        $data = [
            "id_bayar" => $id_bayar,
            "detailBayar" => $this->Konsumen_model->getDetailPembayaran($id_bayar),
            "detailPesanan" => $this->Konsumen_model->invoice_item($id_bayar),
        ];

        $this->load->view('konsumen/print_invoice', $data);
    }

    public function addNilai()
    {

        $nilai = $this->input->post('nilai');
        $nama = $this->input->post('nama');

        $data = [
            'keterangan' => $nilai,
            'nama_pemesan' => $nama,
        ];

        $this->db->insert('feedback', $data);

        redirect('Konsumen');

    }
}
