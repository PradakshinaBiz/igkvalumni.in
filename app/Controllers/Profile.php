<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\LocationModel;
use App\Models\CountryModel;
use App\Models\UniversityModel;
use App\Models\InstituteModel;

class Profile extends BaseController
{
    public function index()
    {
        $session = session();

        $userModel = new UserModel();
        $locationModel = new LocationModel();
        $countryModel = new CountryModel();
        $universityModel = new UniversityModel();
        $instituteModel = new InstituteModel();



        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }


        $data = [];

        $rules = ['passout_year' => 'required'];
        if ($this->request->getMethod() === 'post' && $this->validate($rules)) {
            //var_dump($this->request->getVar());

            $user_data = [

            "email_id" => $this->request->getVar("email_id"),
            "mobile_no" => $this->request->getVar("mobile_no"),
            "add_1" => $this->request->getVar("add_1"),
            "add_2" => $this->request->getVar("add_2"),
            "add_3" => $this->request->getVar("add_3"),
            "add_4" => $this->request->getVar("add_4"),

            "highest_qualification" => $this->request->getVar('highest_qualification'),
            "passout_year" => $this->request->getVar('passout_year'),

            "university" => $this->request->getVar('university'),
            "university_other" => $this->request->getVar('university_other'),
            "institute" => $this->request->getVar('institute'),
            "institute_other" => $this->request->getVar('institute_other'),
            "fellowship" => $this->request->getVar('fellowship'),


            "e_city" => $this->request->getVar('e_city'),
            "e_state" => $this->request->getVar('e_state'),
            "e_country" => $this->request->getVar('e_country'),
            "e_pin" => $this->request->getVar('e_pin'),

            "employment_status" => $this->request->getVar('employment_status'),

            "job_started" => $this->request->getVar('job_started'),
            "department" => $this->request->getVar('department'),
            "designation" => $this->request->getVar('designation'),

            "company_name" => $this->request->getVar('company_name'),
            "c_address" => $this->request->getVar('c_address'),
            "c_city" => $this->request->getVar('c_city'),
            "c_state" => $this->request->getVar('c_state'),
            "c_country" => $this->request->getVar('c_country'),
            "c_pin" => $this->request->getVar('c_pin'),
            "c_email_id" => $this->request->getVar('c_email_id'),
            "c_mobile_no" => $this->request->getVar('c_mobile_no'),

            "brief_details" => $this->request->getVar('brief_details'),
            "updated_at" => date("Y-m-d H:m:s")
          ];

          /*---------------------------------------------------------------*/
          /* USER's PROFILE IMAGE */

          $file = $this->request->getFile("profile_image");

          if ($file->isValid())
          {
              $file_name = str_pad(session()->get('id'), 6, '0', STR_PAD_LEFT) . "." . $file->getClientExtension();
              $file->move(WRITEPATH. 'uploads/user/profile_image/',$file_name,TRUE);

              $user_data = ["profile_image" => $file_name];
          }
          else
          {

          }

          /*--------------------------------------------------------------*/

            $result = $userModel->set($user_data)->where("id", session()->get('id'))->update();

            if ($result > 0) {
                $session->setFlashdata('success', 'Successfully updated .');
            }
        }

        $user = $userModel->where('id', session()->get('id'))->first();

        if($user["profile_image"] == "")
        {
            $user["profile_image"] = STORE_URL.'user/profile_image/000000.png';
        }
        else
        {
            $user["profile_image"] = STORE_URL.'user/profile_image/'.$user["profile_image"];
        }

        $data['user'] = $user;

        $stateList = $locationModel->where("parents_id", 1)->orderBy('title', 'ASC')->findAll();
        $data['stateList'] = $stateList;

        $countryList = $countryModel->orderBy('name', 'ASC')->findAll();
        $data['countryList'] = $countryList;

        $universityList = $universityModel->orderBy('title', 'ASC')->findAll();
        $data['universityList'] = $universityList;

        $instituteList = $instituteModel->orderBy('title', 'ASC')->findAll();
        $data['instituteList'] = $instituteList;

        $data['page'] = view('pages/profile/index', $data);
        return view('templates/default', $data);
    }
}
