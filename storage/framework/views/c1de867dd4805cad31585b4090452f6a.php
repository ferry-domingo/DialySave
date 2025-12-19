<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  <div class=" py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
      <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Our Team</h1>
        <p class="text-gray-600">Meet the dedicated professionals at San Ildefonso Dialysis Center</p>
      </div>
      
      <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-4 sm:p-6">
          <img 
            src="./images/team.png" 
            alt="Our Team"
            class="w-full h-80 rounded-lg shadow-md"
            style="max-height: 600px; object-fit: contain;"
          >
        </div>
        
        <div class="bg-gray-50 px-6 py-3 sm:px-8 sm:py-4">
          <p class="text-center text-gray-700 text-sm sm:text-base">
            Our experienced team is committed to providing the best care for our patients.
          </p>
        </div>
      </div>
    </div>
  </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\DialySave\resources\views/team.blade.php ENDPATH**/ ?>