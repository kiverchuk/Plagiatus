<?php $__env->startSection('titele'); ?>Login <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div style="background-image: url(https://usarb.md/wp-content/uploads/2022/02/usarb.md_.png);background-position: center;padding: 50px;">

    <div class="text-center" style="width: 250px;margin: auto;">
        <form class="form-signin w-a" action=" <?php echo e(route('login.post')); ?> " method="POST" style="background-color: #ffffff73;padding: 10px;border-radius: 5px;">
            <?php echo csrf_field(); ?>
            <h1 class="h2 mb-3 font-weight-normal" style="margin-top: 0;text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">Autorizarea</h1>
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required="" autofocus="">
            <input name="password" type="password" id="inputPassword" class="form-control mt-3" placeholder="Parola" required="">
            <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Intra</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Programs\OS\OSPanel\domains\PLAGIATUS\resources\views/login.blade.php ENDPATH**/ ?>