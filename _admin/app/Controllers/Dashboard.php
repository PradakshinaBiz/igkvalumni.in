<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
      $data = [];
      $data['page'] = view('pages/dashboard/index', $data);
      return view('templates/default', $data);
    }
}
