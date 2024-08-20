<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Calidad</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('calidades.update', $calidad->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e(old('nombre', $calidad->nombre)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="precio_compra" class="form-label">Precio Compra</label>
                <input type="text" class="form-control" id="precio_compra" name="precio_compra" value="<?php echo e(old('precio_compra', $calidad->precio_compra)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="proveedor_id" class="form-label">Proveedor</label>
                <input type="text" class="form-control" id="proveedor" name="proveedor" value="<?php echo e($proveedorPreseleccionado->nombre_empresa); ?>" required disabled>
                <input type="text" class="form-control" id="proveedor_id" name="proveedor_id" value="<?php echo e($proveedorPreseleccionado->id); ?>" required hidden>
            </div>

           
            <button type="submit" class="btn btn-primary">Actualizar Calidad</button>
            <a href="<?php echo e(route('proveedores.show', $calidad->proveedor_id)); ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/queren/test3/nrs_group_prueba/resources/views/calidades/edit.blade.php ENDPATH**/ ?>