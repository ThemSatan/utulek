<?=$this->extend("layout/master");?>
<?=$this->section("content");?>


<?php
if($message != NULL) {
    echo '<div class="bg-success">'.$message.
    '</div>';
  }

echo "<table class='table table-hover table-dark pt-2 mx-auto'>
<tbody>";


foreach($array as $row){

echo "<tr>
            <td>".$row->id_kocka."</td>
            <td>".$row->jmeno."</td>
            <td>".$row->status."</td>
            <td>".$row->vek."</td>
            <td>".$row->vaha."</td>
            <td>".$row->plemeno_id."</td>
            <td>".$row->popis."</td>
            <td>".$row->pohlavi."</td>
            <td>".$row->narozeni."</td></tr>";
            echo  anchor('CatModel/edit/'.$row->id_kocka,'Upravit',['class' => 'btn btn-info']).
                anchor('CatModel/delete/'.$row->id_kocka,'Smazat',['class' => 'btn btn-danger']);

}

echo "</tbody>
</table>";

?>

<?=$this->endSection();?>