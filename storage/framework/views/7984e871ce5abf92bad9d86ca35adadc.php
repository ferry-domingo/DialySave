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

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>


<body class="font-sans text-gray-900 antialiased ">
    <?php echo $__env->make('includes.navbar-guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="bg-[url('../../public/images/bg1.png')] bg-cover bg-bottom bg-no-repeat h-screen">

        <div class="flex justify-center ">
            <img src="./images/name.png" alt="" class="h-14 hover:scale-105 transition-all duration-300">
        </div>


        <div >
            <?php echo e($slot); ?>

        </div>

    </div>
</body>

</html><?php /**PATH C:\laragon\www\DialySave\resources\views/layouts/guest.blade.php ENDPATH**/ ?>