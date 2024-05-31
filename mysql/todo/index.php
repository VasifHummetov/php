<?php
require_once 'includes/header.php';

$products = get(table: 'products', columns: ['id', 'title', 'price', 'image', 'description']);


?>

<a href="create.php">Create Product</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>IMAGE</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
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
            <td>
                <a href="update.php?id=<?= $product['id'] ?>">Update</a>
                <a href="">DELETE</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<?php
require_once 'includes/footer.php';
?>
