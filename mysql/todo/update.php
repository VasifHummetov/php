<?php
require_once 'includes/header.php';

$product = first('products', ['id' => $_GET['id']]);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $update = update(table: 'products', data: $_POST, condition: ['id' => $_GET['id']]);

    if ($update) {
        header('Location: index.php');
        die;
    }
}

?>


<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="text" name="title" value="<?=$product['title']?>">
    <input type="text" name="price" value="<?=$product['price']?>">
    <textarea name="description"><?=$product['description']?></textarea>
    <input type="submit">
</form>


<?php

require_once 'includes/footer.php';

?>
