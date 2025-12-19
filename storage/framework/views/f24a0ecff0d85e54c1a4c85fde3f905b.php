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
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 mb-4">
                    <i class="fas fa-user-plus text-blue-600 text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900">Add New Patient</h1>
                <p class="mt-2 text-gray-600">Enter patient information to create a new medical record</p>
            </div>

            <!-- Form Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Form Header -->
                <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <h2 class="text-xl font-semibold text-gray-800">Patient Information</h2>
                </div>

                <!-- Error Messages -->
                <?php if($errors->any()): ?>
                    <div class="px-6 py-4 bg-red-50 border-l-4 border-red-500">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Please correct the following errors:</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="list-disc pl-5 space-y-1">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Form Body -->
                <form action="<?php echo e(route('patients.store')); ?>" method="POST" class="px-6 py-5">
                    <?php echo csrf_field(); ?>

                    <div class="space-y-6">
                        <!-- Row 1: Full Name, Birthdate, Gender -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Full Name -->
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user mr-1 text-blue-500"></i> Full Name
                                </label>
                                <input type="text" 
                                       name="full_name" 
                                       id="full_name" 
                                       value="<?php echo e(old('full_name')); ?>"
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                       placeholder="Enter full name"
                                       required>
                            </div>

                            <!-- Birthdate -->
                            <div>
                                <label for="birthdate" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-calendar-alt mr-1 text-blue-500"></i> Birthdate
                                </label>
                                <input type="date" 
                                       name="birthdate" 
                                       id="birthdate" 
                                       value="<?php echo e(old('birthdate')); ?>"
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                       required>
                            </div>

                            <!-- Gender -->
                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-venus-mars mr-1 text-blue-500"></i> Gender
                                </label>
                                <select name="gender" 
                                        id="gender" 
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                        required>
                                    <option value="" disabled selected>Select gender</option>
                                    <option value="male" <?php echo e(old('gender')=='male' ? 'selected' : ''); ?>>Male</option>
                                    <option value="female" <?php echo e(old('gender')=='female' ? 'selected' : ''); ?>>Female</option>
                                    <option value="other" <?php echo e(old('gender')=='other' ? 'selected' : ''); ?>>Other</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 2: Address, Contact No, Blood Type -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-map-marker-alt mr-1 text-blue-500"></i> Address
                                </label>
                                <input type="text" 
                                       name="address" 
                                       id="address" 
                                       value="<?php echo e(old('address')); ?>"
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                       placeholder="Enter full address">
                            </div>

                            <!-- Contact No -->
                            <div>
                                <label for="contact_no" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-phone mr-1 text-blue-500"></i> Contact No
                                </label>
                                <input type="text" 
                                       name="contact_no" 
                                       id="contact_no" 
                                       value="<?php echo e(old('contact_no')); ?>"
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                       placeholder="0912-345-6789"
                                       maxlength="13"
                                       required>
                            </div>

                            <!-- Blood Type -->
                            <div>
                                <label for="blood_type" class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-tint mr-1 text-blue-500"></i> Blood Type
                                </label>
                                <select name="blood_type" 
                                        id="blood_type"
                                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out">
                                    <option value="" disabled selected>Select blood type</option>
                                    <?php $__currentLoopData = ['A+','A-','B+','B-','AB+','AB-','O+','O-']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($type); ?>" <?php echo e(old('blood_type')==$type ? 'selected' : ''); ?>>
                                            <?php echo e($type); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <!-- Medical Conditions -->
                        <div>
                            <label for="medical_conditions" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-notes-medical mr-1 text-blue-500"></i> Medical Conditions
                            </label>
                            <textarea name="medical_conditions" 
                                      id="medical_conditions" 
                                      rows="4"
                                      class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                                      placeholder="List any existing medical conditions, allergies, or medications"><?php echo e(old('medical_conditions')); ?></textarea>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-between items-center pt-4 border-t border-gray-200">
                            <a href="<?php echo e(route('patients.index')); ?>" 
                               class="inline-flex items-center text-sm font-medium text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">
                                <i class="fas fa-arrow-left mr-2"></i> Back to Patients
                            </a>
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out transform hover:-translate-y-0.5">
                                <i class="fas fa-save mr-2"></i> Save Patient
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript for PH Mobile Number Masking -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactInput = document.getElementById("contact_no");

            if (contactInput) {
                contactInput.addEventListener("input", function(e) {
                    let value = e.target.value.replace(/\D/g, ""); // remove non-digits

                    // limit to 11 digits
                    if (value.length > 11) value = value.slice(0, 11);

                    // insert dash after 4 digits: 0912-3456789
                    if (value.length > 4) {
                        value = value.slice(0,4) + '-' + value.slice(4);
                    }

                    e.target.value = value;
                });

                // Format existing value on load
                const existingValue = contactInput.value.replace(/\D/g, "");
                if (existingValue.length > 4) {
                    contactInput.value = existingValue.slice(0,4) + '-' + existingValue.slice(4);
                }
            }
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\DialySave\resources\views/admin/patients/createpatient.blade.php ENDPATH**/ ?>