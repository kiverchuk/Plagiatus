<?php $__env->startSection('titele'); ?>Utilizatori <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<a href="<?php echo e(route('user.new')); ?>"><span type="button" class="btn btn-primary float-right mb-2 mt-1">New</span></a>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <th scope="row"><?php echo e($user->id); ?></th>
        <td> <?php echo e($user->email); ?> </td>
        <td> <?php echo e($user->rolename); ?> </td>
        <td>
            <a href="<?php echo e(route('user.get',$user->id)); ?>" title='Modifica'><i class="far fa-edit"></i></a>
            <?php if($user->id != Auth::user()->id): ?>
                <a href="<?php echo e(route('user.delete',$user->id)); ?>" title='Sterge'><i class="far fa-trash-alt"></i></a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo e($users->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OS\OSPanel\domains\PLAGIATUS\resources\views/admin/user/users.blade.php ENDPATH**/ ?>