<?php

namespace App\Controllers;

use App\Models\UsersModel;

class login extends BaseController
{
    protected $UsersModel;

    public function __construct()
    {
        helper('from');
        $this->UsersModel = new UsersModel();
    }
    public function index()
    {
        return view('login/index');
    }
    public function process()
    {

        //     $users = new UsersModel();
        //     $username = $this->request->getPost('username');
        //     $password = $this->request->getPost('password');
        //     $dataUser = $users->where([
        //         'username' => $username,
        //     ])->first();
        //     if ($dataUser) {
        //         if (password_verify($password, $dataUser->password)) {
        //             session()->set([
        //                 'username' => $dataUser->username,
        //                 'name' => $dataUser->name,
        //                 'logged_in' => TRUE
        //             ]);

        //             return redirect()->to(base_url('dashboard'));
        //         } else {
        //             session()->setFlashdata('error', 'Username & Password Salah');
        //             return redirect()->back();
        //         }
        //     } else {
        //         session()->setFlashdata('error', 'Username & Password Salah');
        //         return redirect()->back();
        //     }

        $loginValid = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
        ];

        if ($this->validate($loginValid)) {
            $username = $this->request->getPost('username');
            $password = md5($this->request->getPost('password'));

            $data_user = $this->UsersModel->data_user($username, $password);
            // $cekVerifikasi = $this->AuthModel->cekVerifikasi($username);

            if ($data_user) {
                # code...
                // if ($cekVerifikasi['status_verifikasi'] == 'Sudah Verifikasi') {

                if ($data_user['role'] == 'Admin') {
                    $cek_admin = $this->UsersModel->login_admin($username, $password);
                    if ($cek_admin) {
                        //jika data cocok
                        session()->set('id_user', $cek_admin['id_user']);
                        session()->set('username', $cek_admin['username']);
                        session()->set('password', $cek_admin['password']);
                        session()->set('name', $cek_admin['name']);
                        session()->set('role', $cek_admin['role']);
                        session()->set('created_at', $cek_admin['created_at']);
                        session()->set('updated_at', $cek_admin['updated_at']);

                        return redirect()->to(base_url('dashboard'));
                    } else {
                        //jika data tidak cocok
                        session()->setFlashdata('pesan', 'Login gagal!!! Username atau password salah.');
                        return redirect()->to(base_url('Login'));
                    }
                } else if ($data_user['role'] == 'User') {
                    $cek_pengguna = $this->UsersModel->login_user($username, $password);
                    if ($cek_pengguna) {
                        //jika data cocok
                        session()->set('id_user', $cek_pengguna['id_user']);
                        session()->set('username', $cek_pengguna['username']);
                        session()->set('password', $cek_pengguna['password']);
                        session()->set('name', $cek_pengguna['name']);
                        session()->set('role', $cek_pengguna['role']);
                        session()->set('created_at', $cek_pengguna['created_at']);
                        session()->set('updated_at', $cek_pengguna['updated_at']);

                        return redirect()->to(base_url('user'));
                    } else {
                        //jika data tidak cocok
                        session()->setFlashdata('pesan', 'Login gagal!!! Username atau password salah.');
                        return redirect()->to(base_url('Login'));
                    }
                }
                // } else {
                //     //jika data tidak cocok
                //     session()->setFlashdata('pesan', 'Anda Belum Verifikasi Email. Silahkan Cek Email Untuk Verifikasi Agar Bisa Login. Jika Tidak Ada Dipesan Utama Email, Maka Cek Juga Dipesan Spam Email!!!');
                //     return redirect()->to(base_url('Auth/index'));
                // }
            } else {
                //jika data tidak cocok
                session()->setFlashdata('pesan', 'Login gagal!!! Username atau password salah.');
                return redirect()->to(base_url('login/index'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('login/index'));
        }
    }



    public function user()
    {
        return view('login/v_user');
    }
    public function process1()
    {

        $users = new UsersModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                session()->set([
                    'username' => $dataUser->username,
                    'name' => $dataUser->name,
                    'logged_in' => TRUE
                ]);

                return redirect()->to(base_url('dashboarduser'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('pesan', 'Logout Berhasil.');
        return redirect()->to(base_url('login'));
    }
}
