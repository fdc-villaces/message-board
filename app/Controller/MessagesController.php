<?php 
class MessagesController extends AppController{
	public $components = array('Paginator');
    public $pageLimit = 10;

	public function list() { 
	 	$count = $this->pageLimit;
	 	$this->loadModel('User');
        $users = $this->User->find('all');
        $this->set(compact('users', 'count'));   
    }
    public function create() {
     	$this->loadModel('Relation');
        if ($this->request->is('post')) {
            //check if there's a receiver
    		if ($this->request->data['Relation']['receiver_id'] == 0 || is_null($this->request->data['Relation']['receiver_id']) || empty($this->request->data['Relation']['receiver_id'])) {
                $this->Session->setFlash(__('Please select recipient'));
            } else {
                $authId = $this->Auth->user('id');
                $this->request->data['Relation']['sender_id'] = $this->Auth->user('id');
                $this->Relation->save($this->request->data['Relation']);
                $this->request->data['Message']['status'] = 'active';
                $this->request->data['Message']['relation_id'] = $this->Relation->id;
                $this->Message->save($this->request->data['Message']);     
                $this->Session->setFlash(__('Message sent.'));
                $this->redirect(array('action' => 'all_message'));
          
            }            
        }
    
    }
    public function getUserMsg($id = null, $count = 10) {
    	$this->layout = false;
        $auth_id = $this->Auth->user('id');
        $perPage = $this->pageLimit;
        $this->Paginator->settings = array(
            'fields' => array(
                'Message.*',
                'Relation.*',
                'User.name as user_name',
                'User.id as user_id',
                'User.image as user_image',
                'Recepient.name as recepient_name',
                'Recepient.id as recepient_id',
                'Recepient.image as recepient_image'
            ),
            'conditions' => array(
                'OR' => array(
                    array('Relation.sender_id' => $auth_id, 'Relation.receiver_id' => $id),
                    array('Relation.receiver_id' => $auth_id, 'Relation.sender_id' => $id)
                ),
                array('status !=' => 'deleted')
            ),
            'order' => 'Message.id DESC',
            'limit' => $count,
            'joins' => array(
                array(
                    'type' => 'LEFT',
                    'table' => 'relations',
                    'alias' => 'Relation',
                    'conditions' => 'Relation.id = Message.relation_id'
                ),
                array(
                    'type' => 'LEFT',
                    'table' => 'users',
                    'alias' => 'User',
                    'conditions' => 'User.id = Relation.sender_id'
                ),
                array(
                    'type' => 'LEFT',
                    'table' => 'users',
                    'alias' => 'Recepient',
                    'conditions' => 'Recepient.id = Relation.receiver_id'
                )
            )
        );

        $messages = $this->Paginator->paginate();	
        $this->set(compact('messages', 'count', 'id', 'perPage'));
    }

    public function view($id){
    	
    	$perPage = $this->pageLimit;
    	$this->loadModel('User');
        $count = $this->pageLimit;
        $user = $this->User->find('first', array(
        	'conditions' => array(
        		'id' => $id
        	)
        )); 
      	if(!$user || is_null($user) || empty($user)) {
            $this->Session->setFlash(__('User Not Found'));
            $this->redirect($this->referer());
        }
        $this->set(compact('user', 'count', 'perPage'));
    }

    public function delete() {
        $authId = $this->Auth->user('id');   
        $id = $this->request->data['id']; 
        if ($this->request->is('post')) {
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
        } 
        $data = $this->Message->query("SELECT id 
                    from relations 
                    WHERE (receiver_id = {$id} && sender_id = {$authId}) 
                    || (receiver_id = {$authId} && sender_id = {$id})");
        exit;
    }
    public function deleteSingleMsg(){
    	$id = $this->request->data['id'];
    	$this->Message->updateAll(
            array('status' => '"deleted"',),
            array('id' => $id)
        ); 
         exit;    
    }

    public function replyMsg(){
    	$this->loadModel('Relation');
    	if ($this->request->is('post')) {  		
		$user_id = $this->Auth->user('id'); 

		$this->request->data = array(
            'Message' => array(
                'msg_content' => $this->request->data['message']
            ),
            'Relation' => array(
                'receiver_id' => $this->request->data['to_id'],
                'sender_id' => $this->Auth->user('id')
            )
        );
        $this->Relation->save($this->request->data);
        $this->request->data['Message']['relation_id'] = $this->Relation->id;
        $this->request->data['Message']['status'] = 'active';
        $this->Message->save($this->request->data);

        echo json_encode(array('success' => true));
        exit;
    	}
    }
}