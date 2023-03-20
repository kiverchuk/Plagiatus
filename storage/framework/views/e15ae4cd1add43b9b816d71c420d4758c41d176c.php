<?php $__env->startSection('titele'); ?>API Keys <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('key.new')); ?>"><span type="button" class="btn btn-primary float-right mb-2 bt-1">New</span></a>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Key</th>
        <th scope="col">CX</th>
        <th scope="col">Cereri</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $keys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <th scope="row"><?php echo e($key->id); ?></th>
        <td> <?php echo e($key->name); ?> </td>
        <td> <?php echo e($key->key); ?> </td>
        <td> <?php echo e($key->cx); ?> </td>
        <td> <?php echo e($key->currentrequest); ?> </td>
        <td>
            <a href="<?php echo e(route('key.edit',$key->id)); ?>" title='Modifica'><i class="far fa-edit"></i></a>
            <a href="<?php echo e(route('key.delete',$key->id)); ?>" title='Sterge'><i class="far fa-trash-alt"></i></a>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo e($keys->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OS\OSPanel\domains\PLAGIATUS\resources\views/admin/key/keys.blade.php ENDPATH**/ ?>