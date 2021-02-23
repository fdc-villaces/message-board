<div class="w-10/12 mx-auto bg-transparent mt-40">
	<div>
		<p class="text-6xl text-gray-800 tracking-wide font-bold mb-8">Thank you for registering to us!</p>
		<?php                        
            echo $this->Html->link(      
                "Go to inbox",
                array('controller' => 'messages', 'action' => 'all_message'),
                array('escape' => false, 'class' => 'py-3 px-8 bg-blue-400 mt-8 text-white focus:outline-none focus:underline focus:text-indigo-500 dark:focus:border-indigo-800 text-base rounded-lg')                    
            ); 
        ?>
	</div>
</div>