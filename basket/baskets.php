<?php

require_once 'helpers.php';

$products = require_once 'db/products.php';

if (!check()) {
    $_SESSION['message'] = "Zəhmət olmasa giriş edin.";
    redirect('login.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BASKET</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        .products {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 5px;
        }

        .product {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 250px;
            height: 250px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        header {
            margin-bottom: 50px;
        }

        .price-item {
            margin-left: 10px;
        }

        .product h1 {
            margin-left: 10px;
        }

        .total {
            display: flex;
            justify-content: space-between;
        }

        .fixed {
            position: fixed;
            bottom: 0;
            right: 0;
        }

    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Ana səhifə</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="baskets.php"><b> Səbətdəki məhsul sayı: </b> (<?=count(baskets())?>)</a>
                    </li>

                </ul>

                <?php if (! check()): ?>
                    <div class="login">
                        <a href="login.php">Login</a>
                    </div>
                <?php else: ?>
                    <p style="margin-right: 5px;"><?= auth()['firstname'] . " " . auth()['lastname']; ?></p>
                    <div>
                        <a href="logout.php">Logout</a>
                    </div>
                <?php endif; ?>

                <form class="d-flex" role="search" action="search.php">
                    <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>

<div class="products">
    <?php if (count(baskets())):  ?>

    <?php foreach (baskets() as $product): ?>
        <div class="product">
            <h1><?=$product['title']?></h1>
            <div class="price-item">
                <p>Sayı: <?=$product['count']?></p>
                <p>Qiyməti: <?=$product['price']?></p>
                <p class="total">
                    <span><b>Total:</b> <?=($product['count'] * $product['price']) ?></span>
                    <a href="delete.php?id=<?=$product['id']?>">Delete</a>
                </p>
            </div>
        </div>
    <?php endforeach; ?>

    <?php else: ?>
        <h2>Səbət boşdur...</h2>
    <?php endif; ?>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
