<?php

echo $this->extend('layout/master');

echo $this->section('content');

echo form_open('login-complete');

echo '
<div class="col-4 offset-2">
    ';

if($message != NULL) {
    echo '<div class="bg-danger">'.$message.
    '</div>';
}

/*placeholder u floating placeholderu nechat prazdny, protoze nejde videt VVV*/

echo '
    <div class="form-floating mb-3 mt-3">
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email"> 
        <label for="email">Email</label>
    </div>
 
    <div class="form-floating mt-3 mb-3">
        <input type="password" class="form-control" id="pswd" placeholder="" name="pswd">
        <label for="pswd">Password</label>
    </div>
    <button type="submit" class="btn btn-secondary">Přihlášení</button>
</div>';


echo form_close();
?>


<?= $this->endSection();?>