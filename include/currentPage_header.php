<?php include('header.php')?>
<?php  
    $withExt = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
   $curPageName = str_replace('.php','',$withExt);
  ?>   
<div class="parallex">
  <h2 class="display-4 text-white font-weight-bold page-title"><?php echo ucFirst($curPageName) ?></h2>
</div>