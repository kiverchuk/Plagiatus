<?php $__env->startSection('titele'); ?>Delete <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="text-center mt-3" >
    <form method="POST" action="<?php echo e(route('file.delete.post', $file->id)); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
              <input name="name" type="text" class="form-control" placeholder="Название" value="<?php echo e($file->id); ?>" readonly>
            </div>
          </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Название</label>
            <div class="col-sm-10">
              <input name="name" type="text" class="form-control" placeholder="Название" value="<?php echo e($file->title); ?>" readonly>
            </div>
          </div>
        <button type="submit" class="btn btn-danger mb-2">Delete</button>
      </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OS\OSPanel\domains\PLAGIATUS\resources\views/delete.blade.php ENDPATH**/ ?>