<?=$this->extend("layout/master");?>
<?=$this->section("content");?>
    
<?php
helper('form');
echo form_open('CatModel/delete');
//var_dump($array);
?>

<div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6"><h1><i class="fa-solid fa-arrows-rotate fa-pulse"></i> Opravdu vymazat kočku z databáze?</h1></div>
                <div class="col-3"></div>
            </div>
</div>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="id_kocka" value="<?=$array->id_kocka?>">
    <div style="text-align: center">
    <input class="btn btn-danger" type="submit" value="Potvrdit" id="flexCheckDefault">
    </div>
    <br>
  </div>
  <div class="col-3"></div>
</div>

<?php
echo form_close();
?>



<?=$this->endSection();?>