<?php
namespace App\Models;
use CodeIgniter\Model;

class PostsModel extends Model{

    protected $table="posts";
    protected $primaryKey="id";

    protected $returnType="array";
    //protected $useSoftDeletes=true;

    protected $allowedFields=["banner","slug","tittle","intro","content","category","tags","created_at","created_by"];

    public function findAllPS($id){
        $query="select * from ".$this->table." where id='".$id."'";
        $data = $this->db->query($query);
        
        return $data;
    }
}