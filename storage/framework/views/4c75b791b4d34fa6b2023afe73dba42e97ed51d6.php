<?php $__env->startSection('titele'); ?>Edit <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class=" p-3">

    <form action="<?php echo e(route('file.get.post',$file->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <a href="<?php echo e(route('file.download', $file->id)); ?>" target="_blank">Download PDF</a>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" value="<?php echo e($file->title); ?>">
        </div>


        <div class="form-group">
            <label for="exampleFormControlInput1">Autor</label>
            <input type="text" name="author" class="form-control" id="exampleFormControlInput1" placeholder="Autor" value="<?php echo e($file->author); ?>">
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Coordonator</label>
            <input type="text" name="coordinator" class="form-control" id="exampleFormControlInput1" placeholder="Coordonator" value="<?php echo e($file->coordinator); ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput4">Unitate Organizatională</label>
            <?php if(Auth::user()->roleid == 1): ?>
                <select name='organizationunit' class="custom-select custom-select-lg mb-3" id="exampleFormControlInput4">
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($role); ?>" <?php echo e($file->organizationunit == $role? "selected":""); ?>><?php echo e($role); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            <?php else: ?>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Unitate Organizationala" value="<?php echo e($file->organizationunit); ?>" readonly>
            <?php endif; ?>
        </div>



        <div class="form-group">
            <label for="exampleFormControlInput1">Exclude Pages</label>
            <input type="text" name="excludePages" class="form-control" id="exampleFormControlInput1" placeholder="Pages" value="<?php echo e($file->excludePages); ?>">
          </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
          </div>
      </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OS\OSPanel\domains\PLAGIATUS\resources\views/edit.blade.php ENDPATH**/ ?>