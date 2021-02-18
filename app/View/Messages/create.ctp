<div class="w-8/12 mx-auto flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-96 p-8 relative mt-8">
  <div class=" flex flex-col h-full mb-4 relative">
     <?php echo $this->Flash->render(); ?>
     <?php echo $this->Form->create('Message'); ?>
     <p class="text-md text-gray-800 font-semibold">Send to </p>
     <?php 
        echo $this->Form->input(
            'Relation.receiver_id',
            array('label' => false, 'class' => 'users w-6/12 px-3 py-2 mt-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500')
        );
    ?>
    </div>
    <div
      class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4 bottom-0">
      <div>
        <button
          class="flex items-center justify-center text-gray-400 hover:text-gray-600"
        >
          <svg
            class="w-5 h-5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
            ></path>
          </svg>
        </button>
      </div>
      <div class="flex-grow ml-4">

        <div class="relative w-full">
          <?php 
              echo $this->Form->input(
                  'msg_content',
                  array(
                      'class' => 'flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10', 
                      'label' => false, 
                      'placeholder' => 'Say something...'
                  )
              ); 
          ?>

          <!-- <input
            type="text"
            class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"
          /> -->
          <button
            class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600"
          >
            <svg
              class="w-6 h-6"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
              ></path>
            </svg>
          </button>
        </div>
      </div>
      <div class="ml-4">
        <?php $options = array(
                              'label' => 'Send',
                              'class' => 'flex items-center justify-center bg-indigo-500 hover:bg-indigo-600 rounded-xl text-white px-5 py-2 flex-shrink-0',
                          ); ?>
        <?php echo $this->Form->end($options); ?>
      </div>
    </div>        
</div>
<script>
  $(document).ready(function() {
    let url = "<?php echo $this->Html->url(array('controller' => 'users','action' => 'searchUser')); ?>";
    $('.users').select2({
        placeholder: 'Enter user\'s name here',
        ajax: {
            url: url,
            dataType: 'json',
            delay: 200,
            data: function (data) {
                return {
                    userName: data.term // search term
                };
            },
            processResults: function (response) {
                return {
                    results:response
                };
            },
            cache: true
        }
    });
 
});
</script>