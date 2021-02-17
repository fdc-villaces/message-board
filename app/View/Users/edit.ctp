<div class="w-8/12 mx-auto py-12">

<div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>

<div class="mt-10 sm:mt-0">
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
        <p class="mt-1 text-sm text-gray-600">
          Use a permanent address where you can receive mail.
        </p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
     <?php echo $this->Form->create('User', array('type' => 'file')); ?> 
        <div class=" overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <?php 
                  echo $this->Form->input(
                          'name', 
                          array('id' => 'name', 'value' => AuthComponent::user('name'), 'class' => 'border border-solid border-gray-100  rounded-md py-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 text-gray-800 block px-2 w-full shadow-sm sm:text-sm py-2 border-gray-300 rounded-md', 'label' => false)
                      );
                 ?>
               
              </div>
             
                          
              <div class="col-span-6 sm:col-span-3">
                <label for="birthday" class="block text-sm font-medium text-gray-700">Birthday</label>
                <?php
                 $birthdate = AuthComponent::user('birthdate') ? date('m/d/Y', strtotime(AuthComponent::user('birthdate'))) : '';
                    echo $this->Form->input(
                        'birthdate',
                        array('id' => 'datepicker', 'type' => 'text', 'placeholder' => 'birthdate', 'value' => $birthdate, 'class' => 'border border-solid border-gray-100  rounded-md py-2 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block px-2 w-full shadow-sm sm:text-sm py-2 border-gray-300 rounded-md', 'label' => false)
                    );
                 ?>
              </div>
              <div class="col-span-6 sm:col-span-3 inline-block">
                <label for="gender" class="block text-sm font-medium text-gray-700 mb-3">Gender</label>
                <?php 
                  echo $this->Form->input('gender',
                   array(
                        'legend' => false,
                        'options' => array('1' => 'Male', '2' => 'Female'),
                        'type' => 'radio',
                        'value' => AuthComponent::user('gender'),
                        'class' => 'inline-block mx-2'
                    )
                   ); 
                ?>
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <?php
                  echo $this->Form->input(
                        'address', 
                        array('id' => 'address', 'value' => AuthComponent::user('address'), 'class' => 'border border-solid border-gray-100  rounded-md py-2 mt-1 focus:ring-indigo-500 px-2 focus:border-indigo-500 block text-gray-800 w-full shadow-sm sm:text-sm border-gray-300 rounded-md', 'label' => false)
                    );
                 ?>
              </div>  
              <div class="col-span-6 sm:col-span-3">
                <label for="contact_no" class="block text-sm font-medium text-gray-700">Contact no.</label>
                <?php
                  echo $this->Form->input(
                        'contact_no', 
                        array('id' => 'contact_no', 'value' => AuthComponent::user('contact_no'), 'class' => 'border border-solid border-gray-100  rounded-md py-2 mt-1 focus:ring-indigo-500 px-2 focus:border-indigo-500 block text-gray-800 w-full shadow-sm sm:text-sm border-gray-300 rounded-md', 'label' => false)
                    );
                 ?>
              </div>         
            </div>
            <div class="bg-white">
            <div class="mt-4">
              <label for="about" class="block text-sm font-medium text-gray-700">
                Hobby
              </label>
              <div class="mt-1">
                <?php
                  $hubby = AuthComponent::user('hobby') ? AuthComponent::user('hobby') : '';
                    echo $this->Form->input(
                        'hobby', 
                        array('id' => 'hobby', 'placeholder' => 'Something intersting..', 'value' => $hubby, 'rows' => 4, 'id' => 'hubby', 'class' => 'border border-solid border-gray-100 rounded-md py-2 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 px-2 block w-full sm:text-sm border-gray-300 rounded-md', 'label' => false)
                    );      
                 ?>
              </div>
              <p class="mt-2 text-sm text-gray-500">
                Brief description for your profile.
              </p>
            </div>

            <div class="mt-5">
              <label class="block text-sm font-medium text-gray-700">
                Photo
              </label>
              <div class="mt-2 flex items-center">
                <div class="h-24 w-24 rounded-lg bg-indigo-600">
                  <?php
                  $image = AuthComponent::user('image') ? '/profile/'.AuthComponent::user('image') : 'https://banner2.cleanpng.com/20180410/bbw/kisspng-avatar-user-medicine-surgery-patient-avatar-5acc9f7a7cb983.0104600115233596105109.jpg';
                    echo $this->Html->image(
                        $image, 
                        array('class' => 'image-profile object-cover w-full h-full rounded-md', 'id' => 'image-profile')
                    );                  
                   ?>
                </div>
              
              <?php 
                echo $this->Form->input(
                        'image', 
                        array('type' => 'file', 'id' => 'image', 'label' => false, 'class' => 'ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500')
                    ); 
               ?>
              </div>
            </div>
       
          </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
             <?php $options = array(
                              'label' => 'Save',
                              'class' => 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500',
                          ); ?>
              <?php echo $this->Form->end($options); ?>
            
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="hidden sm:block" aria-hidden="true">
  <div class="py-5">
    <div class="border-t border-gray-200"></div>
  </div>
</div>
</div>
<script>
  $(document).ready(function() {
    $("#image").change(function() {
        readURL(this);
    });
});
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image-profile')
                    .attr('src', e.target.result)
                   
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

$(function() {
    $("#datepicker").datepicker();
});
</script>