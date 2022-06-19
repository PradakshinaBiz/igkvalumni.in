<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
class Admin extends BaseController
{
  public function index()
  {
      $userModel = new AdminModel();
      $userList = $userModel->findAll();

      $data['userList'] = $userList;

      $data['page'] = view('pages/admin/index', $data);
      return view('templates/default', $data);
  }
  public function create()
  {
      helper(['form']);
      $userModel = new AdminModel();
      $rules = ['name' => 'required|min_length[2]|max_length[50]', 'email_id' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user.email_id]', ];
      if ($this->request->getMethod() === 'post' && $this->validate($rules)) {
          $uuid = uniqid();
          //$password = rand(100000, 999999);

          $password = "123456789";

          $name = $this->request->getPost('name');
          $email_id = $this->request->getPost('email_id');

          $data = ['uuid'=>$uuid,'name' => $name, 'email_id' => $email_id,'password'=>$password ];

          $userModel->save($data);

          $email = \Config\Services::email();
          $config['mailType'] = 'html';
          $email->initialize($config);
          $email->setFrom('info@deancoaryp.in', 'deancoaryp.in');
          $email->setTo($email_id);
          $email->setSubject('Welcome - Your account created');
          $email->setMessage('<p>Your account created ... </br>Login id : '.$email_id.'</br>Password : '.$password.'</p>');

          return redirect()->to('/admin');
      } else {
          $data['page'] = view('pages/admin/create');
          return view('templates/default', $data);
      }
  }
}
