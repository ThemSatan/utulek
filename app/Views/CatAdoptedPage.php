<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<?php
    if ($adminCheck){
        echo anchor('CatModel/new','Přidat',['class' => 'btn btn-secondary']);
        echo anchor('CatModel/arrayList','Upravit',['class' => 'btn btn-info']);
    }
?>

<div class='offset-1'>
<div class='row pt-2'>
    <?php 

// Create connection
$conn = new mysqli('localhost', 'root', '', 'adamkova');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_kocka, jmeno, fotografie, status FROM ut_kocka WHERE status='3'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<br>
    <div class='card border-primary mb-3' style='max-width: 300px; margin: 10px; background-color: #eff0f5;'>
        <div class='card-header'>
            <img style='height:150px;max-width:200px; display: block; margin-left: auto;margin-right: auto;' src='".base_url('public/assets/kocky/')."/".$row["fotografie"]. "'>".
            "<h3>".anchor('CatPage/'.$row["id_kocka"],$row["jmeno"]). "</h3>".
        "</div>
    </div>";
  }
} else {
  echo "0 results";
}

$conn->close();

        ?>
            
    <?php
            

    

echo "</div></div>";


echo "<div class='d-flex flex-column justify-content-center align-items-center'>
<p class= text-center>".$pager->links()."</p>
</div>";
?>

<?=$this->endSection();?>