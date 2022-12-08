<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
       
        $this->load->library('form_validation');
    }
	public function index()
	{
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        if($this->form_validation->run()==false){
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        }else{
            // validasi sukses
            $this->_login();
        }
	}
    // login
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user',['email' => $email])->row_array();
        // usernya ada
        if($user){
            // jika usernya aktif
            if($user['is_active']==1){
    // cek password
    if(password_verify($password,$user['password'])){
        $data = [
            'email' => $user['email'],
        ];
        $this->session->set_userdata($data);
        redirect('C_Content');
    }else{
        $this->session->set_flashdata('message','<div class="alert-danger" role="alert">Password Salah</div>');
                redirect('auth'); 
    }
            }else{
                $this->session->set_flashdata('message','<div class="alert-danger" role="alert">Email belum di aktivasi</div>');
                redirect('auth'); 
            }
        }else{
            $this->session->set_flashdata('message','<div class="alert-danger" role="alert">Email tidak terdaftar</div>');
        redirect('auth');
        }
    }
    // end login

    // register
    public function registration()
    {
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique' =>'Email Sudah Terdaftar'
        ]);

        $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
            'matches' => 'password tidak sama!',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

        if($this->form_validation->run() == false){
            $data['title'] ='registrasi';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        }else{
            $data =[
                'name' => htmlspecialchars($this->input->post('name',true)),
                'email' => htmlspecialchars ($this->input->post('email',true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'),
                PASSWORD_DEFAULT ),
                'role_id' =>2,
                'is_active' =>1,
                'date_created' =>time()
           
        ];
        $this->db->insert('user',$data);
        $this->session->set_flashdata('message','<div class="alert-success" role="alert">Selamat akun anda sudah terdaftar</div>');
        redirect('auth');
        }
    }
    // end register

    // logout
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message','<div class="alert-success" role="alert">Anda Sudah Tidak Login!Silahkan Login Kembali!</div>');
        redirect('auth');
    }
    // end logout

    // ganti password 
    public function ganti_password()
    {
        $data['title']='Ganti Password';
        $data['user']=$this->db->get_where('user',['email' =>
        $this->session-> userdata('email')])->row_array();

        // aturan penulisan
        $this->form_validation->set_rules('gantipassword','Ganti Password',
        'required|trim');

        $this->form_validation->set_rules('gantipassword1','Password Baru',
        'required|trim|min_length[3]|matches[gantipassword2]',[
            'matches' => 'password tidak sama!',
        'min_length' => 'Password terlalu pendek minimal 3 karakter']);
        

        $this->form_validation->set_rules('gantipassword2','Confirm Password Baru',
        'required|trim|min_length[3]|matches[gantipassword1]',[
            'matches' => 'password tidak sama!',
        'min_length' => 'Password terlalu pendek,minimal 3 karakter']);
       if($this->form_validation->run() == false){

           $this->load->view('templates/admin_header',$data);
           $this->load->view('auth/ganti_password',$data);
           $this->load->view('templates/admin_footer');
       } else{
        //    mengambil data password pada view
           $gantipassword = $this->input->post('gantipassword');
           $gantipassword1 = $this->input->post('gantipassword1');
           if(!password_verify($gantipassword,$data['user']['password'])){
            $this->session->set_flashdata('message','<div class="alert-danger" role="alert">Password Salah Anda Salah</div>');
            redirect('auth/ganti_password');

           }else{
            //    menyamakan password lama dengan yang baru
                if($gantipassword == $gantipassword1){
                    $this->session->set_flashdata('message','<div class="alert-danger" role="alert">Password baru tidak boleh sama dengan password lama</div>');
                    redirect('auth/ganti_password');
                }else{
            // jika password oke maka akan dijalankan script ini
                    $password_hash = password_hash($gantipassword1, PASSWORD_DEFAULT );
                    $this->db->set('password',$password_hash);
                    $this->db->where('email',$this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message','<div class="alert-success" role="alert">Password Berhasil diganti</div>');
                    redirect('auth/ganti_password');
                }
           }
       }
    }
}
