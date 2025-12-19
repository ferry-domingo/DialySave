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
    <div class="max-w-4xl mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
            Lab Result for Patient: <?php echo e($session->patient->full_name); ?>

        </h2>
          <?php if(session('success')): ?>
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">
                    <?php echo e(session('success')); ?>

                </p>
            </div>
            <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button" onclick="this.closest('.mb-6').remove()" class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600">
                        <span class="sr-only">Dismiss</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if($lab_results->count()): ?>
        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full table-auto border border-gray-300">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="px-4 py-2 border">Hemoglobin</th>
                        <th class="px-4 py-2 border">Creatinine</th>
                        <th class="px-4 py-2 border">Potassium</th>
                        <th class="px-4 py-2 border">Remarks</th>
                        <th class="px-4 py-2 border">Recorded At</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-xs text-gray-800">
                    <?php $__currentLoopData = $lab_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2 border text-center"><?php echo e($result->hemoglobin ?? '—'); ?></td>
                            <td class="px-4 py-2 border text-center"><?php echo e($result->creatinine ?? '—'); ?></td>
                            <td class="px-4 py-2 border text-center"><?php echo e($result->potassium ?? '—'); ?></td>
                            <td class="px-4 py-2 border"><?php echo e($result->remarks ?? '—'); ?></td>
                            <td class="px-4 py-2 border text-center">
                                <?php echo e($result->created_at ? $result->created_at->timezone('Asia/Manila')->format('M d, Y h:i A') : '—'); ?>

                            </td>
                            <td class="px-4 py-2 border text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="<?php echo e(route('vitals.edit', $result->id)); ?>"
                                        class=" text-blue-600 rounded text-xs">
                                        <i class="fas fa-edit text-sm sm:text-base"></i>
                                    </a>
                                    <form action="<?php echo e(route('patients.destroy', $result->id)); ?>" method="POST"
                                                class="inline">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="button"
                                                    onclick="openDeleteModal(this.closest('form'))"
                                                    class="text-red-600 hover:text-red-900 transition-colors duration-200"
                                                    title="Delete Patient">
                                                    <i class="fas fa-trash text-sm sm:text-base"></i>
                                                </button>
                                            </form>
                                </div>
                            </td>
                        </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </tbody>
                        </table>
                     <?php else: ?>
                    <div class="bg-yellow-100 text-yellow-800 p-4 rounded mt-4">
                        No vital signs recorded for this session.
                    </div>
        <?php endif; ?>
        <a href="<?php echo e(route('sessions.index')); ?>" class="text-gray-600 hover:underline text-sm">← Back to Session</a>
                
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
<?php endif; ?>
<?php /**PATH C:\laragon\www\DialySave\resources\views/admin/labresult/sessionlabresult.blade.php ENDPATH**/ ?>