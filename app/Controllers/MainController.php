<?php

namespace App\Controllers;

use App\Models\CatModel as kModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MainController extends BaseController
{
    function __construct() {
        $this->kModel = new kModel();
    }

    function catsPage()
    {
        $data['array']= $this->kModel->orderBy("id_kocka","asc")->findAll();
        $data['title']="Naše Kočky";
        return view('CatPage',$data);
    }
}
