<?php

require_once 'config/database.php';
require_once 'config/helpers.php';

if (isset($_GET['id'])) {
   delete('products', 'id', [$_GET['id']]);
}

header('Location: index.php');

die;