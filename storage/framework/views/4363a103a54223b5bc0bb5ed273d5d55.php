<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Clientes</h1>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        
        <?php if($clientes->count() > 0): ?>
            <?php
                $clase_tabla = '';
            ?>
            <?php if($beneficioNegativo): ?>
                <div class="alert alert-danger">
                    <p class="text-center">Existen clientes con beneficio negativo.</p>
                </div>
                <?php
                    $clientesNegativo = [];
                    $clientesPositivos = [];
                    $clase_tabla = "table-danger";
                ?>

                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $precio_compra = $cliente->calidad->precio_compra ?? 0;
                        $beneficio = $cliente->precio_venta - $precio_compra;
                    ?>

                    <?php if($beneficio < 0): ?>
                        <?php
                            $clientesNegativo[] = $cliente;
                        ?>
                    <?php else: ?>
                        <?php
                            $clientesPositivos[] = $cliente;
                        ?>         
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginal2c9aa6ee66207a9a35bd79969b7b2cad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2c9aa6ee66207a9a35bd79969b7b2cad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tabla_listar','data' => ['clientes' => $clientesNegativo,'clase' => $clase_tabla]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('tabla_listar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['clientes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clientesNegativo),'clase' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clase_tabla)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2c9aa6ee66207a9a35bd79969b7b2cad)): ?>
<?php $attributes = $__attributesOriginal2c9aa6ee66207a9a35bd79969b7b2cad; ?>
<?php unset($__attributesOriginal2c9aa6ee66207a9a35bd79969b7b2cad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c9aa6ee66207a9a35bd79969b7b2cad)): ?>
<?php $component = $__componentOriginal2c9aa6ee66207a9a35bd79969b7b2cad; ?>
<?php unset($__componentOriginal2c9aa6ee66207a9a35bd79969b7b2cad); ?>
<?php endif; ?>
                <?php
                    $clase_tabla = '';
                ?>
                <?php if($clientesPositivos): ?>
                    <?php if (isset($component)) { $__componentOriginal2c9aa6ee66207a9a35bd79969b7b2cad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2c9aa6ee66207a9a35bd79969b7b2cad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tabla_listar','data' => ['clientes' => $clientesPositivos,'clase' => $clase_tabla]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('tabla_listar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['clientes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clientesPositivos),'clase' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clase_tabla)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2c9aa6ee66207a9a35bd79969b7b2cad)): ?>
<?php $attributes = $__attributesOriginal2c9aa6ee66207a9a35bd79969b7b2cad; ?>
<?php unset($__attributesOriginal2c9aa6ee66207a9a35bd79969b7b2cad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c9aa6ee66207a9a35bd79969b7b2cad)): ?>
<?php $component = $__componentOriginal2c9aa6ee66207a9a35bd79969b7b2cad; ?>
<?php unset($__componentOriginal2c9aa6ee66207a9a35bd79969b7b2cad); ?>
<?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginal2c9aa6ee66207a9a35bd79969b7b2cad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2c9aa6ee66207a9a35bd79969b7b2cad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tabla_listar','data' => ['clientes' => $clientes,'clase' => $clase_tabla]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('tabla_listar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['clientes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clientes),'clase' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clase_tabla)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2c9aa6ee66207a9a35bd79969b7b2cad)): ?>
<?php $attributes = $__attributesOriginal2c9aa6ee66207a9a35bd79969b7b2cad; ?>
<?php unset($__attributesOriginal2c9aa6ee66207a9a35bd79969b7b2cad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c9aa6ee66207a9a35bd79969b7b2cad)): ?>
<?php $component = $__componentOriginal2c9aa6ee66207a9a35bd79969b7b2cad; ?>
<?php unset($__componentOriginal2c9aa6ee66207a9a35bd79969b7b2cad); ?>
<?php endif; ?>
            <?php endif; ?>
        <?php else: ?>
            <p class="alert alert-info text-center">No hay clientes disponibles en este momento.</p>
        <?php endif; ?>

        <a href="<?php echo e(route('clientes.create')); ?>" class="btn btn-success">Añadir Cliente</a>
        <a href="<?php echo e(url('/exportarClientes')); ?>" class="btn btn-primary">Exportar a CSV</a>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/clientes/listar.blade.php ENDPATH**/ ?>