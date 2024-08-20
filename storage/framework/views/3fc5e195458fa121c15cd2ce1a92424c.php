<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="mt-4">Detalles del Proveedor</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h2><?php echo e($proveedor->nombre_empresa); ?></h2>
        </div>
        <div class="card-body">
            <p><strong>País:</strong> <?php echo e($proveedor->pais); ?></p>
            <p><strong>CIF:</strong> <?php echo e($proveedor->cif); ?></p>
            <p><strong>Fecha de alta:</strong> <?php echo e($proveedor->fecha_alta); ?></p>
            <h3>Calidades Asociadas</h3>
            <?php if($proveedor->calidades->isEmpty()): ?>
                <p>No hay calidades asociadas a este proveedor.</p>
            <?php else: ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio de Compra</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $proveedor->calidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($calidad->nombre); ?></td>
                                <td><?php echo e($calidad->precio_compra); ?></td>
                                <td>
                                    <a href="<?php echo e(route('calidades.edit', $calidad->id)); ?>" class="btn btn-primary btn-sm">Editar</a>
                                    <form action="<?php echo e(route('calidades.destroy', $calidad->id)); ?>" method="POST" style="display:inline-block;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta calidad?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
            <a href="<?php echo e(route('calidades.create', $proveedor->id)); ?>" class="btn btn-success">Añadir Calidad</a>

    </div>
</div>
    <form action="<?php echo e(route('proveedores.destroy', $proveedor->id)); ?>" method="POST" style="display:inline-block;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este proveedor?')">Eliminar Proveedor</button>
    </form>

<div class="d-grid gap-2 mt-3">
    <a href="<?php echo e(route('proveedores.index')); ?>" class="btn btn-secondary">Volver a la Lista de Proveedores</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/queren/test3/nrs_group_prueba/resources/views/proveedores/show.blade.php ENDPATH**/ ?>