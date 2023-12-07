<?php

require_once __DIR__ . "/../app/Data.php";
require __DIR__ . "/../blocks/header.html";

use Api\Data;


?>

<div class="message-box">
    <form action="../index.php?id_prod=<?=$_GET['id_prod']?>" method="post" class="confirm-box">
        <h3>Удалить выбранную запись?</h3>
        <div class="btn-confirm">
            <button type="submit" class="btn-yes" name="btn_confirm">Да</button>
            <button type="submit" class="btn-no">Нет</button>
        </div>
    </form>
</div>

<?


require __DIR__ . "/../blocks/footer.html";