<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller{
    public function indexAction(){
        
    }
    
    public function registerAction(){
        $user = new Users();

        $user->assign(
            $this->request->getPost(),
            [
                'name',
                'email',
            ]
        );

        $success = $user->save();

        $this->view->success = $success;

        if($success) {
            $message = 'Thanks for registering!';
        }else{
            $message = 'Sorry, the following problems were generated:<br>';
                     //. implode('<br>', $user->getMessages());

            $message = $user->getMessage(); 
        }
        $this->view->disable();
    }
}