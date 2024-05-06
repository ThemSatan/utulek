<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class BreedModel extends Model{
        protected $table = "plemeno";
        protected $returnType = "object";
        protected $primaryKey = "id_plemeno";
    }
?>