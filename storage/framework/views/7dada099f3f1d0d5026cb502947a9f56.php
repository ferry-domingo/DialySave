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
  <div class="px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden md:max-w-2xl">
      <div class="p-6 sm:p-8">
        <div class="text-center mb-8">
          <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">Contact Us</h1>
          <p class="text-gray-600 text-sm sm:text-base">Get in touch with our team</p>
        </div>

        <div class="space-y-4 sm:space-y-6">
          <!-- Email Contact -->
          <div class="flex flex-col items-center space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4 p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors duration-200">
            <div class="flex-shrink-0">
              <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                <i class="fas fa-envelope text-white text-xl"></i>
              </div>
            </div>
            <div class="flex flex-col items-center sm:items-start text-center sm:text-left w-full">
              <h3 class="text-lg font-medium text-gray-900">Email</h3>
              <a href="mailto:firstrenaldialysis.sanildefonso@gmail.com"
                class="text-blue-600 hover:text-blue-800 transition-colors duration-200 break-all text-sm sm:text-base">
                firstrenaldialysis.sanildefonso@gmail.com
              </a>
            </div>
          </div>

          <!-- Phone Contact -->
          <div class="flex flex-col items-center space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4 p-4 bg-green-50 rounded-lg hover:bg-green-100 transition-colors duration-200">
            <div class="flex-shrink-0">
              <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                <i class="fas fa-phone text-white text-xl"></i>
              </div>
            </div>
            <div class="flex flex-col items-center sm:items-start text-center sm:text-left w-full">
              <h3 class="text-lg font-medium text-gray-900">Phone</h3>
              <a href="tel:09542848777"
                class="text-green-600 hover:text-green-800 transition-colors duration-200 font-medium text-sm sm:text-base">
                0954 284 8777
              </a>
            </div>
          </div>

          <!-- Facebook Contact -->
          <div class="flex flex-col items-center space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4 p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors duration-200">
            <div class="flex-shrink-0">
              <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center">
                <i class="fab fa-facebook-f text-white text-xl"></i>
              </div>
            </div>
            <div class="flex flex-col items-center sm:items-start text-center sm:text-left w-full">
              <h3 class="text-lg font-medium text-gray-900">Facebook</h3>
              <a href="https://www.facebook.com/people/San-Ildefonso-Dialysis-Center/61573600283117/" target="_blank"
                rel="noopener noreferrer"
                class="text-purple-600 hover:text-purple-800 transition-colors duration-200 inline-flex items-center justify-center sm:justify-start text-sm sm:text-base">
                San Ildefonso Dialysis Center
                <i class="fas fa-external-link-alt ml-2 text-sm"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Additional Info -->
        <div class="mt-6 sm:mt-8 pt-4 sm:pt-6 border-t border-gray-200">
          <p class="text-center text-gray-600 text-sm sm:text-base">
            We're here to help! Feel free to reach out during our business hours.
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
<?php endif; ?><?php /**PATH C:\laragon\www\DialySave\resources\views/contact.blade.php ENDPATH**/ ?>