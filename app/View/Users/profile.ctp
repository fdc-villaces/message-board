<div class="bg-gray-100">
    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-4/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3">
                    <div class="image overflow-hidden">
                        <?php
                          $image = AuthComponent::user('image') ? '/profile/'.AuthComponent::user('image') : 'https://banner2.cleanpng.com/20180410/bbw/kisspng-avatar-user-medicine-surgery-patient-avatar-5acc9f7a7cb983.0104600115233596105109.jpg';
                            echo $this->Html->image(
                                $image, 
                                array('class' => 'h-auto w-full mx-auto bg-white')
                            );                  
                           ?>
                       
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-4"><?php echo ucwords(AuthComponent::user('name')); ?>

                         <?php                        
                            echo $this->Html->link(      
                                'Edit',
                                array('controller' => 'users', 'action' => 'edit'),
                                array('escape' => false, 'class' =>'tracking-wider text-white bg-blue-500 px-4 py-1 text-sm rounded leading-loose mx-2 font-semibold')                    
                            ); 
                        ?>
                       <!--  <span class="" title="">
                          <i class="fas fa-award" aria-hidden="true"></i> Winner
                        </span> -->
                    </h1>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-normal mt-3"><?php 
                    if(AuthComponent::user('hobby') == null || empty(AuthComponent::user('hobby'))){
                        echo "This user is rather lazy and has yet to leave a hobby";
                    }                
                    else{
                        echo ucwords(AuthComponent::user('hobby')); 
                        }
                        ?></p>
                  
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Last login</span>
                            <span class="ml-auto ">
                                    <?php echo date('F j, Y h:m A', strtotime(AuthComponent::user('last_login_time'))); ?></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Member since</span>
                            <span class="ml-auto"><?php echo date('F j, Y h:m A', strtotime(AuthComponent::user('created_at'))); ?></span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
               
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-8/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Full Name</div>
                                <div class="px-4 py-2"><?php echo ucwords(AuthComponent::user('name'));  ?></div>
                            </div>
                            
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                <div class="px-4 py-2">
                                     <?php
                                        if(AuthComponent::user('gender') == '1'){
                                            echo 'Male';
                                        }
                                        else if(AuthComponent::user('gender') == '2'){
                                            echo 'Female';
                                        }
                                        else{
                                            echo '<span class="text-gray-600">----------------------</span>';
                                        }
                                       ?>    
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact No.</div>
                                <div class="px-4 py-2">
                                    <?php
                                    if(AuthComponent::user('contact_no') == null || empty(AuthComponent::user('contact_no'))){
                                        echo '<span class="text-gray-600">----------------------</span>';
                                    }
                                    else{
                                        echo ucwords(AuthComponent::user('contact_no'));
                                    }
                                       ?>    
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Address</div>
                                <div class="px-4 py-2">
                                     <?php
                                        if(AuthComponent::user('address') == null || empty(AuthComponent::user('address'))){
                                            echo '<span class="text-gray-600">----------------------</span>';
                                        }
                                        else{
                                            echo ucwords(AuthComponent::user('address'));
                                        }
                                       ?>    
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                <div class="px-4 py-2"> 
                                    <a class="text-blue-800" href="mailto:<?php echo ucwords(AuthComponent::user('email')); ?>"><?php echo ucwords(AuthComponent::user('email')); ?></a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birthday</div>
                                <div class="px-4 py-2">
                                    <?php
                                    if(AuthComponent::user('birthdate') == null || empty(AuthComponent::user('birthdate'))){
                                        echo '<span class="text-gray-600">----------------------</span>';
                                    }
                                    else{
                                        echo ucwords(AuthComponent::user('birthdate'));
                                    }
                                       ?>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Experience and education -->
                <div class="bg-white p-3 shadow-sm rounded-sm">

                    <div class="grid grid-cols-2">
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Experience</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                    <div class="text-teal-600">Owner at Her Company Inc.</div>
                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                </li>
                                <li>
                                    <div class="text-teal-600">Owner at Her Company Inc.</div>
                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                </li>
                                <li>
                                    <div class="text-teal-600">Owner at Her Company Inc.</div>
                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                </li>
                                <li>
                                    <div class="text-teal-600">Owner at Her Company Inc.</div>
                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                        <path fill="#fff"
                                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Education</span>
                            </div>
                            <ul class="list-inside space-y-2">
                                <li>
                                    <div class="text-teal-600">Masters Degree in Oxford</div>
                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                </li>
                                <li>
                                    <div class="text-teal-600">Bachelors Degreen in LPU</div>
                                    <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</div>