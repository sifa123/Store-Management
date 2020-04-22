<?php  if(count($errors)>0); ?>

<div class="error">
<?php foreach($errors as $error): ?>
<link rel="stylesheet" href="error.css">
<center><p> <?php echo $error ?> </p></center>
<?php endforeach ?>
</div>

