<?php
namespace App\Models;
use CodeIgniter\Model;

class CategoriesModel extends Model{

    protected $table="categories";
    protected $primaryKey="id";

    protected $returnType="array";
    //protected $useSoftDeletes=true;

    protected $allowedFields=["name","deleted"];

    public function findAllPer(){
        $query='select * from '.$this->table;
        $data = $this->db->query($query);
        
        return $data;
    }
    public function findById($id){
        $query='select * from '.$this->table." where id=".$id." and deleted=0";
        $data = $this->db->query($query);
        
        return $data;
    }
}