<div class="flex flex-col h-full">
  <div class="grid grid-cols-12 gap-y-2">

    <?php
     print_r($messages);
     foreach($messages as $message) : ?>
    <?php 
   
        if(AuthComponent::user('id')) :
      ?>
      <div class="col-start-6 col-end-13 p-3 rounded-lg">
      <div class="flex items-center justify-start flex-row-reverse">
        <div
          class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
        >
          A
        </div>
        <div
          class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl"
        >
          <div>I'm ok what about you?</div>
        </div>
      </div>
    </div>
    <?php else: ?>
    <div class="col-start-1 col-end-8 p-3 rounded-lg">
      <div class="flex flex-row items-center">
        <div
          class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
        >
          A
        </div>
        <div
          class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
        >
          <div>
            Lorem ipsum dolor sit amet, consectetur adipisicing
            elit. Vel ipsa commodi illum saepe numquam maxime
            asperiores voluptate sit, minima perspiciatis.
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
   <?php endforeach; ?>
  </div>
</div>

