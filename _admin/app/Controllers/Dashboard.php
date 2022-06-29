<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {

      $session = session();
      if (! session()->get('logged_in'))
      {
        return redirect()->to('/login');
      }

      $data = [];
      $data['page'] = view('pages/dashboard/index', $data);
      return view('templates/default', $data);
    }
}
