<?php
namespace App\Controllers;

use \Core\View;
class Home extends \Core\Controller{
    protected function before(){
        //echo "(before) ";
        //return false;
    }
    protected function after(){
        //echo " (after)";
    }
    public function indexAction(){
      //  echo 'index action-Home controller';
        // view::render('Home/index.php',[
        //     'name'  => 'Jarif',
        //     'colors' => ['red','black','blue']
        // ]);
        view::renderTemplate('Home/index.html',[
            'name'  => 'Jarif',
            'colors' => ['red','black','blue']
        ]);
    }
}