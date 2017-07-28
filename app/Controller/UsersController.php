<?php

class UsersController extends AppController {
    var $layout = false;

    var $uses = array('User', 'Category');

    public function index()
    {
        $this->set('message', $this->User->find('all'));
        pr($this->Category->find('all')); //die();
        $this->set('categories', $this->Category->find('all'));
    }

    public function login()
    {
        if ($this->User->find('first', array('conditions' => array('email' => $this->request->data['email'], 'password' => hash('md5', $this->request->data['Password']))))) {
            return $this->redirect(array('action' => 'manager'));
        } else {
            $this->set('message', 'khong ton tai');
        }
    }
    
    public function register()
    {
//
    }

    public function manager()
    {
        $this->set('users', $this->User->find('all'));
    }

    public function check_register()
    {
        $data['name'] = $this->request->data['name'];
        $data['email'] = $this->request->data['email'];
        $data['password'] = hash('md5', $this->request->data['password']);

        $this->User->create();
        $this->User->save($data);

        return $this->redirect(array('action' => 'index'));
    }

    public function edit_user($id)
    {
        $this->autoRender = false;

        return json_encode($this->User->find('first', array('conditions' => array('id' => $id))));
    }

    public function delete_user($id)
    {
        $this->autoRender = false;

        $this->User->delete($id);

        return 1;

        // return json_encode($this->User->find('first', array('conditions' => array('id' => $id))));
    }

}
