<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Proveedores</h1>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
    
        <?php if($proveedores->count() > 0): ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>País</th>
                        <th>CIF</th>
                        <th>Fecha de Alta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($proveedor->id); ?></td>
                            <td><?php echo e($proveedor->nombre_empresa); ?></td>
                            <td><?php echo e($proveedor->pais); ?></td>
                            <td><?php echo e($proveedor->cif); ?></td>
                            <td><?php echo e($proveedor->fecha_alta->format('Y-m-d')); ?></td>
                            <td>
                                <a href="<?php echo e(route('proveedores.edit', $proveedor->id)); ?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="<?php echo e(route('proveedores.show', $proveedor->id)); ?>" class="btn btn-primary btn-sm">Calidades</a>
                                <form action="<?php echo e(route('proveedores.destroy', $proveedor->id)); ?>" method="POST" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este proveedor?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="alert alert-info text-center">No hay proveedores disponibles en este momento.</p>
        <?php endif; ?>
        
        <a href="<?php echo e(route('proveedores.create')); ?>" class="btn btn-success">Añadir Proveedor</a>
        <a href="<?php echo e(url('/exportarProveedores')); ?>" class="btn btn-primary">Exportar a CSV</a>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/proveedores/listar.blade.php ENDPATH**/ ?>