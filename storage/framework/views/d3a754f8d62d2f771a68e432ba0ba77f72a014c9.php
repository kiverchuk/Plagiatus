<?php $__env->startSection('titele'); ?>Key-e noua <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class=" p-3">
    <form action="<?php echo e(route('key.edit.post',$id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nume</label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nume" value="<?php echo e($key['name']); ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Key</label>
            <input type="text" name="key" class="form-control" id="exampleFormControlInput2" placeholder="Key" value="<?php echo e($key['key']); ?>">
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput3">CX</label>
            <input type="text" name="cx" class="form-control" id="exampleFormControlInput3" placeholder="CX" value="<?php echo e($key['cx']); ?>">
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
          </div>
      </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OS\OSPanel\domains\PLAGIATUS\resources\views/admin/key/edit.blade.php ENDPATH**/ ?>