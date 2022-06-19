<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Ajax extends BaseController
{
    public function index()
    {
        //
    }

    public function send_mail()
    {

      $email = \Config\Services::email();
      $config['mailType'] = 'html';
      $email->initialize($config);


      $userModel = new UserModel();

      $user_id = $this->request->getVar('user_id');
      $mail_content = $this->request->getVar('mail_content');

      $user_id_arr = explode(",",$user_id);

      foreach($user_id_arr as $uuid)
      {
          log_message('error', $uuid );
          $user = $userModel->where('uuid', $uuid)->first();

          $email_id = $user['email_id'] ;

          $data['content'] = $mail_content;

          $email->setFrom('info@deancoaryp.in', 'deancoaryp.in');
          $email->setTo($email_id);
          $email->setBcc("pradakshinaconsulting@gmail.com");
          $email->setSubject('Mail from IGKV');
          $email->setMessage($mail_content);
          $email->send();

      }


      $data = [];
      return view('pages/ajax/send_mail', $data);
    }

    public function update_password()
    {

      $email = \Config\Services::email();
      $config['mailType'] = 'html';
      $email->initialize($config);


      $userModel = new UserModel();

      $user_id = $this->request->getVar('user_id');
      $mail_content = $this->request->getVar('mail_content');

      $user_id_arr = explode(",",$user_id);

      foreach($user_id_arr as $uuid)
      {
          log_message('error', $uuid );
          $user = $userModel->where('uuid', $uuid)->first();
          $email_id = $user['email_id'] ;

          $password = rand(100000, 999999);

          $user_data = ["password" => $password];
          $result = $userModel->set($user_data)->where('uuid', $uuid)->update();

          $mail_content = "<p>Dear ".$user["name"]."</p>";
          $mail_content .="<p>We are happy to inform all of you that we are creating a database of Alumni at university level. You are requested to update your profile in our specified link that we are sending with this mail along with your password. Please login to the website and fill the data sheet with what you achieved till now. If you feel any difficulty in use of this please let us know by mail or contact number provided in the website.</p>";
          $mail_content .= "<p></p>";

          $mail_content .= "<p>Please visit <a href='https://deancoaryp.in/login' target='_blank'>https://deancoaryp.in/</a>";
          $mail_content .= " and login with your user id ".$user["user_id"]." & password : ".$password."</p>";

          $mail_content .= "<p></p>";
          $mail_content .= "<p>With thanks,</p>";
          $mail_content .= "<p>Dr. M P Thakur</p>";
          $mail_content .= "<p>Dean Faculty</p>";
          $mail_content .= "<p>College of Agriculture</p>";
          $mail_content .= "<p>Indira Gandhi Krishi Vishwavidyalaya, Raipur (C.G.)</p>";


          $email->setFrom('deancoaryp.igkv@deancoaryp.in', 'deancoaryp.in');
          $email->setTo($email_id);
          $email->setBcc("pradakshinaconsulting@gmail.com");
          $email->setSubject('Mail from IGKV');
          $email->setMessage($mail_content);
          $email->send();

      }


      $data = [];
      return view('pages/ajax/send_mail', $data);
    }
}
