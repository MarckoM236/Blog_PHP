<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Models\PostsModel;
use App\Models\CategoriesModel;
use App\Models\NewsletterModel;
use App\Models\CommentsModel;

class Dashboard extends BaseController
{
	public function index()
	{
		 //echo base_url();
         $this->loadView("index");
        
	}

    public function loadView($view=null,$data=null){
        if($data){
            echo view('includes/header',$data);
            echo view($view,$data);
            echo view('includes/footer',$data);
        }
        else{
            echo view('includes/header');
            echo view($view);
            echo view('includes/footer');
        }
         
    }

    public function uploadPost(){
        //instancia Post
        $postsModel= new PostsModel();
        //load categories
        $model= new CategoriesModel();
        $datos['categories'] = $model->findAllPer()->getResultArray();


        //para usar los form validations
        helper(["url","form"]);
        $validation=\Config\Services::validation();

        $validation->setRules([
            "tittle"=>"required",
            "intro"=>"required",
            "content"=>"required|min_length[50]",
            "category"=>"required"
        ],
        //Mensajes personalizados
        [
            "tittle"=>[
                "required"=>"The tittle is required, Please check it"
            ],
            "intro"=>[
                "required"=>"The tittle is required, Please check it"
            ],
            "content"=>[
                "required"=>"The tittle is required, Please check it",
                "min_length"=>"Min 50 characters Please"
            ],
            "category"=>[
                "required"=>"The tittle is required, Please check it"
            ]
        ]);

        if($_POST){

            if(!$validation->withRequest($this->request)->run()){
                $errors=$validation->getErrors();
                print_r($errors);
            }
            else{
                $file=$this->request->getFile("banner");
                $filename=$file->getRandomName();
                if($file->isValid()){
                    $file->move(ROOTPATH."public/uploads",$filename);

                    //Setiar campos que faltan
                    $_POST['banner']=$filename;
                    $_POST['slug']=url_title($_POST['tittle']);
                    $_POST['created_at']=date("Y-m-d");

                    //si es valido se guarda en la ruta y se inserta en la db
                    $postsModel->insert($_POST);

                }else{
                    echo "Not Valid";
                }
            }

            
        }
        $this->loadView("UploadPost",$datos);
        //echo view("UploadPost",$datos);
    }

    public function add_newsletter(){
        
        if($_POST['email']){
            
            $model=new NewsletterModel();
            $emails=$model->findAllNS($_POST['email'])->getResultArray();
            

            if($emails){
                echo "EL email ya esta registrado";
            }
            else{
                $id= $model->insert($_POST);
                echo "welcome to our Newsletter";
            }
            
        }
        
    }

    public function post($slug=null,$id=null){
        if($slug && $id){
            $commentsmodel= new CommentsModel();
            $data['comments']=$commentsmodel->findByIdPost($id)->getResultArray();
            $data['countcomments']=$commentsmodel->where("post_id",$id)->countAllResults();

            if(isset($_POST)){
               
                helper(["url","form"]);

                $validation= \Config\Services::validation();
                $validation->setRules([
                    "cName"=>"required",
                    "cEmail"=>"required",
                    "cMessage"=>"required|min_length[20]"
                ],
                [
                    "cName"=>[
                        "required"=>"Name is required, plesase write your name"
                    ],
                    "cEmail"=>[
                        "required"=>"Email is required, plesase write your Email"
                    ],
                    "cMessage"=>[
                        "required"=>"Comment is required, plesase write your Comment",
                        "min_length"=>"Min 20 characters please"
                    ]
                ]);

                if(!$validation->withRequest($this->request)->run()){
                    echo "error";
                    $data['error']=true;
                }
                else{
                    echo "success";
                    $arraycomment=[
                        "name"=>$_POST['cName'],
                        "email"=>$_POST['cEmail'],
                        "comment"=>$_POST['cMessage'],
                        "post_id"=>$id
                    ];
                    $commentsmodel->insert($arraycomment);
                }
            }

            

            $model=new PostsModel();
            $modelCategory= new CategoriesModel();
            $posts=$model->findAllPS($id)->getResultArray();
            $data['post']=$posts;
            $data['category'] = $modelCategory->findById($posts[0]['category'])->getResultArray();

            $this->loadView("post",$data);
        }
    }

    public function category($id=null){
        $model=new PostsModel();
        $modelCategory= new CategoriesModel();
        $data['category']=$modelCategory->where("id",$id)->findAll();
        $data['posts']=$model->where("category",$id)->findAll();
        $this->loadView("category",$data);
    }

    //-------------Funciones de prueba------------------------------

    public function helloWorld($var1=null,$var2=null){
        echo "Hello World";
        echo "esta es una variable: ". $var1.", ".$var2;
    }

    public function create(){
        $model= new UsersModel();
        $id=$model->insert([
            "name_user"=>"Tara2",
            "username"=>"guanesa2",
            "password"=>"123456",
            "role"=>"1",
            "last_login"=>"now()"
        ]);

        

        if($id=null){
            echo "Error al insertar";
        }
        else{
            echo "Se inserto el registro exitosamente";
        }
    }

    public function createPosts(){
        $model= new PostsModel();
        $id=$model->insert([
            "banner"=>"img1.png",
            "tittle"=>"My firts Post",
            "intro"=>"Hello, this is me",
            "content"=>"this is a ...",
            "category"=>"1",
            "tags"=>"sports",
            "created_at"=>date("Y-m-d"),
            "created_by"=>"1"
        ]);

        if($id=null){
            echo "Error al insertar";
        }
        else{
            echo "Se inserto el registro exitosamente";
        }
    }

    public function createCategiries(){
        $model= new CategoriesModel();
        $id=$model->insert([
            "name"=>"prueba"
        ]);

        

        if($id=null){
            echo "Error al insertar";
        }
        else{
            echo "Se inserto el registro exitosamente";
        }
    }
}
