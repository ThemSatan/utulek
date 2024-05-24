<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class OwnerModel extends Model{
        protected $table = "majitel";
        protected $returnType = "object";
        protected $primaryKey = "id_majitel";
    }
?>