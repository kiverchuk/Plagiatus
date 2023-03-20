
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $__env->yieldContent('title'); ?></title>
    <meta charset="utf-16">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content=" <?php echo e(csrf_token()); ?> " >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://static.fontawesome.com/css/fontawesome-app.css">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/css/splide.min.css">
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light" style="background:#f3f6fa;">
  <a class="navbar-brand" href=" <?php echo e(route('home')); ?> ">Plagiatus</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?php if(auth()->check() && Auth::user()->roleid == 1): ?>
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo e(route('users')); ?>">Utilizatori</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo e(route('keys')); ?>">APIKey</a>
            </li>
        <?php endif; ?>
  </div>
  <?php if(auth()->check()): ?>
    <?php echo e(Auth::user()->email); ?> | <?php echo e(App\Http\Controllers\LoginController::getRole()); ?> <a href=" <?php echo e(route('logout')); ?> " class="my-2 my-sm-0 ml-3">Esire</a>
  <?php endif; ?>
</nav>
<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>

<footer class="footer spad mt-5">

</footer>
</div>
</body>
</html>
<?php /**PATH E:\Programs\OS\OSPanel\domains\PLAGIATUS\resources\views/layout.blade.php ENDPATH**/ ?>