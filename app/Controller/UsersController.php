<?php

class UsersController extends AppController {


    var $uses = array('User', 'Category', 'Cooking');

    public function index()
    {

       pr( $this->User->find('all'));

        // // $this->autoRender = false;
        // $options['joins'] = array(
        //     array('table' => 'cookings',
        //         'alias' => 'cookings',
        //         'type' => 'inner',
        //         'conditions' => array(
        //         'User.id = cookings.user_id'
        //         )
        //     )
        // );

        // $options['group'] = array('cookings.id',);
        // $options['fields'] = array('User.id', 'User.name', 'cookings.name');


        // $data = $this->User->find('all', $options);
        // // pr($data);
    }

    public function login()
    {
        $this->autoRender = false;
        if ($this->request->is('get')) {
            $this->set('message', '');
            $this->render('index');
        } elseif ($this->request->is('post')) {
            $conditions = array(
            'User.email' => $this->request->data['email'],
            'User.password' => hash('md5', $this->request->data['Password']),
            );

            if ($user = $this->User->find('all', array('conditions' =>  $conditions))) {
                $this->set('message', '');
                return $this->redirect(array('action' => 'manager'));
            } else {
                $this->set('message', 'Sai tên đăng nhập hoặc mật khẩu');
                $this->render('index');
            }
        }
    }
    
    public function register()
    {
        $this->autoRender = false;
         $this->render();
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

    public function update_user($id)
    {
        $this->autoRender = false;
        $datasource = $this->User->getDataSource();
        $data = $this->request->data;
        if (!$data['password']) {
            unset($data['password']);
        } else {
            $data['password'] = hash('md5', $data['password']);
        }
        $datasource->begin();
        $this->User->id = $id;
        if ($this->User->save($data)) {
            $datasource->commit();
            return 1;
        } else {
             $datasource->rollback();
            return 0;
        }
    }

    public function new_user()
    {
        $this->autoRender = false;

        if ($this->User->find('first', array('conditions' => array('email' => $this->request->data['email'])))) {
            return 2;
        }
        $this->User->create();
        if ($this->User->save($this->request->data)) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete_user($id)
    {
        $this->autoRender = false;

        $this->User->delete($id);

        return 1;
        // return json_encode($this->User->find('first', array('conditions' => array('id' => $id))));
    }
}
