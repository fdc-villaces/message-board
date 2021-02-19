<?php 
class Message extends AppModel {
    public $validate = array(
        'msg_content' => array(
            'rule' => 'notBlank',
            'Message' => 'Please enter your message.'
        )
    );
   //   public $belongsTo = array(
	  //  'Relation' => array(
	  //   'className' => 'Relation',
	  //   'foreignKey' => 'id'
	  //  ),
	  // );

}