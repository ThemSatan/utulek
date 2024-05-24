<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class FotoModel extends Model{
        protected $table = "fotografie";
        protected $returnType = "object";
        protected $primaryKey = "id_fotografie";
    }
?>