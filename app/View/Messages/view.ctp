<div class="w-11/12 md:w-10/12 mx-auto">
	<div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen">
   <div class="flex sm:items-center justify-between py-3 border-b-2 border-gray-200">
      <div class="flex items-center space-x-4">
        <?php
          $image = $user['User']['image'] ? '/profile/'.$user['User']['image'] : 'https://banner2.cleanpng.com/20180410/bbw/kisspng-avatar-user-medicine-surgery-patient-avatar-5acc9f7a7cb983.0104600115233596105109.jpg';
            echo $this->Html->image(
                $image, 
                array('class' => 'w-10 sm:w-16 h-10 sm:h-16 rounded-full')
            );                  
        ?>

         <div class="flex flex-col leading-tight">
            <div class="text-lg md:text-2xl mt-1 flex items-center">
               <span class="text-gray-700 mr-3"><?php echo ucwords($user['User']['name']); ?></span>
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
         <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
         </button>
         <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
         </button>
         <button type="button" class="inline-flex items-center justify-center rounded-full h-10 w-10 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
         </button>
      </div>
   </div>
  <div id="message-card" class="flex flex-col space-y-4 p-3 overflow-y-auto scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch relative z-10">
    <!-- message card render here -->
   
  </div>
  <div class="flex justify-center items-center relative">

    <?php if ($this->Paginator->hasNext()) : ?>
      <button onclick="seeMore(<?php echo $count + $perPage; ?>)" class="bg-blue-500 px-6 py-2 focus:outline-none tracking-wide inline-block text-sm text-white rounded-full absolute mx-auto justify-center">See more
        <svg class="h-4 w-4 inline-block ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
      </svg>
      </button>
     <?php endif; ?>
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
   

     const Form = {
        message: '',
        to_id: ''
    }

    //  setInterval(function() {
    //     getMsg(user_id, count)
    // }, 3000);


    $('#replyMsg').click(function() {
        let url = "<?php echo $this->Html->url(array('controller' => 'messages','action' => 'replyMsg')); ?>";
        Form.message = $('#message_id').val();
        Form.to_id = $('#to_id').val();
        if(Form.message != "") {
            $.ajax({
                'type': "post",
                'url': url,
                evalScripts: true,
                data:(Form),
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
        scrollTop: div.scrollHeight - div.clientHeight
     }, 500);
  }
    function getMsg(id, count){
      let url = "<?php echo $this->Html->url(array('controller' => 'messages','action' => 'get_user_msg')); ?>";
      url = url+'/'+id+'/'+count
      $.ajax({
          'type': "get",
          'url': url,
          evalScripts: true,
          success: function (data, status) {  
              // $('.loading').fadeOut('fast', function() {                
                  $('#message-card').html(data);
              // })
          }
      });
    }

 function seeMore(count) {
        scrollSmoothToBottom('message-card');
        let user_id = "<?php echo $user['User']['id']; ?>";
        $('#message-card').html('');
        // $('.loading').fadeIn();
        getMsg(user_id, count);
    }	


</script>

</div>