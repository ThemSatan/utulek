<?=$this->extend("layout/master");?>
<?=$this->section("content");?>
<div class="bg">
<?php
    if ($adminCheck){
        echo anchor('CatModel/new','Přidat',['class' => 'btn btn-secondary']);
        echo anchor('CatModel/arrayList','Upravit',['class' => 'btn btn-info']);
    }
?>

<div class='offset-1'>
<div class='row pt-2'>
    <?php 



foreach($array as $row){

?>
    <br><div class='card border-primary mb-3' style='max-width: 300px; margin: 10px; background-color: #eff0f5;'>
        <div class='card-header'>
            <?php
                echo "<img style='height:150px;max-width:200px; display: block; margin-left: auto;margin-right: auto;' src='".base_url('public/assets/kocky/')."/".$row->fotografie. "'>";
                //echo "<h3>".$row->jmeno."</h3>";
                echo "<h3>".anchor('CatPage/'.$row->id_kocka,$row->jmeno)."</h3>";
            ?>
        </div>
    </div>
    
<?php    
}
echo "</div></div>";


echo "<div class='d-flex flex-column justify-content-center align-items-center'>
<p class= text-center>".$pager->links()."</p>
</div>";
?>
</div>

<?=$this->endSection();?>