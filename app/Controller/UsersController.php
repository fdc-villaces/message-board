<?php 
App::uses('AppController', 'Controller');
class UsersController extends AppController {
public $helpers = array('Js' => array('Jquery'), 'Paginator');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register', 'logout');
    }
    public function login() {
        if ($this->Auth->loggedIn()) {
            $this->redirect(
                    array('controller' => 'messages', 'action' => 'list')
                );
        }
        else {
            if ($this->request->is('post')) {        
                if ($this->Auth->login()) {      
                    $this->User->id = $this->Auth->user('id');
                    $this->User->saveField('last_login_time', date('Y-m-d H:i:s'));
                    $this->redirect(
                        array('controller' => 'messages', 'action' => 'list')
                    );
                    $this->Session->setFlash(__('User successfully login.'));
                } else {
                   $this->Flash->danger('Incorrect email or password', array(
                        'key' => 'danger'
                    ));
                }
            }
        }
    }
    public function register() {
        if ($this->Auth->loggedIn()) {
            $this->redirect(
                    array('controller' => 'messages', 'action' => 'list')
                );
        }
        else {
            if ($this->request->is('post')) {
                if ($this->User->save($this->request->data)) {
                    if ($this->Auth->login()) {
                        $this->User->id = $this->Auth->user('id');  
                        $this->User->saveField('last_login_time', date('Y-m-d H:i:s'));
                        $this->redirect(
                            array('action' => 'thankYou')
                        );
                        $this->Session->setFlash(__('User successfully login.'));
                    }
                    else {
                        $this->Session->setFlash(__('Register was unsuccessful'));
                    }
                }
                else {               
                    $this->Flash->danger('Unable to register', array(
                        'key' => 'danger'
                    ));
                }
            }
        }
    }
    public function thanks() {

    }
    public function logout() {
        $this->Auth->logout();
        $this->redirect(
            array('action' => 'login')
        );
    }
    public function profile() {
        $this->loadModel('User');
        $users = $this->User->find('all');
        $this->set('users', $users);
    }
    public function otherProfile($id) {
        $user = $this->User->find('first', array(
            'conditions' => array(
                'id' => $id
            )
        ));
        $this->set('user', $user);
    }
    public function searchUser() {
        $result = array();
        if($this->request->is('get')) {
            $term = $this->request->query['userName'];
            $users = $this->User->find('all', array(
                'conditions' => array(
                    'User.name LIKE' => '%'.$term.'%'
                )
            ));

            $result = array();
            foreach($users as $key => $user) {
                $result[$key]['id'] = (int) $user['User']['id'];
                $result[$key]['text'] = $user['User']['name'];
            }
        }
        echo json_encode($result);
        exit;
    }
    public function edit() {
        $this->loadModel('User');
        $users = $this->User->find('all');
       
        if ($this->request->is('post')) {         
            $data = array();   
            $this->User->set($this->request->data);  
            if ($this->request->data['User']['address']) {
                $address = $this->request->data['User']['address'];
                $data['address'] = "'$address'";
            }
            if ($this->request->data['User']['contact_no']) {
                $contact_no = $this->request->data['User']['contact_no'];
                $data['contact_no'] = "'$contact_no'";
            }
            if ($this->request->data['User']['birthdate'] != '')  {
                $birthdate = date('Y-m-d',strtotime($this->request->data['User']['birthdate']));
                $data['birthdate'] = "'$birthdate'";
            }    
            if ($this->request->data['User']['gender'] != '') {
                $gender = $this->request->data['User']['gender'];
                $data['gender'] = "'$gender'";
            }
            if ($this->request->data['User']['hobby']) {
                $hobby = $this->request->data['User']['hobby'];
                $data['hobby'] = "'$hobby'";
            }
            if($this->request->data['User']['image'] == '') {
                unset($this->User->validate['image']);
            }
            if (empty($this->request->data['User']['image']['tmp_name'])) {
                unset($this->User->validate['image']);
            }            
            if ($this->User->validates()) { 
                $name = $this->request->data['User']['name'];         
                
                $data['name'] = "'$name'";
         
                if (!empty($this->request->data['User']['image']['tmp_name'])
                    && is_uploaded_file($this->request->data['User']['image']['tmp_name'])) {
                    $temp = explode('.', $this->request->data['User']['image']['name']);
                    $newFileName = round(microtime(true)).'.'.end($temp);
                    move_uploaded_file(
                        $this->request->data['User']['image']['tmp_name'],
                        WWW_ROOT . DS . 'profile/' . $newFileName
                    );   
                    $data['image'] = "'$newFileName'";
                } 
                $this->User->updateAll(
                    $data,
                    array('id' => $this->Auth->user('id'))
                );
                $this->Session->write('Auth', $this->User->read(null, $this->Auth->User('id')));   
                $this->redirect(
                    array('action' => 'profile')                    
                );            
            } 
        }
        $this->set('users', $users);
    }  
}