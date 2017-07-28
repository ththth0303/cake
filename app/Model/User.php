<?php

// App::uses('AppModel', 'Model');
/**
* 
*/
class User extends AppModel
{
    
    public $name = 'User';
    public $validate = array('email' => 'email', 'name' => 'notBlank');

    public $hasMany = array(
        'Cooking' => array(
            'className' => 'Cooking',
            'foreignKey' => 'user_id',
            'conditions' => array('Cooking.user_id' => 'User.id'),
        )
    );
}
