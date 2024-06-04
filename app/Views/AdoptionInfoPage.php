<?=$this->extend("layout/master");?>
<?=$this->section("content");?>

<?php
echo "<table class='table list-table table-hover pt-2 mx-auto'>
<tbody class='table-dark'>";

echo "<tr>
            <td>Majitel</td>
            <td>Datum adopce</td>
            <td>Kočka</td></tr>";

foreach($array as $row){

echo "<tr>
            <td class='table-column'><b>Jméno: </b>".$row->jmeno_prijmeni."<br><b> Věk: </b>"
            .$row->vek."<br><b>Město: </b>"
            .$row->nazev_mesta."<br><b>Tel. číslo: </b>"
            .$row->tel_cislo."<br>"."</td>
            <td class='table-column'>".$row->datum_adopce."</td>
            <td class='table-column'>".anchor('CatPage/'.$row->id_kocka,$row->jmeno, ['class' => 'btn'])."</td>";
}

echo "</tbody>
</table>

<div class='d-flex flex-column justify-content-center align-items-center'>
<p class= text-center>".$pager->links()."</p>
</div>";
?>

<?=$this->endSection();?>