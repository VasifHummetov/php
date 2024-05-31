<?php
    require_once 'includes/header.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // validasiya

        $data = $_POST;

        $imageName = $_FILES['image']['name'];

        $directory = APP_DIRECTORY. "/uploads/".$imageName;

        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            move_uploaded_file($_FILES['image']['tmp_name'], $directory);
        }

        $data = array_merge($data, ['image' => $imageName]);

        $result = create('products', $data);

        if ($result) {
            header('Location: index.php');
            die;
        } else {
            echo "Resource not created";
        }
    }

?>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image">
        <input type="text" name="title">
        <input type="text" name="price">
        <textarea name="description"></textarea>
        <input type="submit">
    </form>


<?php

require_once 'includes/footer.php';

?>