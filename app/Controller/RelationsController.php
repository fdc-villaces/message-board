<?php 
    
class RelationsController extends AppController {
    public function list($count = 10) {
        $user_id = $this->Auth->user('id');          
        $perPage = 10;   

        $this->paginate = array('Relation' => array(
            'joins' => array(      
                array(
                    'type' => 'LEFT',
                    'table' => 'messages',
                    'alias' => 'Message',
                    'conditions' => 'Message.relation_id = Relation.id'
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
            ),
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
                "Relation.id IN 
                (SELECT MAX(relationTable.id) FROM relations as relationTable LEFT JOIN messages as messageTable ON messageTable.relation_id = relationTable.id WHERE (messageTable.status != 'deleted') AND (relationTable.sender_id = {$user_id} OR relationTable.receiver_id = {$user_id}) GROUP BY
                        LEAST(sender_id, receiver_id),
                        GREATEST(sender_id, receiver_id))",
                ),
            'order' => 'Message.created DESC',
            'limit' => $count, 
        ));

        $messages = $this->paginate('Relation');
       
        $this->layout = false;
        
        // echo pr($messages);exit;

        $this->set(compact('count', 'messages', 'perPage'));
    }
}