<?php

namespace App\Controllers;

use App\Models\CatModel as kModel;
use App\Models\BreedModel as pModel;
use Config\MyConfig as CModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use \IonAuth\Libraries\IonAuth;

class MainController extends BaseController
{
    function __construct() {
        $this->kModel = new kModel();
        $this->pModel = new pModel();
        $this->config = new CModel();
    }

    var $ionAuth;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, ResponseInterface $response, \Psr\Log\LoggerInterface $logger){
        parent::initController($request, $response, $logger);
        $this->ionAuth = new IonAuth();
    }

    /*MAIN PAGE + SINGLE CAT PAGE*/

    function catsPage()
    {
        $perpage=$this->config->variable;
        $config = new CModel();
        $data['array']= $this->kModel->orderBy("id_kocka","asc")->paginate($perpage);
        $data['pager'] = $this->kModel->pager;
        $data['title']="Naše Kočky";
        $data['logged'] = $this->ionAuth->loggedIn();
        $data['adminCheck'] = $this->ionAuth->isAdmin();
        return view('CatPage',$data);
    }

    function catsSinglePage($id)
    {
        $data['array']= $this->kModel->join('ut_status','ut_status.id_status=ut_kocka.status','inner')->join('ut_plemeno','ut_plemeno.id_plemeno=ut_kocka.plemeno_id','inner')->where('id_kocka', $id)->orderBy("id_kocka","asc")->findAll();
        $data['title']="Naše Kočky";
        $data['logged'] = $this->ionAuth->loggedIn();
        $data['adminCheck'] = $this->ionAuth->isAdmin();
        return view('CatSinglePage',$data);
    }

    /*CREATING*/

    function addCat() {
        $data['array']= $this->kModel/*->join('ut_plemeno','ut_plemeno.id_plemeno=ut_kocka.plemeno_id','inner')*/->orderBy("id_kocka","asc")->findAll();
        $data['list']= $this->pModel->orderBy("id_plemeno","asc")->findAll();
        $data['title'] = "Přidat kočku";
        $data['logged'] = $this->ionAuth->loggedIn();
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

    /*SHOW ALL CATS PAGE*/

    function showAll() {
        $data['array']= $this->kModel->orderBy("id_kocka","asc")->findAll();
        $data['title'] = "Seznam všech Koček";
        $data['logged'] = $this->ionAuth->loggedIn();
        echo view('CatArrayList', $data);
    }

    /*EDITING*/

    function editCat($id) {
        $data['array']= $this->kModel->where('id_kocka', $id)->orderBy("jmeno","asc")->findAll();
        $data['table']= $this->pModel->orderBy("id_plemeno","asc")->findAll();
        $data['title']="Upravit";
        $data['logged'] = $this->ionAuth->loggedIn();
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

    /*DELETION CONFIRMATION PAGE*/

    function confirmDelete($id){
        $data['array']= $this->kModel->find($id);
        $data['title']="Potvrdit";
        $data['logged'] = $this->ionAuth->loggedIn();
        return view('DeleteCat',$data);
    }

    /*DELETING*/

    function deleteForm(){
        $id = $this->request->getPost('id_kocka');
        $return = $this->kModel->delete($id);
       
        //var_dump($return);
        return redirect()->route('CatPage');
    }
}
