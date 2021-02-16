
<div class="flex items-center min-h-screen bg-white dark:bg-gray-900">
    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-10">
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Sign up</h1>
                <p class="text-gray-500 dark:text-gray-400">Sign up to have an account</p>
            </div>
            <div class="m-7">
              <?php echo $this->Flash->render('danger');  ?>
              <?php echo $this->Form->create('User', array(
                    'inputDefaults' => array(
                        'label' => false, 
                    )
                )); ?>
                    <div class="mb-6 mt-4">
                        <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Name</label>
                        <?php echo $this->Form->input('name', array('class' => 'w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500', 'placeholder' => 'Name')); ?>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Email Address</label>
                       <?php echo $this->Form->input('email', array('class' => 'w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500', 'placeholder' => 'Email Address')); ?>
                    </div>
                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <label for="password" class="text-sm text-gray-600 dark:text-gray-400">Password</label>
                           
                        </div>
                        <?php echo $this->Form->input('password', array('class' => 'w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500', 'placeholder' => 'Password')); ?>
                    </div>
                    <div class="mb-6">
                        <div class="flex justify-between mb-2">
                            <label for="password" class="text-sm text-gray-600 dark:text-gray-400">Password confirmation</label>
                            
                        </div>
                        <?php echo $this->Form->input('confirm_password', array('type'=> 'password','class' => 'w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500', 'placeholder' => 'Password confirmation')); ?>
                    </div>
                    <div class="mb-6">
                         <?php $options = array(
                      'label' => 'Sign In',
                      'class' => 'w-full px-3 py-4 text-white bg-indigo-500 rounded-md focus:bg-indigo-600 focus:outline-none',
                  ); ?>
                  <?php echo $this->Form->end($options); ?>
                    </div>                    
                    <p class="text-sm text-center text-gray-400">Don&#x27;t have an account yet?  <?php                        
                        echo $this->Html->link(      
                            "Login",
                            array('controller' => 'users', 'action' => 'login'),
                            array('escape' => false, 'class' => 'text-indigo-400 focus:outline-none focus:underline focus:text-indigo-500 dark:focus:border-indigo-800')                    
                        ); 
                       ?>.
                   </p>
            </div>
        </div>
    </div>
</div>