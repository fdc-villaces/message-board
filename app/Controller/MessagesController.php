<?php 

class MessagesController extends AppController{
	public $components = array('Paginator');
    public $pageLimit = 10;

	public function all_message() { 
	 	$count = $this->pageLimit;
	 	$this->loadModel('User');
        $users = $this->User->find('all');
        $this->set(compact('users', 'count'));
       
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
    public function create() {
        $this->loadModel('User');
        $this->loadModel('Relation');        
        $users = $this->User->find('all');
        if ($this->request->is('post')) {
            // check if no recipient            

            if ($this->request->data['Relation']['receiver_id'] == 0) {
                $this->Session->setFlash(__('Please select recipient'));
            } else {
                $flag = true;
                $authId = $this->Auth->user('id');
                $dataSource = $this->Relation->getDataSource(); 
                $dataSource->begin();

                $this->request->data['Relation']['sender_id'] = $this->Auth->user('id');

                if (!$this->Relation->save($this->request->data['Relation'])) {
                    $flag = false;
                }
                $this->request->data['Message']['relation_id'] = $this->Relation->id;
                if (!$this->Message->save($this->request->data['Message'])) {
                    $flag = false;
                }

                if ($flag) {
                    $dataSource->commit();
                    $this->Session->setFlash(__('Message sent.'));
                    $this->redirect(array('action' => 'all_message'));
                } else {
                    $dataSource->rollback();
                    $this->Session->setFlash(__('Message not sent.'));
                }              
            }            
        }
        $this->set('users', $users);
    }
    public function view(){
    	
    }
     public function delete() {
        $authId = $this->Auth->user('id');   
        $id = $this->request->data['id']; 
        if ($this->request->is('post')) {
            // update status to deleted
            $this->Message->updateAll(
                array('status' => '"deleted"'),
                array(
                    "relation_id IN 
                    (SELECT id 
                    from relations 
                    WHERE (receiver_id = {$id} && sender_id = {$authId}) 
                        || (receiver_id = {$authId} && sender_id = {$id}))"
                )
            );     
              
        } else {
            // code if not deleted
        }
        exit;
    }


}