<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Mi Aplicación'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="navbar">
        <a href="<?php echo e(route('inicio')); ?>">Inicio</a>
        <a href="<?php echo e(route('clientes.index')); ?>">Clientes</a>
        <a href="<?php echo e(route('proveedores.index')); ?>">Proveedores</a>
    </div>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
</html>
<?php /**PATH /var/www/resources/views/layouts/app.blade.php ENDPATH**/ ?>