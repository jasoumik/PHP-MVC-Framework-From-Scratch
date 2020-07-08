<?php
namespace App\Controllers;
use \Core\View;
use App\Models\Post;
class Posts extends \Core\Controller{
    public function indexAction(){
        // echo "index action-Posts controller";
        // echo '<p>Query String Parameters: <pre>' 
        // .htmlspecialchars(print_r($_GET,true)). ' </pre>';
        $posts=Post::getAll();
        View::renderTemplate('Posts/index.html',[
            'posts' =>$posts
        ]);
    }
    public function addNewAction(){
        echo "addNew action-Posts controller";
    }
    public function editAction(){
        echo "edit action-Posts controller";
        echo '<p>Route Parameters: <pre>' 
        .htmlspecialchars(print_r($this->route_params,true)). ' </pre>';
    }
}