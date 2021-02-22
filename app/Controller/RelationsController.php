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
                        GREATEST(sender_id, receiver_id))",
                ),
            'order' => 'Message.id ASC',
            'limit' => $count, 
        ));

        // SELECT `Message`.*, `Relation`.*, `User`.`name` AS `user_name`, `User`.`id` AS `user_id`, `User`.`image` AS `user_image`, `Recepient`.`name` AS `recepient_name`, `Recepient`.`id` AS `recepient_id`, `Recepient`.`image` AS `recepient_image` FROM `message_app_db`.`relations` AS `Relation` LEFT JOIN `message_app_db`.`messages` AS `Message` ON (`Message`.`relation_id` = `Relation`.`id`) LEFT JOIN `message_app_db`.`users` AS `User` ON (`User`.`id` = `Relation`.`sender_id`) LEFT JOIN `message_app_db`.`users` AS `Recepient` ON (`Recepient`.`id` = `Relation`.`receiver_id`) WHERE `Relation`.`id` IN (SELECT MAX(`relationTable`.`id`) FROM relations as relationTable LEFT JOIN messages as messageTable ON `messageTable`.`relation_id` = `relationTable`.`id` WHERES (`messageTable`.`status` != 'deleted') AND (`relationTable`.`sender_id` = 59 OR `relationTable`.`receiver_id` = 59) GROUP BY LEAST(sender_id, receiver_id), GREATEST(sender_id, receiver_id)) ORDER BY `Message`.`created` ASC LIMIT 10
       

     
        $messages = $this->paginate('Relation');
      // echo pr($messages);exit;
        $this->layout = false;
        
        // echo pr($messages);exit;

        $this->set(compact('count', 'messages', 'perPage'));
    }
}