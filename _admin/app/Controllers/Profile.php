<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index()
    {
      $session = session();
      if (! session()->get('logged_in'))
      {
        return redirect()->to('/login');
      }

      $data = [];
      $data['page'] = view('pages/profile/index', $data);
      return view('templates/default', $data);
    }
}
