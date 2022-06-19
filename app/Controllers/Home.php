<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
      $data['meta_title'] = "IGKV , Faculty of Dean , College of agriculture Raipur , Chhattisgarh";
      $data['page'] = view('pages/home/index');
      return view('templates/default', $data);
    }
}
