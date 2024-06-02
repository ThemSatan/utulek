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
  <div class="pop-up results bg-dark">
    <?php
    $conn = new mysqli('localhost', 'root', '', 'adamkova');

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql="SELECT id_kocka FROM ut_kocka WHERE status='2'";
    
    if ($result=mysqli_query($conn,$sql))
      {
      // Return the number of rows in result set
      $rowcount=mysqli_num_rows($result);
      printf("Počet výsledků: %d \n",$rowcount);
      // Free result set
      mysqli_free_result($result);
      }
    ?>
  </div>
<div class='row pt-2'>
    <?php 

// Create connection
$conn = new mysqli('localhost', 'root', '', 'adamkova');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id_kocka, jmeno, fotografie, status FROM ut_kocka WHERE status='2'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<br>
    <div class='card mb-3''>
      <div class='text-center'>
        <div class='container'>
            <a href='CatPage/".$row["id_kocka"]."'><img class='profiles' src='".base_url('public/assets/kocky/')."/".$row["fotografie"]. "'></a>".
            "<h3>".anchor('CatPage/'.$row["id_kocka"],$row["jmeno"],['class' => 'center']). "</h3>".
        "</div>
      </div>
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