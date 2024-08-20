<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1 class="mb-4">Editar Cliente</h1>

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

    <form action="<?php echo e(route('clientes.update', $cliente->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e(old('nombre', $cliente->nombre)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo e(old('apellidos', $cliente->apellidos)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" value="<?php echo e(old('dni', $cliente->dni)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="fecha_alta" class="form-label">Fecha de Alta</label>
            <input type="date" class="form-control" id="fecha_alta" name="fecha_alta" value="<?php echo e(old('fecha_alta', $cliente->fecha_alta->format('Y-m-d'))); ?>" required>
        </div>

        <div class="mb-3">
            <label for="precio_venta" class="form-label">Precio de Venta</label>
            <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" value="<?php echo e(old('precio_venta', $cliente->precio_venta)); ?>" required></td>
        </div>

        <div class="mb-3">
            <label for="proveedor_id" class="form-label">Proveedor</label>
            <select class="form-select" id="proveedor_id" name="proveedor_id" required>
                <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($proveedor->id); ?>" <?php echo e($proveedor->id == old('proveedor_id', $cliente->proveedor_id) ? 'selected' : ''); ?>>
                    <?php echo e($proveedor->nombre_empresa); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="calidad_id" class="form-label">Calidad</label>
            <select class="form-select" id="calidad_id" name="calidad_id" required>
                <?php $__currentLoopData = $calidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($calidad->id); ?>" <?php echo e($calidad->id == $cliente->calidad_id ? 'selected' : ''); ?>>
                    <?php echo e($calidad->nombre); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
        <a href="<?php echo e(route('clientes.index')); ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
    document.getElementById('proveedor_id').addEventListener('change', function() {
        var proveedorId = this.value;
        var calidadSelect = document.getElementById('calidad_id');
        calidadSelect.disabled = true;
        calidadSelect.innerHTML = '<option value="">Seleccione una calidad</option>';

        if (proveedorId) {
            fetch(`/calidades/${proveedorId}`)
                .then(response => response.json())
                .then(data => {
                    calidadSelect.disabled = false;
                    data.forEach(calidad => {
                        var option = document.createElement('option');
                        option.value = calidad.id;
                        option.text = calidad.nombre;
                        calidadSelect.add(option);
                    });
                });
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/queren/test3/nrs_group_prueba/resources/views/clientes/edit.blade.php ENDPATH**/ ?>