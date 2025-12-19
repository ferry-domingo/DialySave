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
    <div class="max-w-3xl mx-auto mt-10 px-4">
        <!-- Header Section -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold mb-2">Edit Lab Result</h2>
                <p class="text-gray-300">Update the form below to modify lab results</p>
            </div>
            <div class="bg-white/20 rounded-lg p-3 backdrop-blur-sm">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
        </div>
        
        <!-- Form Card -->
        <form action="<?php echo e(route('labs.update', $lab->id)); ?>" method="POST" class="bg-white rounded-xl shadow-lg overflow-hidden">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <input type="hidden" name="session_id" value="<?php echo e($lab->session_id); ?>">

            <div class="p-6 space-y-6">
                <!-- Hemoglobin -->
                <div class="form-group">
                    <label for="hemoglobin" class="block text-sm font-medium text-gray-700 mb-2">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Hemoglobin (g/dL)
                        </span>
                        <span class="text-gray-500 text-xs ml-2">Normal: 13.5-17.5 g/dL</span>
                    </label>
                    <input type="number" step="0.1" name="hemoglobin" id="hemoglobin"
                           value="<?php echo e($lab->hemoglobin); ?>"
                           placeholder="Enter hemoglobin value"
                           class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                </div>

                <!-- Creatinine -->
                <div class="form-group">
                    <label for="creatinine" class="block text-sm font-medium text-gray-700 mb-2">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                            Creatinine (mg/dL)
                        </span>
                        <span class="text-gray-500 text-xs ml-2">Normal: 0.6-1.2 mg/dL</span>
                    </label>
                    <input type="number" step="0.01" name="creatinine" id="creatinine"
                           value="<?php echo e($lab->creatinine); ?>"
                           placeholder="Enter creatinine value"
                           class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                </div>

                <!-- Potassium -->
                <div class="form-group">
                    <label for="potassium" class="block text-sm font-medium text-gray-700 mb-2">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Potassium (mmol/L)
                        </span>
                        <span class="text-gray-500 text-xs ml-2">Normal: 3.5-5.0 mmol/L</span>
                    </label>
                    <input type="number" step="0.01" name="potassium" id="potassium"
                           value="<?php echo e($lab->potassium); ?>"
                           placeholder="Enter potassium value"
                           class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200">
                </div>

                <!-- Remarks -->
                <div class="form-group">
                    <label for="remarks" class="block text-sm font-medium text-gray-700 mb-2">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Clinical Remarks
                        </span>
                    </label>
                    <textarea name="remarks" id="remarks" rows="4"
                              placeholder="Add clinical observations, recommendations, or follow-up notes..."
                              class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 resize-none"><?php echo e($lab->remarks); ?></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                    <a href="<?php echo e(route('sessions.vitals', ['session' => $lab->session_id])); ?>"
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Lab Results
                    </a>
                    
                    <button type="submit"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Lab Result
                    </button>
                </div>
            </div>
        </form>

        <!-- Additional Info -->
        <div class="mt-6 text-center text-sm text-gray-500">
            <p>Lab ID: <?php echo e($lab->id); ?> | Last updated: <?php echo e($lab->updated_at->timezone('Asia/Manila')->format('M d, Y - h:i A')); ?></p>
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
<?php endif; ?> <?php /**PATH C:\laragon\www\DialySave\resources\views/admin/labresult/editlabresult.blade.php ENDPATH**/ ?>