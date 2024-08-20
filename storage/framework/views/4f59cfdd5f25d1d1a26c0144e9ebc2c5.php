<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-4">Añadir Proveedor</h1>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('proveedores.store')); ?>" method="POST" class="col-6 mx-auto">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="nombre_empresa" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" required>
        </div>

        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" class="form-control" id="pais" name="pais" required>
        </div>

        <div class="mb-3">
            <label for="cif" class="form-label">CIF</label>
            <input type="text" class="form-control" id="cif" name="cif" required>
        </div>

        <div class="mb-3">
            <label for="fecha_alta" class="form-label">Fecha de Alta</label>
            <input type="date" class="form-control" id="fecha_alta" name="fecha_alta" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/queren/test3/nrs_group_prueba/resources/views/proveedores/crear.blade.php ENDPATH**/ ?>