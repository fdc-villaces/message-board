<?php 

class MessagesController extends AppController{

	 public function all_message() { 
	 	 $this->loadModel('User');
	      $users = $this->User->find('all');
	      $this->set(compact('users'));
        // $count = $this->pageLimit;
        // $this->set(compact('count'));
    }
    public function singlemsg(){

		$id = $this->request->query('id');  
	
    	$user_id = $this->Auth->user('id');
    	$greetings = "hello world";
    	// $messages = $this->Message->find('all', array('conditions' => array('Message.receiver_id' => $user_id, 'Message.sender_id' => $id), 'order' => 'Message.id DESC'));
    	$messages = $this->Message->query("SELECT * FROM messages where receiver_id = $user_id AND sender_id = $id ORDER BY id DESC");
    	$this->layout = false;
    	echo json_encode(compact('messages'));
    	// echo pr($messages);exit;
    	// $this->set(compact('greetings', 'messages'));

    	
    }

}