<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index()
    {
      $data = [];
      $data['page'] = view('pages/profile/index', $data);
      return view('templates/default', $data);
    }
}
