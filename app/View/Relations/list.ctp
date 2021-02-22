<?php foreach($messages as $message) : ?>
	<?php if ( $message['Relation']['sender_id'] == AuthComponent::user('id')) : ?>
	<div id="msg<?php echo $message['Relation']['receiver_id']; ?>" class="message-card relative border-t border-gray-200 border-solid mt-4">
		<div class="top-card mt-2">
			<div class="w-full">
				<div class="flex flex-wrap items-center py-2">
					<div class="flex-1 flex-wrap items-center">
						<div class="flex items-center">
							<div class="h-12 w-12 overflow-hidden relative rounded-full inline-block">
						 	<?php
		                      $image = $message['Recepient']['recepient_image'] ? '/profile/'.$message['Recepient']['recepient_image'] : 'https://banner2.cleanpng.com/20180410/bbw/kisspng-avatar-user-medicine-surgery-patient-avatar-5acc9f7a7cb983.0104600115233596105109.jpg';
		                        echo $this->Html->image(
		                            $image, 
		                            array('class' => 'h-auto w-full object-cover')
		                        );                  
		                    ?>
	                   </div>
	                   <div class="inline-block ml-4">
	                   	
	                   	 <?php 
                            echo $this->Html->link(
                               $message['Recepient']['recepient_name'],
                                array('controller' => 'messages', 'action' => 'view', $message['Recepient']['recepient_id']),
                                array('class' => 'text-lg text-gray-700 font-semibold cursor-pointer')
                            );
                        ?>
	                   </div>
						</div>	
					</div>
					<div class="flex-1 flex items-center inline-block justify-end">
						<p class="text-sm text-gray-400 mr-4 font-medium tracking-wide"><?php echo date('Y/m/d H:i A', strtotime($message['Message']['created']));?></p>
						<a onclick="deleteMessage(<?php echo $message['Relation']['receiver_id']; ?>)" class="cursor-pointer"><svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
						</svg></a>
					</div>
				</div>
			</div>
		</div>
		<div class="message-card w-full">
			<p class="leading-2 tracking-wide text-md font-normal  text-gray-400">
				<?php echo ucwords($message['Message']['msg_content']); ?>
			</p>
		</div>
	</div>
<?php else: ?>
	<div id="msg<?php echo $message['Relation']['sender_id']; ?>" class="message-card relative border-t border-gray-200 border-solid mt-4">
		<div class="top-card mt-2">
			<div class="w-full">
				<div class="flex flex-wrap items-center py-2">
					<div class="flex-1 flex-wrap items-center">
						<div class="flex items-center">
							<div class="h-12 w-12 overflow-hidden relative rounded-full inline-block">
						 	<?php
		                      $image = $message['User']['user_image'] ? '/profile/'.$message['User']['user_image'] : 'https://banner2.cleanpng.com/20180410/bbw/kisspng-avatar-user-medicine-surgery-patient-avatar-5acc9f7a7cb983.0104600115233596105109.jpg';
		                        echo $this->Html->image(
		                            $image, 
		                            array('class' => 'h-auto w-full object-cover')
		                        );                  
		                    ?>
	                   </div>
	                   <div class="inline-block ml-4">
	                   	<!--  <?php 
                            echo "here";
                        ?> -->
	                   	 <?php 
                            echo $this->Html->link(
                               $message['User']['user_name'],
                                array('controller' => 'messages', 'action' => 'view', $message['User']['user_id']),
                                array('class' => 'text-lg text-gray-700 font-semibold cursor-pointer')
                            );
                        ?>
	                   </div>
						</div>	
					</div>
					<div class="flex-1 flex items-center inline-block justify-end">
						<p class="text-sm text-gray-400 mr-4 font-medium tracking-wide"><?php echo date('Y/m/d H:i A', strtotime($message['Message']['created']));?></p>
						
						<a onclick="deleteMessage(<?php echo $message['Relation']['sender_id']; ?>)" class="cursor-pointer"><svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
						</svg></a>
					</div>
				</div>
			</div>
		</div>
		<div class="message-card w-full">
			<p class="leading-2 tracking-wide text-md font-normal  text-gray-400">
				<?php echo ucwords($message['Message']['msg_content']); ?>
			</p>
		</div>
<?php endif; ?>
<?php endforeach; ?>