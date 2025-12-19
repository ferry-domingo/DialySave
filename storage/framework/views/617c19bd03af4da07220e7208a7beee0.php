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
    <?php if (\Illuminate\Support\Facades\Blade::check('role', 'admin')): ?>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add users')): ?>
            <!-- Responsive Header -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800">User Management</h2>
                <a href="<?php echo e(route('users.create')); ?>"
                   class="w-full sm:w-auto bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition text-sm text-center">
                    + Add User
                </a>
            </div>

            <!-- Mobile-First Card Layout -->
            <div class="md:hidden space-y-4">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-lg shadow p-4">
                        <div class="mb-3">
                            <span class="text-xs font-semibold text-gray-500 uppercase">Role</span>
                            <p class="text-sm text-gray-800"><?php echo e($user->getRoleNames()->implode(', ') ?: 'No Role Assigned'); ?></p>
                        </div>
                        
                        <div class="mb-3">
                            <span class="text-xs font-semibold text-gray-500 uppercase">Name</span>
                            <p class="text-sm text-gray-800"><?php echo e($user->name); ?></p>
                        </div>
                        
                        <div class="mb-4">
                            <span class="text-xs font-semibold text-gray-500 uppercase">Email</span>
                            <p class="text-sm text-gray-800"><?php echo e($user->email); ?></p>
                        </div>
                        
                        <div class="flex flex-wrap gap-2">
                            <a href="<?php echo e(route('users.edit', $user->id)); ?>"
                               class="flex-1 bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs text-center">
                                Edit
                            </a>
                            <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this user?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                        class="flex-1 bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Desktop Table Layout -->
            <div class="hidden md:block overflow-x-auto bg-white rounded shadow">
                <table class="min-w-full table-auto border border-gray-300">
                    <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                        <tr>
                            <th class="px-4 py-2 border">Role</th>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs text-gray-800">
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-2 border text-center">
                                    <?php echo e($user->getRoleNames()->implode(', ') ?: 'No Role Assigned'); ?>

                                </td>
                                <td class="px-4 py-2 border"><?php echo e($user->name); ?></td>
                                <td class="px-4 py-2 border"><?php echo e($user->email); ?></td>
                                <td class="px-4 py-2 border text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="<?php echo e(route('users.edit', $user->id)); ?>"
                                           class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-xs">
                                            Edit
                                        </a>
                                        <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this user?');">
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\DialySave\resources\views/admin/accounts/indexuser.blade.php ENDPATH**/ ?>