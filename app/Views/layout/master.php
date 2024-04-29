<html>
    <head> 
        <title><?= $title?></title>
        <?= $this->include("layout/assets");?> 
 </head> 
 <body>
 <?= $this->include("layout/navbar");?>
 <div class= "container-fluid">
 <!--Dynamický obsah -->
 <?= $this->renderSection("content"); ?>
</div>
</body>
</html>