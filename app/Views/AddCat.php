<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<?php
helper('form');
echo form_open('CatModel/create'); 
//<input type="number" min="1" max="70" class="form-control" id="inputBreed" placeholder="ID plemena, viz tabulka**" name="plemeno_id">

if($message != NULL) {
  echo '<div class="bg-success">'.$message.
  '</div>';
}

?>

<form action="" method="post" enctype="multipart/form-data">

<div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6"><h1><i class="fa-solid fa-arrows-rotate fa-pulse"></i> Přidat kočku</h1></div>
                <div class="col-3"></div>
            </div>
</div>
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">

    
    <div class="form-group">
      <label for="inputStatus" class="form-label mt-4">Status</label>
      <input type="hidden" name="id" value="status"/>
      <select required='required' id="inputStatus" name="status" class="form-control" aria-describedby="input" placeholder="Vyberte status">
        <option value="">Vyberte status</option>
        <option value="3">Adoptovaná</option>
        <option value="2">Nedostupná</option>
        <option value="1">Dostupná</option>
      </select>
    </div>

    <div class="form-group">
      <label for="inputUrl" class="form-label mt-4">Jméno</label>
      <input required="required" type="text" class="form-control" id="inputName" placeholder="Sem jméno kočky" name="jmeno">
    </div>

    <div class="form-group">
      <label for="inputName" class="form-label mt-4">Věk</label>
      <input required="required" type="number" min="1" max="18" class="form-control" id="inputAge" aria-describedby="input" placeholder="Sem věk v letech, např.: 10" name="vek">
    </div>

    <div class="form-group">
      <label for="inputName" class="form-label mt-4">Váha</label>
      <input required="required" type="number" min="0.1" max="7" step="0.1" class="form-control" id="inputWeight" aria-describedby="input" placeholder="Sem váha kočky, např.:" name="vaha">
    </div>

    <div class="form-group">
      <label for="inputBreed" class="form-label mt-4">Plemeno</label>
      <input type="hidden" name="id" value="plemeno_id"/>
      <select required='required' id="inputBreed" name="plemeno" class="form-control" aria-describedby="input" placeholder="Vyberte plemeno">
        <option value="">Vyberte plemeno</option>
      <?php
        foreach($list as $row){
          echo "<option value='".$row->id_plemeno."'>".$row->id_plemeno." ".$row->nazev."</option>";
        }
      ?>
      </select>
    </div>

    <div class="form-group">
      <label for="inputGender" class="form-label mt-4">Pohlaví</label>
      <input type="hidden" name="id" value="pohlavi"/>
      <select required='required' id="inputGender" name="pohlavi" class="form-control" aria-describedby="input" placeholder="Vyberte pohlaví">
        <option value="">Vyberte pohlaví</option>
        <option value="Kočka">Kočka</option>
        <option value="Kocour">Kocour</option>
      
      </select>
    </div>

    <div class="form-group">
      <label for="inputName" class="form-label mt-4">Datum narození</label>
      <input required="required" type="text" class="form-control" id="inputBD" aria-describedby="input" placeholder="Sem datum narození kočky, formát: dd.mm.rrrr" name="narozeni">
    </div>

    <div class="form-group">
        <label for="inputFoto" class="form-label mt-4">Profilový obrázek kočky</label>
        <input type="file" class="form-control" id="inputFoto" aria-describedby="input" name="fotografie">
    </div>

    <input class="btn btn-success" type="submit" value="Potvrdit" id="flexCheckDefault" style="margin-top: 10px">

    </form>

  </div>
  <div class="col-3"></div>
</div>

<?php
echo form_close();
?>

<?=$this->endSection();?>