<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<div class='offset-1'>
<div class='row pt-2'>
    <?php 
   
foreach($array as $row){

?>
    <br><div class='card border-primary mb-3' style='max-width: 300px; margin: 10px; background-color: #eff0f5;'>
        <div class='card-header'>
            <?php
                echo "<img style='height:150px;max-width:200px; display: block; margin-left: auto;margin-right: auto;' src='".base_url('public/assets/kocky/')."/".$row->fotografie. "'>";
                echo "<h3>".$row->jmeno."</h3>";
            ?>
        </div>
    </div>
    
<?php    
}
echo "</div></div>";
?>

<?=$this->endSection();?>