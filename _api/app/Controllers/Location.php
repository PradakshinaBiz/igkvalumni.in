<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\LocationModel;

class Location extends ResourceController
{
    public function index()
    {
      $locationModel = new LocationModel();
      $locationList = $locationModel->where("parents_id",1)->orderBy('title', 'ASC')->findAll();

      $response = ["error" => false, "locationList" => $locationList];
      return $this->respondCreated($response);
    }
}
