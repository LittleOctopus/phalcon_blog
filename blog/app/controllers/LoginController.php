<?php

/**
 * SessionController
 *
 * Allows to authenticate users
 */
class LoginController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Sign Up/Sign In');
        parent::initialize();
    }

    public function indexAction()
    {
        $form = new LoginForm;
        $this->view->form = $form;
    }

    /**
     * Register an authenticated user into session data
     *
     * @param Users $user
     */
    private function _registerSession(User $user)
    {
        $this->session->set('auth', array(
            'id' => $user->id,
            'name' => $user->name
        ));
    }

    /**
     * This action authenticate and logs an user into the application
     *
     */
    public function startAction()
    {
        if ($this->request->isPost()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $user = User::findFirst(array(
                "(email = :email: OR name = :email:) AND passwd = :password: ",
                'bind' => array('email' => $email, 'password' => sha1($password))
            ));
            
            if ($user != false) {
                // print_r($user->name);exit();
                $this->_registerSession($user);
                return $this->forward('index/index');
            }

            $this->flash->error('请输入正确的用户名或密码');
        }

        return $this->forward('login/index');
    }

    /**
     * Finishes the active session redirecting to the index
     *
     * @return unknown
     */
    public function endAction()
    {
        $this->session->remove('auth');
        $this->flash->success('Goodbye!');
        return $this->forward('index/index');
    }
}
