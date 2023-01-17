<?php
namespace App\Models;
use CodeIgniter\Model;

class CommentsModel extends Model{

    protected $table="comments";
    protected $primaryKey="id";

    protected $returnType="array";
    //protected $useSoftDeletes=true;

    protected $allowedFields=["post_id","name","email","comment"];

    public function findAllCom(){
        $query='select * from '.$this->table;
        $data = $this->db->query($query);
        
        return $data;
    }
    public function findByIdPost($id){
        $query='select * from '.$this->table." where post_id=".$id;
        $data = $this->db->query($query);
        
        return $data;
    }
}