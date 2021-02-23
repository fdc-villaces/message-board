<div class="w-11/12 md:w-10/12 mx-auto">
	<div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
   <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
      <div class="flex items-center space-x-4">
        <?php
          $image = $user['User']['image'] ? '/profile/'.$user['User']['image'] : 'https://banner2.cleanpng.com/20180410/bbw/kisspng-avatar-user-medicine-surgery-patient-avatar-5acc9f7a7cb983.0104600115233596105109.jpg';
            echo $this->Html->image(
                $image, 
                array('class' => 'w-10 sm:w-16 h-10 sm:h-16 rounded-full'));                  
        ?>
         <div class="flex flex-col leading-tight">
            <div class="text-lg md:text-2xl mt-1 flex items-center">
              <?php 
                  echo $this->Html->link(
                     $user['User']['name'],
                      array('controller' => 'users', 'action' => 'otherProfile', $user['User']['id']),
                      array('class' => 'text-gray-700 mr-3 cursor-pointer'));
              ?> 
               <span class="text-green-500">
                  <svg width="10" height="10">
                     <circle cx="5" cy="5" r="5" fill="currentColor"></circle>
                  </svg>
               </span>
            </div>
            <span class="text-lg text-gray-600"><?php echo ucwords($user['User']['contact_no']); ?></span>
         </div>
      </div>
      <div class="flex items-center space-x-2">
         <?php 
            echo $this->Html->link(
               'Back',
                array('controller' => 'messages', 'action' => 'all_message'),
                array('class' => 'inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-700 focus:outline-none text-lg font-semibold cursor-pointer'));
          ?>     
      </div>
   </div>
  <div id="message-card" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch relative z-10 h-screen">   
  </div>
    <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
      <div class="relative flex">
         <input type="text" id="message_id" name="message" placeholder="Write Something" class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-full py-3">
         <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">           
            <input type="hidden" id="to_id" value="<?php echo $user['User']['id']; ?>"></input>  
            <button id="replyMsg" type="button" class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-6 w-6 transform rotate-90">
                  <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
               </svg>
            </button>
         </div>
      </div>
    </div>
  </div>
</div>
<style>
.scrollbar-w-2::-webkit-scrollbar {
  width: 0.25rem;
  height: 0.25rem;
}

.scrollbar-track-blue-lighter::-webkit-scrollbar-track {
  --bg-opacity: 1;
  background-color: #f7fafc;
  background-color: rgba(247, 250, 252, var(--bg-opacity));
}

.scrollbar-thumb-blue::-webkit-scrollbar-thumb {
  --bg-opacity: 1;
  background-color: #edf2f7;
  background-color: rgba(237, 242, 247, var(--bg-opacity));
}

.scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
  border-radius: 0.25rem;
}
</style>

<script>
$(document).ready(function(){

let user_id = "<?php echo $user['User']['id']; ?>";
let count = "<?php echo $count; ?>";
getMsg(user_id, count); 
   
const FORM = {
  message: '',
  to_id: ''
}
setInterval(function() {
    getMsg(user_id, count)
}, 3000);

$('#replyMsg').click(function() {
let url = "<?php echo $this->Html->url(array('controller' => 'messages','action' => 'replyMsg')); ?>";
FORM.message = $('#message_id').val();
FORM.to_id = $('#to_id').val();
if(FORM.message != "") {
  $.ajax({
      'type': "post",
      'url': url,
      evalScripts: true,
      data:(FORM),
      success: function (result, status) { 
          var data = jQuery.parseJSON(result);
          if(data.success) {
              getMsg(user_id, count)         
          }
          $('#message_id').val("")
      }
  });
} else {
    alert('Please type your message.')
}
});
});
function scrollSmoothToBottom (id) {
   var div = document.getElementById(id);
   $('#' + id).animate({
      scrollTop: 0
   }, 500);
}
function getMsg(id, count){
  let url = "<?php echo $this->Html->url(array('controller' => 'messages','action' => 'getUserMsg')); ?>";
  url = url+'/'+id+'/'+count
  $.ajax({
      'type': "get",
      'url': url,
      evalScripts: true,
      success: function (data, status) {                          
              $('#message-card').html(data);
      }
  });
}
function seeMore(count) {
      scrollSmoothToBottom('message-card');
      let user_id = "<?php echo $user['User']['id']; ?>";
      $('#message-card').html('');
      getMsg(user_id, count);
}	

function deleteSingleMsg(id) {
  let url = "<?php echo $this->Html->url(array('controller' => 'messages','action' => 'deleteSingleMsg')); ?>";
  if (!confirm('Are you sure that you want to delete this message?')) {
      e.preventDefault();
  } else {
      $.ajax({
          'type': "post",
          'url': url,
          evalScripts: true,
          data:{"id": id},
          success: function (data, status) { 
              $('#msg_id_'+id).closest('div').fadeOut();          
          }
      });
  }     
}
</script>
