<?php 
App::uses('AppController', 'Controller');
class UsersController extends AppController{
	public $helpers = array('Js' => array('Jquery'), 'Paginator');
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('register', 'logout');
	}

	public function login(){
		if ($this->request->is('post')) {
			// unset($this->request->data['User']['password']);

            if ($this->Auth->login()) {      
            // echo "success";exit;         
                $this->User->id = $this->Auth->user('id');
                $this->User->saveField('last_login_time', date('Y-m-d H:i:s'));
                $this->redirect(
                    array('controller' => 'messages', 'action' => 'allMessage')
                );
                $this->Session->setFlash(__('User successfully login.'));
            } else {
            	 // echo "failed";exit;         
               $this->Flash->danger('Incorrect email or password', array(
					'key' => 'danger'
				));
            }
        }
	}
	public function register(){
		if($this->request->is('post')){
			if($this->User->save($this->request->data)){
				if($this->Auth->login()){
					$this->User->id = $this->Auth->user('id');
					
					$this->User->saveField('last_login_time', date('Y-m-d H:i:s'));

					$this->redirect(
                        array('action' => 'thankYou')
                    );
					$this->Session->setFlash(__('User successfully login.'));
				}
				else{
					$this->Session->setFlash(__('Register was unsuccessful'));
				}
			}
			else{				
				$this->Flash->danger('Unable to register', array(
					'key' => 'danger'
				));
			}
		}
	}
	public function thankYou(){

	}
	public function logout() {
        $this->Auth->logout();
        $this->redirect(
            array('action' => 'login')
        );
    }
}