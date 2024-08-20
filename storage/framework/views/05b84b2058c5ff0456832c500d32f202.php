<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Calidades</h1>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        
        <?php if($calidades->count() > 0): ?>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Precio de Compra</th>
                        <th>Proveedor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $calidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $calidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($calidad->id); ?></td>
                            <td><?php echo e($calidad->nombre); ?></td>
                            <td><?php echo e($calidad->precio_compra); ?></td>
                            <td><?php echo e($calidad->proveedor->nombre_empresa); ?></td>
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
        <?php else: ?>
            <p class="alert alert-info text-center">No hay calidades disponibles en este momento.</p>
        <?php endif; ?>

        <a href="<?php echo e(route('calidades.create')); ?>" class="btn btn-success">Añadir Calidad</a>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/queren/test3/nrs_group_prueba/resources/views/calidades/listar.blade.php ENDPATH**/ ?>