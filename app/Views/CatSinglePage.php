<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<div class="container">
    <div class='row no-gutters mx-auto' style="margin-top: 50px; ">
        <?php 
   
        foreach($array as $row){

        ?>
        
            <?php
            echo "<img class='profile-image mx-auto' src='".base_url('public/assets/kocky/')."/".$row->fotografie. "'>";
            ?>

            <div class='card-profile mx-auto'>
                <?php
                echo "<h2 class='text-center text-uppercase cat-name-title'>".$row->jmeno."</h2>";
                ?>
                <hr>
                <div class='container' >
                    <p>
                        <?php
                        echo "<b class='titles'>Status: </b>";
                        if ($row->status == [2]) {
                            echo anchor('AdoptionInfoPage/'.$row->id_kocka,$row->status);
                        }
                        else {
                            echo $row->status;
                        }
                        echo "<br>
                        <hr>
                        <b class='titles'>Pohlaví: </b>".$row->pohlavi."<br>
                        <b class='titles'>Věk: </b>".$row->vek."<br>
                        <b class='titles'>Datum narození: </b>".$row->narozeni."<br>
                        <b class='titles'>Váha: </b>".$row->vaha."<br>
                        <b class='titles'>Plemeno: </b>".$row->nazev."<br>
                        <hr>
                        <b class='titles'>Popis:<br> </b>".$row->popis."<br>
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