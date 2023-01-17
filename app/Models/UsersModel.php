<?php
namespace App\Models;
use CodeIgniter\Model;

class UsersModel extends Model{

    protected $table="users";
    protected $primaryKey="id_user";

    protected $returnType="array";
    protected $useSoftDeletes=true;

    protected $allowedFields=["name_user","username","password","role","last_login"];
}