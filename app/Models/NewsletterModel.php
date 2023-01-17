<?php
namespace App\Models;
use CodeIgniter\Model;

class NewsletterModel extends Model{

    protected $table="newsletter";
    protected $primaryKey="id";

    protected $returnType="array";
    protected $useSoftDeletes=true;

    protected $allowedFields=["email"];

    public function findAllNS($email){
        $query="select * from ".$this->table." where email='".$email."'";
        $data = $this->db->query($query);
        
        return $data;
    }
}