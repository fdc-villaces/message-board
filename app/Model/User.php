<?php 

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    public $validate = array(
        'name' => array(
            'rule' => array('lengthBetween', 6, 20),
            'message' => 'Name should be at least 8 chars long'
        ),
        'email' => array(
            'required' => array(
                'rule'      => array('email'),
                'message'   => 'Please input your email.'
            ),
            'unique' => array(
                'rule'      => 'isUnique',
                'message'   => 'Provided Email is already exist.'
            )
        ),
        'password' => array(
            'rule' => array('minLength', '8'),
            'message' => 'Minimum 8 characters long'
        ),
        'confirm_password' => array(
            'compare' => array(
                'rule'      => array('validate_password'),
                'message'   => 'The password you entered do not match' 
            )
        ),
        'image' => array(
            'rule' => array(
                'extension',
                array('gif', 'jpeg', 'png', 'jpg')
            ),
            'message' => 'Please supply valid image',
            'allowEmpty' => true,
            'required' => false
        )
    );
    public function validate_password() {
        return $this->data['User']['password'] === $this->data['User']['confirm_password'];
    }

    public function beforeSave($options = array()) {
        if (isset($this->data['User']['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data['User']['password'] = $passwordHasher->hash(
                $this->data['User']['password']
            );
        }
        return true;
    }
}