<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-4">Añadir Calidad</h1>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('calidades.store')); ?>" method="POST" class="col-6 mx-auto">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="precio_compra" class="form-label">Precio de Compra</label>
            <input type="number" class="form-control" id="precio_compra" name="precio_compra" required step="0.01">
        </div>

        <div class="mb-3">
            <label for="proveedor" class="form-label">Proveedor</label>
            <input type="text" class="form-control" id="proveedor" name="proveedor" value="<?php echo e($proveedorPreseleccionado->nombre_empresa); ?>" required disabled>
            <input type="text" class="form-control" id="proveedor_id" name="proveedor_id" value="<?php echo e($proveedorPreseleccionado->id); ?>" required hidden>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/queren/test3/nrs_group_prueba/resources/views/calidades/crear.blade.php ENDPATH**/ ?>