<?php

require_once 'includes/header.php';


$sql = "SELECT * FROM products";

$search = $_GET["search"];

$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

if (empty($start_date) || empty($end_date) && strlen($search) > 0) {
    $sql .= " WHERE 
             `title` LIKE '%$search%' 
            OR 
             `description` LIKE '%$search%'";
} elseif (!empty($start_date) && !empty($end_date) && strlen($search) == 0) {
    $sql .= " WHERE `created_at` BETWEEN '$start_date' AND '$end_date'";
} elseif (!empty($start_date) && !empty($end_date) && strlen($search) > 0) {
    $sql .= " WHERE 
                `title` LIKE '%$search%' 
                OR 
                `description` LIKE '%$search%'
                AND 
                `created_at` BETWEEN '$start_date' AND '$end_date'";
}

$result = mysqli_query($connection, $sql);

$products = [];

while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}


?>

<form action="search.php" method="GET">

    <label for="">
        Start Date
        <input type="date" name="start_date">
    </label>
    <label for="">
        End_date
        <input type="date" name="end_date">
    </label>

    <input type="search" name="search">

    <input type="submit">
</form>

<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>IMAGE</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>CREATED AT</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><img src="<?= APP_URL . '/uploads/' . $product['image'] ?>" alt="" width="100"></td>
            <td><?= $product['title'] ?></td>
            <td><?= $product['description'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['created_at'] ?></td>
            <td>
                <a href="update.php?id=<?= $product['id'] ?>">Update</a>
                <a href="delete.php?id=<?=$product['id']?>">DELETE</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>



<?php
require_once 'includes/footer.php';
?>
