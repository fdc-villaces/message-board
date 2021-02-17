<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		 echo $this->Html->css('custom.css');
		// echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->css('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
		echo $this->Html->css('https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css');
		
		echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js');
		echo $this->Html->script('https://code.jquery.com/ui/1.12.1/jquery-ui.js');
	?>
</head>
<body>
	
	<nav class="bg-gray-800">
	  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
	    <div class="relative flex items-center justify-between h-16">
	      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
	        <!-- Mobile menu button-->
	        <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
	          <span class="sr-only">Open main menu</span>
	          <!-- Icon when menu is closed. -->
	          <!--
	            Heroicon name: outline/menu

	            Menu open: "hidden", Menu closed: "block"
	          -->
	          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
	            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
	          </svg>
	          <!-- Icon when menu is open. -->
	          <!--
	            Heroicon name: outline/x

	            Menu open: "block", Menu closed: "hidden"
	          -->
	          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
	            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
	          </svg>
	        </button>
	      </div>
	      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
	        <div class="flex-shrink-0 flex items-center">
	          <svg
              class="w-6 h-6 text-white"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
              ></path>
            </svg>
            <div class="ml-2 font-bold text-2xl text-white">QuickChat</div>
	        </div>
	        <div class="hidden sm:block sm:ml-6">
	          <div class="flex space-x-4">
	            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
	            <a href="#" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
	            <?php                        
                    echo $this->Html->link(      
                        "Messages",
                        array('controller' => 'messages', 'action' => 'all_message'),
                        array('escape' => false, 'class' => 'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium')                    
                    ); 
                ?>
                <?php                        
                    echo $this->Html->link(      
                        "Profile",
                        array('controller' => 'users', 'action' => 'profile'),
                        array('escape' => false, 'class' => 'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium')                    
                    ); 
                ?>
	           
	          </div>
	        </div>
	      </div>
	      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
	       <?php if ($this->Session->read('Auth.User')): ?>
	       	<div class="ml-3 relative">
	          <div>
	          	<?php                        
                    echo $this->Html->link(      
                        "Logout",
                        array('controller' => 'users', 'action' => 'logout'),
                        array('escape' => false, 'class' => 'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium')                    
                    ); 
                   ?>
	          </div>
	        </div>
	        <?php else: ?>
	        <div class="ml-3 relative">
	          <div>
	          	<?php                        
                    echo $this->Html->link(      
                        "Register",
                        array('controller' => 'users', 'action' => 'register'),
                        array('escape' => false, 'class' => 'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium')                    
                    ); 
                   ?>

                   <?php                        
                    echo $this->Html->link(      
                        "Login",
                        array('controller' => 'users', 'action' => 'login'),
                        array('escape' => false, 'class' => 'text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium')                    
                    ); 
                   ?>
	         
	           	<!-- <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a> -->
	          </div>
	        </div>
	        <?php endif; ?>
	      </div>
	    </div>
	  </div>
	  </nav>
	  <main class="w-full">
	  	<?php echo $this->fetch('content'); ?>
	  </main>

</body>
</html>
