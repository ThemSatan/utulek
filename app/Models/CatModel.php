<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class CatModel extends Model{
        protected $table = "kocka";
        protected $returnType = "object";
        protected $primaryKey = "id_kocka";
        protected $autoIncrement = "true";
        protected $useSoftDeletes = "true";
        protected $allowedFields = ['status', 'jmeno', 'vek', 'vaha', 'plemeno_id', 'pohlavi', 'narozeni'];
        protected $deletedField = "vymazano";
        protected $dateFormat = "int";
        protected $useTimeStamps = "true";
        protected $createdField = "vytvoreno";
        protected $updatedField = "upraveno";

        /*public function update_data($id, $data) {
            $this->db->where('id_kocka', $id);
            $this->db->update('kocka', $data);
        }*/
    }
?>