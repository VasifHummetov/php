<?php
require_once 'includes/header.php';

$products = get(table: 'products', columns: ['id', 'title', 'price', 'image', 'description', 'created_at']);

?>

<a href="create.php">Create Product</a>

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
            <td> <?=date('Y-m-d', strtotime($product['created_at']))?></td>
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
