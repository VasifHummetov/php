<?php

require_once 'helpers.php';

if (check()) {
    redirect('index.php');
}

$products = require_once 'db/products.php';

$languages = require_once 'config/languages.php';

$app = require_once 'config/app.php';

$language = isset($_GET['lang']) && in_array($_GET['lang'], $languages)
    ? require_once 'lang/'.$_GET['lang'].'.php'
    : require_once 'lang/'.$app['locale'].'.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = require_once 'db/users.php';

    $user = array_filter($users, function ($user) {
        if ($user['email'] == trim($_POST['email']) && $user['password'] == $_POST['password']) {
            return $user;
        }
    });

    if (count($user)) {
        $user = array_values($user);

        $_SESSION['id'] = $user[0]['id'];
    } else {
        $_SESSION['message'] = "Məlumatları düzgün daxil edin.";

        header('Location: login.php');
        die;
    }

    header('Location: index.php');
    die;
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
            bottom: 20px;
            right: 20px;
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

<div class="container">

    <form action="login.php" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
            <input class="form-control" name="password" placeholder="************"  id="exampleFormControlTextarea1" >
        </div>
        <input type="submit" class="btn btn-primary" value="Daxil ol">

    </form>
    
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
