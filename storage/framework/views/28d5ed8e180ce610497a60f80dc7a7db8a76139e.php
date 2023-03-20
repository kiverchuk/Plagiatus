<?php $__env->startSection('titele'); ?>Utilizator nou <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class=" p-3">

    <form action="<?php echo e(route('user.delete.post',$id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nume</label>
          <input type="text"class="form-control" id="exampleFormControlInput1" placeholder="Nume" value="<?php echo e($user['name']); ?>" readonly>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Email</label>
            <input type="email"class="form-control" id="exampleFormControlInput2" placeholder="Email" value="<?php echo e($user['email']); ?>" readonly>
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Drepturi</label>
            <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Email" value="<?php echo e($roles[$user['roleid']]); ?>" readonly>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-danger">Sterge</button>
            </div>
          </div>
      </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OS\OSPanel\domains\PLAGIATUS\resources\views/admin/delete.blade.php ENDPATH**/ ?>