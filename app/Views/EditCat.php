<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<?php
helper('form');
echo form_open('CatModel/edit');
//var_dump($array);

if($message != NULL) {
  echo '<div class="bg-success">'.$message.
  '</div>';
}
?>

<div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6"><h1><i class="fa-solid fa-arrows-rotate fa-pulse"></i> Upravit kočku</h1></div>
                <div class="col-3"></div>
            </div>
</div>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">

    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id_kocka" value="<?=$array[0]->id_kocka?>">

    <div class="form-group">
      <label for="inputName" class="form-label mt-4">Status</label>
      <input type="number" min="1" max="3" class="form-control" id="inputStatus" aria-describedby="input" placeholder="
      <?php
      echo $array[0]->status;
      ?>
      " name="status">
      <p class="text-muted">*1 - k dispozici, 2 - adoptovaná, 3 - není k dispozici</p>
    </div>

    <div class="form-group">
      <label for="inputUrl" class="form-label mt-4">Jméno</label>
      <input type="text" class="form-control" id="inputName" placeholder="
      <?php
      echo $array[0]->jmeno;
      ?>
      " name="jmeno">
    </div>

    <div class="form-group">
      <label for="inputName" class="form-label mt-4">Věk</label>
      <input type="number" min="1" max="18" class="form-control" id="inputAge" aria-describedby="input" placeholder="
      <?php
      echo $array[0]->vek;
      ?>
      " name="vek">
    </div>

    <div class="form-group">
      <label for="inputName" class="form-label mt-4">Váha</label>
      <input type="number" min="0.1" max="7" step="0.1" class="form-control" id="inputWeight" aria-describedby="input" placeholder="
      <?php
      echo $array[0]->vaha;
      ?>
      " name="vaha">
    </div>

    <div class="form-group">
      <label for="inputBreed" class="form-label mt-4">Plemeno</label>
      <input type="hidden" name="id" value="plemeno_id"/>
      <select required='required' id="inputBreed" name="plemeno" class="form-control" aria-describedby="input" placeholder="Vyberte plemeno">
        <option value=""><?=$array[0]->plemeno_id?></option>
      <?php
        foreach($list as $row){
          echo "<option value='".$row->id_plemeno."'>".$row->id_plemeno." ".$row->nazev."</option>";
        }
      ?>
      </select>
    </div>

    

    <div class="form-group">
      <label for="inputName" class="form-label mt-4">Pohlaví</label>
      <input type="text" class="form-control" id="inputGender" aria-describedby="input" placeholder="
      <?php
      echo $array[0]->pohlavi;
      ?>
      " name="pohlavi">
    </div>

    <div class="form-group">
      <label for="inputName" class="form-label mt-4">Datum narození</label>
      <input type="text" class="form-control" id="inputBD" aria-describedby="input" placeholder="
      <?php
      echo $array[0]->narozeni;
      ?>
      " name="narozeni">
    </div>

    <input class="btn btn-success" type="submit" value="Potvrdit" id="flexCheckDefault" style="margin-top: 10px">

  </div>
  <div class="col-3"></div>
</div>

<?php
echo form_close();
?>

<?=$this->endSection();?>