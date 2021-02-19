
<?php foreach($messages as $message) : ?>
<?php if(AuthComponent::user('id') == $message['Relation']['sender_id']) : ?>
<div id="msg_id_<?php echo $message['Message']['id']; ?>" class="chat-message">
   <div class="flex items-end justify-end">
      <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">
         <div><span class="px-4 py-3 rounded-lg inline-block rounded-br-none bg-blue-500 text-white  text-base"><?php echo ucwords($message['Message']['msg_content']); ?></span></div>
      </div>
        <?php
       $image = $message['User']['user_image'] ? '/profile/'.$message['User']['user_image'] : 'https://banner2.cleanpng.com/20180410/bbw/kisspng-avatar-user-medicine-surgery-patient-avatar-5acc9f7a7cb983.0104600115233596105109.jpg';
         echo $this->Html->image(
             $image, 
             array('class' => 'w-6 h-6 rounded-full order-1')
         );                  
     ?>
   </div>
</div>
<?php else :?>
<div id="msg_id_<?php echo $message['Message']['id']; ?>" class="chat-message">
   <div class="flex items-end">
      <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
         <div><span class="px-4 py-3 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600 text-base"><?php echo ucwords($message['Message']['msg_content']); ?></span>

         </div>
      </div>
      <?php
       $image = $message['User']['user_image'] ? '/profile/'.$message['User']['user_image'] : 'https://banner2.cleanpng.com/20180410/bbw/kisspng-avatar-user-medicine-surgery-patient-avatar-5acc9f7a7cb983.0104600115233596105109.jpg';
         echo $this->Html->image(
             $image, 
             array('class' => 'w-6 h-6 rounded-full order-1')
         );                  
     ?>      
   </div>
</div>
<?php endif; ?>
<?php endforeach; ?>
