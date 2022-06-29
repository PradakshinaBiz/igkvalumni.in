<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
      $data['meta_title'] = "Dean Faculty, College of Agriculture, IGKV, Raipur (Chhattisgarh) ";
      $data['page'] = view('pages/home/index');
      return view('templates/default', $data);
    }

    public function academic()
    {
      $data['meta_title'] = "Academic - Dean Faculty, College of Agriculture, IGKV, Raipur (Chhattisgarh)";
      $data['page'] = view('pages/home/academic');
      return view('templates/default', $data);
    }

    public function administrative()
    {
      $data['meta_title'] = "Administrative - Dean Faculty, College of Agriculture, IGKV, Raipur (Chhattisgarh)";
      $data['page'] = view('pages/home/administrative');
      return view('templates/default', $data);
    }

    public function contact()
    {

      $session = session();
      helper(['form']);

      $rules = ['name' => 'required','email_id'=>'required','mobile_no'=>'required','message'=>'required' ];
      if ($this->request->getMethod() === 'post' && $this->validate($rules))
      {
          $name = $this->request->getVar('name');
          $email_id = $this->request->getVar('email_id');
          $mobile_no = $this->request->getVar('mobile_no');
          $message = $this->request->getVar('message');

          $email = \Config\Services::email();
          $config['mailType'] = 'html';
          $email->initialize($config);

          $email->setFrom($this->request->getVar('email_id'), $name);
          $email->setTo("contact@deancoaryp.in");
          $email->setCc($this->request->getVar('email_id'));
          $email->setBcc("pradakshinaconsulting@gmail.com");
          $email->setSubject('Mail from IGKV');
          $email->setMessage($mail_content);
          $email->send();

      }

      $data['meta_title'] = "Contact - Dean Faculty, College of Agriculture, IGKV, Raipur (Chhattisgarh)";
      $data['page'] = view('pages/home/contact');
      return view('templates/default', $data);
    }
}
