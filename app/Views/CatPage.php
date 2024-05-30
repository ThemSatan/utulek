<?=$this->extend("layout/master");?>
<?=$this->section("content");?>
<?php
    if ($adminCheck){
        echo 
        anchor('CatModel/new','Přidat',['class' => 'btn edit']).
        anchor('CatModel/arrayList','Upravit',['class' => 'btn edit']);
    }
?>

<div class='offset-1 profiles-group'>
<div class='row pt-2'>
    <?php 



foreach($array as $row){

?>
    <br><div class='card'>
        <div class='text-center'>
            <?php
                echo "<div class='container'>
                        <a href='CatPage/".$row->id_kocka."'><img class='profiles' src='".base_url('public/assets/kocky/')."/".$row->fotografie. "'></a>
                        <h3>".anchor('CatPage/'.$row->id_kocka,$row->jmeno, ['class' => 'center'])."</h3>
                    </div>";
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

<?=$this->endSection();?>