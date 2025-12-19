<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'DialySave')); ?></title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="print.css">
        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased pt-16">
        <div class="min-h-screen bg-blue-50 grid grid-cols-[auto,1fr]">
         <?php echo $__env->make('includes.navbar-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Page Heading -->
            <?php if(isset($header)): ?>
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <?php echo e($header); ?>

                    </div>
                </header>
            <?php endif; ?>

            <!-- Page Content -->
            <main>
                <?php echo e($slot); ?>

            </main>
        </div>
        <?php if (isset($component)) { $__componentOriginal6381b54cadeaeabc7aca143eb883d365 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6381b54cadeaeabc7aca143eb883d365 = $attributes; } ?>
<?php $component = App\View\Components\DeleteButtonModal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('delete-button-modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DeleteButtonModal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6381b54cadeaeabc7aca143eb883d365)): ?>
<?php $attributes = $__attributesOriginal6381b54cadeaeabc7aca143eb883d365; ?>
<?php unset($__attributesOriginal6381b54cadeaeabc7aca143eb883d365); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6381b54cadeaeabc7aca143eb883d365)): ?>
<?php $component = $__componentOriginal6381b54cadeaeabc7aca143eb883d365; ?>
<?php unset($__componentOriginal6381b54cadeaeabc7aca143eb883d365); ?>
<?php endif; ?>
    </body>
    
</html>
<?php /**PATH C:\laragon\www\DialySave\resources\views/layouts/app.blade.php ENDPATH**/ ?>