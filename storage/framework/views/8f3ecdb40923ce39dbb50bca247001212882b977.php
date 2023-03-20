<?php $__env->startSection('titele'); ?>Modifica utilizator <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class=" p-3">

    <form action="<?php echo e(route('user.get.post',$id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nume</label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nume" value="<?php echo e($user['name']); ?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput2">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput2" placeholder="Email" value="<?php echo e($user['email']); ?>">
          </div>
        <div class="form-group">
            <label for="exampleFormControlInput3">Password</label>
            <input type="text" name="password" class="form-control" id="exampleFormControlInput3" placeholder="Parola noua. Lasa gol daca nu se modifica." value="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput4">Drepturi</label>
            <select name='roleid' class="custom-select custom-select-lg mb-3" id="exampleFormControlInput4" value="<?php echo e($user['roleid']); ?>">
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>" <?php echo e($user['roleid']==$key? "selected":""); ?>><?php echo e($role); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
          </div>
      </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OS\OSPanel\domains\PLAGIATUS\resources\views/admin/edit.blade.php ENDPATH**/ ?>