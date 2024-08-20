<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Proveedor</h1>

        <!-- Mensaje de éxito si existe -->
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
        <form action="<?php echo e(route('proveedores.update', $proveedor->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="nombre_empresa" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" value="<?php echo e(old('nombre_empresa', $proveedor->nombre_empresa)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                <input type="text" class="form-control" id="pais" name="pais" value="<?php echo e(old('pais', $proveedor->pais)); ?>" required>
            </div>

            <div class="mb-3">
                <label for="cif" class="form-label">CIF</label>
                <input type="text" class="form-control" id="cif" name="cif" value="<?php echo e(old('cif', $proveedor->cif)); ?>" required></td> 
            </div>

            <div class="mb-3">
                <label for="fecha_alta" class="form-label">Fecha de Alta</label>
                <input type="date" class="form-control" id="fecha_alta" name="fecha_alta" value="<?php echo e(old('fecha_alta', $proveedor->fecha_alta->format('Y-m-d'))); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
            <a href="<?php echo e(route('proveedores.index')); ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/queren/test3/nrs_group_prueba/resources/views/proveedores/edit.blade.php ENDPATH**/ ?>