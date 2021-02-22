
<?php foreach($messages as $key => $message) : ?>
<?php if(AuthComponent::user('id') == $message['Relation']['sender_id']) : ?>
<div id="msg_id_<?php echo $message['Message']['id']; ?>" class="chat-message order-<?php
  if($key == 0)
    echo "10 mt-4";
  else if($key== 1)
    echo "9";
  else if($key== 2)
    echo "8";
  else if($key== 3)
    echo "7";
  else if($key== 4)
    echo "6";
  else if($key== 5)
    echo "5";
  else if($key== 6)
    echo "4";
  else if($key== 7)
    echo "3";
  else if($key== 8)
    echo "2";
  else
    echo "1"; 
   ?>">
  
   <div class="flex items-end justify-end msg-wrapper">
    <div class="flex items-center delete-msg">
      <button onclick="deleteSingleMsg(<?php echo $message['Message']['id']; ?>)" class="-mt-12 mr-4 focus:outline-none">
        <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
      </button>
    </div>
      <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-1 items-end">

         <div><span class="px-4 py-3 rounded-lg inline-block rounded-br-none bg-blue-500 text-white text-lg"><?php echo ucwords($message['Message']['msg_content']); ?></span></div>
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
<div id="msg_id_<?php echo $message['Message']['id']; ?>" class="chat-message order-<?php
  if($key == 0)
    echo "10 mt-4";
  else if($key== 1)
    echo "9";
  else if($key== 2)
    echo "8";
  else if($key== 3)
    echo "7";
  else if($key== 4)
    echo "6";
  else if($key== 5)
    echo "5";
  else if($key== 6)
    echo "4";
  else if($key== 7)
    echo "3";
  else if($key== 8)
    echo "2";
  else
    echo "1"; 
   ?>">
   <div class="flex items-end msg-wrapper">

      <div class="flex flex-col space-y-2 text-xs max-w-xs mx-2 order-2 items-start">
         <div><span class="px-4 py-3 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600 text-lg"><?php echo ucwords($message['Message']['msg_content']); ?></span>

         </div>

      </div>

      <?php
       $image = $message['User']['user_image'] ? '/profile/'.$message['User']['user_image'] : 'https://banner2.cleanpng.com/20180410/bbw/kisspng-avatar-user-medicine-surgery-patient-avatar-5acc9f7a7cb983.0104600115233596105109.jpg';
         echo $this->Html->image(
             $image, 
             array('class' => 'w-6 h-6 rounded-full order-1')
         );                  
     ?>   
     <?php if(AuthComponent::user('id') == $message['Relation']['sender_id']) : ?>
      <div class="flex items-center order-3 ml-4 delete-msg">
        <button onclick="deleteSingleMsg(<?php echo $message['Message']['id']; ?>)" class="-mt-12 mr-4 focus:outline-none">
          <svg class="h-6 w-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
        </button>
      </div>
    <?php endif; ?>
   </div>


</div>
<?php endif; ?>
<div class="w-full flex justify-center items-center absolute">
    <?php if ($this->Paginator->hasNext('Message')) : ?>
      <button onclick="seeMore(<?php echo $count + $perPage; ?>)" class="cursor-pointer -mt-3  bg-blue-500 px-6 py-2 focus:outline-none tracking-wide inline-block text-sm text-white rounded-full mx-auto justify-center">Previous
        <svg class="h-4 w-4 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" />
        </svg>
      </button>
     <?php endif; ?>
  </div>
  <div class="w-full flex justify-center items-center absolute bottom-0">
    <?php if ($this->Paginator->hasPrev('Message')) : ?>
      <button onclick="seeMore(<?php echo $count + $perPage; ?>)" class="cursor-pointer -mt-3  bg-blue-500 px-6 py-2 focus:outline-none tracking-wide inline-block text-sm text-white rounded-full mx-auto justify-center">See more
        <svg class="h-4 w-4 inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" />
        </svg>
      </button>
     <?php endif; ?>
  </div>
<?php endforeach; ?>
<style>
.msg-wrapper:hover .delete-msg{
display: block!important;
}
.delete-msg{
 display: none!important;
}
</style>
