<?php

class RegisterController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }


    public function indexAction()
    {
        $form = new RegisterForm;

        if ($this->request->isPost()) {
        	// print_r($this->request->getPost());exit();
            $name = $this->request->getPost('name', array('string', 'striptags'));
            $email = $this->request->getPost('email', 'email');
            $password = $this->request->getPost('password');
            $repeatPassword = $this->request->getPost('repeatPassword');

            // if ($password != $repeatPassword) {
            //     $this->flash->error('Passwords are different');
            //     return false;
            // }
            
            $user = new User();
            $user->name = $name;
            $user->passwd = sha1($password);
            $user->email = $email;
            // var_dump($user);exit();
          
            if ($user->save() == false) {
                foreach ($user->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            } else {
                $this->tag->setDefault('email', '');
                $this->tag->setDefault('password', '');
                $this->flash->success('Thanks for sign-up, please log-in to start generating invoices');
                return $this->forward('login/index');
            }
        }

        $this->view->form = $form;
    }
}
