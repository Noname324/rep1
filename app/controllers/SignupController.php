<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{
    public function indexAction()
    {

    }
    
    public function registerAction()
    {
        $user = new Users();

        $success = $user->save(
            $this->request->getPost(),
            ["name","email"]
        );
        $this->view->success = $success;
        if($success)
        {
            $message = "Спасибо за регистрацию.";
        }
        else
        {
            $message = "Извините, возникли следующие проблемы:".implode('<br>',$user->getMessages());
        }
       //$this->flash->notice($message);
        
       $this->view->message = $message;
    }
}