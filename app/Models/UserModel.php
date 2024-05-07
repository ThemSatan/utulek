<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class UserModel extends Model{
        protected $table = "ut_uzivatel";
        protected $returnType = "object";
        protected $primaryKey = "id_uzivatel";
    }
?>