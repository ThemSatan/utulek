<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class CatModel extends Model{
        protected $table = "kocka";
        protected $returnType = "object";
        protected $primaryKey = "id_kocka";
    }
?>