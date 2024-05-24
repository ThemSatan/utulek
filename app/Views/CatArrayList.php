<?=$this->extend("layout/master");?>
<?=$this->section("content");?>


<?php
if($message != NULL) {
    echo '<div class="bg-success">'.$message.
    '</div>';
  }

echo "<table class='table table-hover table-dark row pt-2'>";

foreach($array as $row){

echo "
    <tbody>
        <tr>
            <td>".$row->id_kocka."</td>
            <td>".$row->jmeno."</td>
            <td>".$row->status."</td>";
            //var_dump($radek);
echo        "<td>".anchor('CatModel/edit/'.$row->id_kocka,'Upravit',['class' => 'btn btn-info']).
"</td>
<td>".anchor('CatModel/delete/'.$row->id_kocka,'Smazat',['class' => 'btn btn-danger']).
"</td>
        </tr>
    </tbody>";
}

echo "</table>";

?>

<?=$this->endSection();?>