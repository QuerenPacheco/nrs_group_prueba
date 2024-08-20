<?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-4">Añadir Cliente</h1>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('clientes.store')); ?>" method="POST" class="col-6 mx-auto">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>

        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" required>
        </div>

        <div class="mb-3">
            <label for="fecha_alta" class="form-label">Fecha de Alta</label>
            <input type="date" class="form-control" id="fecha_alta" name="fecha_alta" required>
        </div>

        <div class="mb-3">
            <label for="precio_venta" class="form-label">Precio de Venta</label>
            <input type="number" class="form-control" id="precio_venta" name="precio_venta" required step="0.01">
        </div>

        <div class="mb-3">
            <label for="proveedor" class="form-label">Proveedor</label>
            <select class="form-control" id="proveedor" name="proveedor_id" required>
                <option value="">Seleccione un proveedor</option>
                <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($proveedor->id); ?>"><?php echo e($proveedor->nombre_empresa); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3 div_calidad">
            <label for="calidad" class="form-label">Calidad</label>
            <p class="no_calidad text-center">No hay ninguna calidad asociada a este proveedor.</p>
            <select class="form-control" id="calidad" name="calidad_id" disabled required>
                <option value="">Seleccione una calidad</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/queren/test3/nrs_group_prueba/resources/views/clientes/crear.blade.php ENDPATH**/ ?>