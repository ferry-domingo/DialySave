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
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Lab Results</h2>

        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full table-auto border border-gray-300">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="px-4 py-2 border">Session ID</th>
                        <th class="px-4 py-2 border">Hemoglobin</th>
                        <th class="px-4 py-2 border">Creatinine</th>
                        <th class="px-4 py-2 border">Potassium</th>
                        <th class="px-4 py-2 border">Remarks</th>
                        <th class="px-4 py-2 border">Recorded At</th>
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-800">
                    <?php $__empty_1 = true; $__currentLoopData = $lab_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2 border text-center"><?php echo e($result->session_id); ?></td>
                            <td class="px-4 py-2 border text-center"><?php echo e($result->hemoglobin ?? '—'); ?></td>
                            <td class="px-4 py-2 border text-center"><?php echo e($result->creatinine ?? '—'); ?></td>
                            <td class="px-4 py-2 border text-center"><?php echo e($result->potassium ?? '—'); ?></td>
                            <td class="px-4 py-2 border"><?php echo e($result->remarks ?? '—'); ?></td>
                            <td class="px-4 py-2 border text-center">
                                <?php echo e($result->created_at ? $result->created_at->format('M d, Y h:i A') : '—'); ?>

                            </td>
                            <td class="px-4 py-2 border text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="<?php echo e(route('labs.edit', $result->id)); ?>"
                                       class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">
                                        Edit
                                    </a>
                                    <form action="<?php echo e(route('labs.destroy', $result->id)); ?>" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this lab result?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit"
                                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-center text-gray-500">
                                No lab results found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <?php echo e($lab_results->links()); ?>

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
<?php endif; ?>
<?php /**PATH C:\laragon\www\DialySave\resources\views/admin/labresult/indexlabresult.blade.php ENDPATH**/ ?>