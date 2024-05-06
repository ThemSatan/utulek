<?php

namespace App\Controllers;

use App\Models\CatModel as kModel;
use App\Models\BreedModel as pModel;
use Config\MyConfig as CModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class MainController extends BaseController
{
    function __construct() {
        $this->kModel = new kModel();
        $this->pModel = new pModel();
        $this->config = new CModel();
    }

    function catsPage()
    {
        /*$perpage=$this->config->variable;
        $config = new CModel();
        $data["pager"] = $this->kModel->pager;*/
        $data['array']= $this->kModel->orderBy("id_kocka","asc")->findAll()/*paginate($perpage)*/;
        $data['title']="Naše Kočky";
        return view('CatPage',$data);
    }

    function addCat() {
        $data['array']= $this->pModel->orderBy("id_plemeno","asc")->findAll();
        $data["title"] = "Přidat kočku";
        echo view('AddCat', $data);
    }
    
    function createForm() {
        $status = $this->request->getPost('status');
        $name = $this->request->getPost('jmeno');
        $age = $this->request->getPost('vek');
        $weight = $this->request->getPost('vaha');
        $breed = $this->request->getPost('plemeno_id');
        $gender = $this->request->getPost('pohlavi');
        $birth = $this->request->getPost('narozeni');

        $data = array(
            'status' => $status,
            'jmeno' => $name,
            'vek' => $age,
            'vaha' => $weight,
            'plemeno_id' => $breed,
            'pohlavi' => $gender,
            'narozeni' => $birth
        );


        $this->kModel->save($data);
       
       return redirect()->route('CatPage');
    }

    function showAll() {
        $data['array']= $this->kModel->orderBy("id_kocka","asc")->findAll();
        $data["title"] = "Seznam všech Koček";
        echo view('CatArrayList', $data);
    }

    function editCat($id) {
        $data['array']= $this->kModel->where('id_kocka', $id)->orderBy("jmeno","asc")->findAll();
        $data['table']= $this->pModel->orderBy("id_plemeno","asc")->findAll();
        $data['title']="Upravit";
        return view('EditCat',$data);
    }
    

    function editForm() {
        $id = $this->request->getPost('id_kocka');
        $status = $this->request->getPost('status');
        $name = $this->request->getPost('jmeno');
        $age = $this->request->getPost('vek');
        $weight = $this->request->getPost('vaha');
        $breed = $this->request->getPost('plemeno_id');
        $gender = $this->request->getPost('pohlavi');
        $birth = $this->request->getPost('narozeni');

        $data = array(
            'id_kocka' => $this->request->getPost('id_kocka'),
            'status' => $this->request->getPost('status'),
            'jmeno' => $this->request->getPost('jmeno'),
            'vek' => $this->request->getPost('vek'),
            'vaha' => $this->request->getPost('vaha'),
            'plemeno_id' => $this->request->getPost('plemeno_id'),
            'pohlavi' => $this->request->getPost('pohlavi'),
            'narozeni' => $this->request->getPost('narozeni')

        );

        $this->kModel->save($data);

        return redirect()->route('CatPage');
    }
}
