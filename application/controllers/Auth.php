<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $data['head'] = 'Login';
        $this->load->view('auth/header', $data);
        $this->load->view('auth/isi');
        $this->load->view('auth/footer');
    }

    public function register()
    {
        $data['pengguna'] = $this->Auth_model->role();
        $data['head'] = 'Regist';
        $this->load->view('auth/header', $data);
        $this->load->view('auth/registrasi', $data);
        $this->load->view('auth/footer');
    }

    public function addNewUser()
    {
        $pilih = $this->input->post('pilih');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $pass = password_hash($this->input->post('pass'), PASSWORD_DEFAULT);

        $cekUname = $this->Auth_model->cekUnameOrEmail(
            'username',
            strtolower($username)
        );
        $cekEmail = $this->Auth_model->cekUnameOrEmail(
            'email',
            strtolower($email)
        );

        if ($cekUname['jml'] > 0) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Username sudah ada!</strong> Silahkan register kembali
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>'
            );

            redirect('auth/register');
        }

        if ($cekEmail['jml'] > 0) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Email sudah ada!</strong> Silahkan register kembali
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>'
            );

            redirect('auth/register');
        }

        $data2 = [
            'username' => strtolower($username),
            'gambar' => 'default.png',
        ];

        if ($pilih == 'Siswa') {
            $role = 1;
        } elseif ($pilih == 'Mahasiswa') {
            $role = 2;
        } elseif ($pilih == 'Pekerja') {
            $role = 3;
        } else {
            $role = 4;
        }

        $data = [
            'role_id' => $role,
            'username' => $username,
            'email' => $email,
            'password' => $pass,
            'created_at' => date('d-m-Y, H:i:s'),
            'status' => 0,
        ];

        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time(),
        ];

        // $this->Auth_model->addAktor($pilih, $data2);
        $this->Auth_model->addUser($data);
        $this->db->insert('user_token', $user_token);

        $this->_sendEmail($token, 'verify');

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Congratulation</strong> your account has been created. Please activate yout account!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>'
        );

        redirect('auth');
    }

    public function cekLogin()
    {
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');

        $user = $this->Auth_model->cekEmailUsername($username);

        if ($user) {
            if ($user['status'] == 1) {
                if (password_verify($pass, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'password' => $user['password'],
                    ];

                    $this->session->set_userdata($data);

                    if ($user['role_id'] != 5) {
                        redirect('konsumen');
                    } else {
                        redirect('admin');
                    }
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Wrong password!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>'
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Belum Aktif !
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>'
                );

                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Email is not registered
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
            );

            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_user');

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
           You have been logout!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
        );
        redirect('konsumen');
    }

    private function _sendEmail($token, $type)
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
        $this->email->from('abizardo1123@gmail.com', 'Admin E-Print');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message(
                'click this link to verify your account : <a href="' .
                base_url() .
                'auth/verify?email=' .
                $this->input->post('email') .
                '&token=' .
                urlencode($token) .
                '">Activate</a>'
            );
        } elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message(
                'click this link to reset your password : <a href="' .
                base_url() .
                'auth/resetpassword?email=' .
                $this->input->post('email') .
                '&token=' .
                urlencode($token) .
                '">Reset Password</a>'
            );
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db
            ->get_where('user', [
                'email' => $email,
            ])
            ->row_array();

        if ($user) {
            $user_token = $this->db
                ->get_where('user_token', ['token' => $token])
                ->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < 60 * 60 * 24) {
                    $this->db->set('status', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation</strong> ' .
                        $email .
                        ' has been activated. Please Login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
                    );
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Toekn expired!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Account activation failed! Wrong token.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Account activation failed! Wrong email.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>'
            );
            redirect('auth');
        }
    }

    public function forgot_password()
    {
        if (!empty($this->session->userdata('role_id'))) {
            redirect('auth');
        }

        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email'
        );

        if ($this->form_validation->run() == false) {
            $data['head'] = 'Forgot Password';
            $this->load->view('auth/header', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('auth/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db
                ->get_where('user', ['email' => $email, 'status' => 1])
                ->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time(),
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Please check your email to reset your password!
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>'
                );
                redirect('auth/forgot_password');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Email have not registered or activated!
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>'
                );
                redirect('auth/forgot_password');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db
                ->get_where('user_token', ['token' => $token])
                ->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Reset password vailed! Wrong token
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Reset password vailed! Wrong email
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>'
            );
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules(
            'password1',
            'Paassword',
            'trim|required|min_length[3]|matches[password2]',
            [
                'matches' => '',
                'min_length' => '',
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Repeat Paassword',
            'trim|required|min_length[3]|matches[password1]',
            [
                'matches' => 'Password Dont Match!!',
                'min_length' => 'Password To Short!',
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['head'] = 'Login';
            $this->load->view('auth/header', $data);
            $this->load->view('auth/change_password');
            $this->load->view('auth/footer');
        } else {
            $password = password_hash(
                $this->input->post('password1'),
                PASSWORD_DEFAULT
            );
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Password has been change ! Please Login
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>'
            );
            redirect('auth');
        }
    }

}