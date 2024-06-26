<?php

require_once 'helpers.php';

$products = require_once 'db/products.php';

$languages = require_once 'config/languages.php';

$categories = require_once 'db/categories.php';

$app = require_once 'config/app.php';

$language = isset($_GET['lang']) && in_array($_GET['lang'], $languages)
    ? require_once 'lang/'.$_GET['lang'].'.php'
    : require_once 'lang/'.$app['locale'].'.php';

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

        .product h1 {
            margin-left: 10px;
        }

        .product p {
            margin-left: 10px;
            width: 150px;
            height: 25px;
            border: 1px solid #20af99;
            text-align: center;
        }
        .product p a {
            text-decoration: none !important;
            font-size: 16px;
        }

        .languages {
            display: flex;
            gap: 8px;
            justify-content: space-between;
            a {
                text-decoration: none;
                color: #32c524;
            }
        }

        .menus {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .fixed {
            position: fixed;
            bottom: 0;
            right: 0;
            padding: 10px;
            border: 1px  solid #32c524;
        }

        .login {
            margin-right: 5px;
            a {
                text-decoration: none;
                font-size: 18px;
                font-weight: 600;
            }
        }

    </style>
</head>
<body style="position:relative; height: 100vh">

<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 menus">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><?=$language['home']?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php"> <?=$language['about']?> </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="baskets.php"><b> Səbətdəki məhsul sayı: </b> (<?=count(baskets())?>)</a>
                    </li>

                    <li class="nav-item languages">
                        <a href="index.php?lang=az">az</a>
                        <a href="index.php?lang=en">en</a>
                        <a href="index.php?lang=ru">ru</a>
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

<nav class="nav">
    <?php foreach ($categories as $index => $category): ?>
        <a class="nav-link" aria-current="page" href="category.php?id=<?=$category['id']?>"><?=$category['title'] ?></a>
    <?php endforeach; ?>
</nav>

<hr>

<div class="products">
    <?php foreach ($products as $product): ?>
        <div class="product">
            <h1><?=$product['title']?></h1>
            <p><a href="add_basket.php?id=<?=$product['id']?>">Add basket</a></p>
        </div>
    <?php endforeach; ?>
</div>

<?php if (isset($_SESSION['message'])): ?>
<div class="fixed">
    <span style="color: #20af99"><?=$_SESSION['message']?></span>

    <?php unset($_SESSION['message']) ?>
</div>
<?php endif; ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
