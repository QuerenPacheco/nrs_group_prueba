<table class="table table-bordered <?php echo e($clase); ?>">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha de Alta</th>
            <th>Proveedor</th>
            <th>Calidad</th>
            <th>Precio de Venta</th>
            <th>Precio de Compra</th>
            <th>Beneficio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $precio_compra = $cliente->calidad->precio_compra ?? 0;
                $beneficio = $cliente->precio_venta - $precio_compra;
            ?>
            <tr>
                <td><?php echo e($cliente->id); ?></td>
                <td><?php echo e($cliente->nombre); ?></td>
                <td><?php echo e($cliente->apellidos); ?></td>
                <td><?php echo e($cliente->fecha_alta->format('Y-m-d')); ?></td>
                <td><?php echo e($cliente->proveedor->nombre_empresa); ?></td>
                <td><?php echo e($cliente->calidad->nombre); ?></td>
                <td><?php echo e($cliente->precio_venta); ?></td>
                <td><?php echo e($precio_compra); ?></td>
                <td>
                    <?php if($beneficio < 0): ?>
                        <span class="text-danger"><?php echo e($beneficio); ?></span>
                        <?php else: ?>
                            <?php echo e($beneficio); ?>

                        <?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo e(route('clientes.edit', $cliente->id)); ?>" class="btn btn-primary btn-sm">Editar</a>
                    <form action="<?php echo e(route('clientes.destroy', $cliente->id)); ?>" method="POST" style="display:inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este cliente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /home/queren/test3/nrs_group_prueba/resources/views/components/tabla_listar.blade.php ENDPATH**/ ?>