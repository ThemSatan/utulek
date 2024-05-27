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

if($errorMessage != NULL) {
  echo '<div class="bg-danger">'.$errorMessage.
  '</div>';
}
?>

<form action="UploadFile.php" method="post" enctype="multipart/form-data" action="/create">

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
      <label for="inputName" class="form-label mt-4">Status</label>
      <input required="required" type="number" min="1" max="3" class="form-control" id="inputStatus" aria-describedby="input" placeholder="Sem status kočky jako číslo*" name="status">
      <p class="text-muted">*1 - k dispozici, 2 - adoptovaná, 3 - není k dispozici</p>
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

    <!--<form action="ActionPage.php" method="post">-->

    <div class="form-group">
      <label for="inputBreed" class="form-label mt-4">Plemeno</label>
      <input type="hidden" name="id" value="plemeno_id"/>
      <select required='required' id="inputBreed" name="plemeno" class="form-control" aria-describedby="input" placeholder="Vyberte plemeno">
        <option value="">Vyberte plemeno</option>
      <?php
        foreach($array as $row){
          echo "<option value='".$row->plemeno_id."'>".$row->plemeno_id."</option>";
        }

        /**$conn = new mysqli('localhost', 'root', '', 'adamkova');
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT ut_plemeno.id_plemeno, ut_plemeno.nazev, ut_kocka.plemeno_id
        FROM ut_plemeno ut_plemeno
        LEFT JOIN ut_kocka ut_kocka ON ut_plemeno.id_plemeno = ut_kocka.plemeno_id
        ORDER BY ut_plemeno.id_plemeno ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<option value='".$row["plemeno_id"]."'>".$row["id_plemeno"]." ".$row["nazev"]."</option>";
          }
        }**/
      ?>
      </select>
    </div>

    <div class="form-group">
      <label for="inputName" class="form-label mt-4">Pohlaví</label>
      <input required="required" type="text" class="form-control" id="inputGender" aria-describedby="input" placeholder="Sem pohlaví: Male/Female" name="pohlavi">
    </div>

    <div class="form-group">
      <label for="inputName" class="form-label mt-4">Datum narození</label>
      <input required="required" type="text" class="form-control" id="inputBD" aria-describedby="input" placeholder="Sem datum narození kočky, formát: dd.mm.rrrr" name="narozeni">
    </div>

    <div class="form-group">
        <label for="inputName" class="form-label mt-4">Profilový obrázek kočky</label>
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