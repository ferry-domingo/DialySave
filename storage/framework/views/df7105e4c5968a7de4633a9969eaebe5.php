<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  
  <div class="max-w-3xl mx-auto mt-6 sm:mt-10 px-4 py-6 sm:py-12 text-center">
    <div class="bg-white rounded-lg sm:rounded-xl shadow-lg p-6 sm:p-8">
      <div
        class="inline-flex items-center justify-center w-12 sm:w-16 h-12 sm:h-16 rounded-full bg-green-100 mb-3 sm:mb-4">
        <i class="fas fa-user-injured text-green-600 text-xl sm:text-2xl"></i>
      </div>
      <h1 class="text-xl sm:text-2xl font-bold text-gray-900 mb-2">Welcome to Your Patient Portal</h1>
      <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6">Access your dialysis sessions
        and appointments information</p>
      <div class="flex flex-col sm:flex-row sm:justify-center space-y-2 sm:space-y-0 sm:space-x-4">
        <a href="<?php echo e(route('patient-session.index')); ?>"
          class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 text-sm sm:text-base">
          <i class="fas fa-calendar-alt mr-2"></i>View Sessions
        </a>
        <a href="<?php echo e(route('patient-appointment.index')); ?>"
          class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 text-sm sm:text-base">
          <i class="fas fa-calendar-alt mr-2"></i>View Appointments
        </a>
      </div>
    </div>
  </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\DialySave\resources\views/patient/dashboard.blade.php ENDPATH**/ ?>