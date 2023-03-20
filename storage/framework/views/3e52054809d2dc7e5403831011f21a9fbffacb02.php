<?php $__env->startSection('titele'); ?>Вход<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="mt-3">
    <a href="<?php echo e(route('file.new')); ?>"><span type="button" class="btn btn-primary float-right mb-2 mt-1">New</span></a>
    <?php if(!is_null($files)): ?>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Unique Local</th>
            <th scope="col">Unique Online</th>
            <th scope="col">Last Update</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <th scope="row"><?php echo e($file->id); ?></th>
            <td>
                <a href="<?php echo e(route('file.download', $file->id)); ?>">
                    <?php echo e($file->title); ?>

                </a>
            </td>
            <td>
                <?php if(!is_null($file->unique)): ?>
                <a href="<?php echo e(route('check.raport',$file->id)); ?>">
                    <?php echo e($file->unique." %"); ?>

                </a>
                <?php else: ?>
                    <?php echo e('null'); ?>

                <?php endif; ?>
            </td>
            <td>
                <?php if(!is_null($file->uniqueGoogle)): ?>
                <a href="<?php echo e(route('check.raportGoogle',$file->id)); ?>">
                    <?php echo e($file->uniqueGoogle." %"); ?>

                </a>
                <?php else: ?>
                    <?php echo e('null'); ?>

                <?php endif; ?>
            </td>
            <td><?php echo e($file->updated_at); ?></td>
            <td>
                <?php if($file->incheck): ?>
                    
                    <span class="googlecheck" style="color: red; border:2px solid red;"><span>L</span></span>
                <?php else: ?>
                    
                    <a href="<?php echo e(route('file.check',$file->id)); ?>" class="googlecheck"><span>L</span></a>
                <?php endif; ?>
                <?php if($file->incheckg): ?>
                    
                    <span class="googlecheck" style="color: red; border:2px solid red;"><span>G</span></span>
                <?php else: ?>
                    
                    <a href="<?php echo e(route('file.check.google',$file->id)); ?>" class="googlecheck"><span>G</span></a>
                <?php endif; ?>
                <a href="<?php echo e(route('file.get',$file->id)); ?>"><i class="far fa-edit"></i></a>
                <a href="<?php echo e(route('file.delete',$file->id)); ?>"><i class="far fa-trash-alt"></i></a>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php endif; ?>
    <?php echo e($files->links()); ?>

</div>
<style>
    .googlecheck{
        font-weight: bolder;
        border: 2px solid #007bff;
        border-radius: 30px;
        /* width: 5px; */
        /* height: 5px; */
        /* padding: 1px; */
        font-size: 12px;
    }
    a.googlecheck:hover{
        text-decoration: none !important;
        border: 2px solid #0056b3;
    }
    .googlecheck span {
        width: 13px;
        height: 13px;
        display: inline-block;
        text-align: center;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OS\OSPanel\domains\PLAGIATUS\resources\views/home.blade.php ENDPATH**/ ?>