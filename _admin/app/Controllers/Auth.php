<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
class Auth extends BaseController
{
  public function index()
  {
      $session = session();
      helper(['form']);
      $userModel = new AdminModel();
      $rules = ['email_id' => 'required|min_length[4]|max_length[100]|valid_email','password'=>'required' ];
      if ($this->request->getMethod() === 'post' && $this->validate($rules)) {
          $email_id = $this->request->getVar('email_id');
          $password = $this->request->getVar('password');

          $data = $userModel->where('email_id', $email_id)->first();

          if ($data) {
              $pass = $data['password'];
              $authenticatePassword = password_verify($password, $pass);
              if ($authenticatePassword) {
                  $ses_data = [
                  'id' => $data['id'],
                  'name' => $data['name'],
                  'email_id' => $data['email_id'],
                  'logged_in' => true
              ];
                  $session->set($ses_data);
                  return redirect()->to('/dashboard');
              } else {
                  $session->setFlashdata('msg', 'Password is incorrect.');
                  return redirect()->to('/login');
              }
          } else {
              $session->setFlashdata('msg', 'Email does not exist.');
              return redirect()->to('/login');
          }


      } else {
          $data['page'] = view('pages/auth/index');
          return view('templates/default', $data);
      }
  }

  public function logout()
  {
      $session = session();
      $session->destroy();
      return redirect()->to('/login');
  }
}
