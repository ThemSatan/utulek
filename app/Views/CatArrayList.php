<?=$this->extend("layout/master");?>
<?=$this->section("content");?>


<?php
if($message != NULL) {
    echo '<div class="pop-up bg-success">'.$message.
    '</div>';
  }

echo "<table class='table list-table table-hover pt-2 mx-auto'>
<tbody class='table-dark'>";

echo "<tr>
            <td>ID</td>
            <td>Jméno</td>
            <td>Status</td>
            <td>Věk</td>
            <td>Váha</td>
            <td>Plemeno</td>
            <td>Popis</td>
            <td>Pohlaví</td>
            <td>Datum narození</td>
            <td></td>
            <td></td></tr>";

foreach($array as $row){

echo "<tr>
            <td class='table-column small'>".$row->id_kocka."</td>
            <td class='table-column'>".$row->jmeno."</td>
            <td class='table-column'>".$row->status."</td>
            <td class='table-column small'>".$row->vek."</td>
            <td class='table-column small'>".$row->vaha."</td>
            <td class='table-column'>".$row->nazev."</td>
            <td class='table-text table-column'>".$row->popis."</td>
            <td class='table-column'>".$row->pohlavi."</td>
            <td class='table-column'>".$row->narozeni."</td>";
            echo  "<td>".anchor('CatModel/edit/'.$row->id_kocka,'Upravit',['class' => 'btn'])."</td>".
            "<td>".anchor('CatModel/delete/'.$row->id_kocka,'Smazat',['class' => 'btn'])."</td></tr>";

}

echo "</tbody>
</table>";

echo "<div class='d-flex flex-column justify-content-center align-items-center'>
<p class= text-center>".$pager->links()."</p>
</div>";
?>

<?=$this->endSection();?>