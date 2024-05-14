<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<div class="container">
    <div class='row no-gutters mx-auto' style="margin-top: 50px; ">
        <?php 
   
        foreach($array as $row){

        ?>
        
            <?php
            echo "<img class='mx-auto image-thumbnail' style='max-width:500px;  max-height:600px;  display: block; padding-bottom: 20px;' src='".base_url('public/assets/kocky/')."/".$row->fotografie. "'>";
            ?>

            <div class='card border-primary mb-3 mx-auto' style='height:auto; width: 500px; padding-left: 20px; padding-right: 20px; padding-top: 20px; background-color: #eff0f5;'>
                <?php
                echo "<h2 class='text-center'>".$row->jmeno."</h2>";
                ?>
                <hr>
                <div class='card-body'>
                    <p>
                        <?php
                        echo "<b>Status: </b>".$row->status."<br>
                        <hr>
                        <b>Pohlaví: </b>".$row->pohlavi."<br>
                        <b>Věk: </b>".$row->vek."<br>
                        <b>Datum narození: </b>".$row->narozeni."<br>
                        <b>Váha: </b>".$row->vaha."<br>
                        <b>Plemeno: </b>".$row->nazev."<br>
                        <hr>
                        <b>Popis: </b>".$row->popis."<br>
                        ";
                        ?>
                    </p>
                </div>
            </div>
    
<?php    
}
?>

            </div>
        </div>
    </div>



<?=$this->endSection();?>