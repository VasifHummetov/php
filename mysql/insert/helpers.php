<?php

/**
 * @param string $table
 * @param array $data
 * @return bool
 */
function create(string $table, array $data): bool
{
    global $connection;

    $columns = $values = "";

    foreach ($data as $column => $value) {
        $columns .= "`" . $column . "`,";
        $values .= "'" . htmlspecialchars($value) . "',";
    }

    $columns = rtrim($columns, ',');
    $values = rtrim($values, ',');

    $sql = "INSERT INTO $table ($columns) VALUES ($values)";

    $query = mysqli_query($connection, $sql);

    if ($query) {
        return true;
    }

    return false;

}

function first(string $table, int $id)
{
    global $connection;

    $id = $_SESSION['id'];

    $sql = "SELECT * FROM $table WHERE id=$id LIMIT 1";

    $query = mysqli_query($connection, $sql);

    $user = mysqli_fetch_assoc($query);
    return $user;
}


/**
 * @param string $table
 * @param array $resource
 * @param array $data
 * @return bool
 */
function update(string $table, array $data, array $condition = []): bool
{
    global $connection;

    $columns = $where = "";

    foreach ($data as $column => $value) {
        $columns .= "$column='$value',";
    }

//    foreach ($data as $column => $value) {
//        $colums[] = "`$column`=$value";
//    }
//
//    $data = implode(',', $colums);
//
//    var_dump($data);
//    die;

   $columns = trim($columns, ',');

    if (count($condition) > 0) {

        foreach ($condition as $column => $value) {
            $where .= "`$column`='$value' AND ";
        }

        $where = trim($where, ' AND');

        $sql = "UPDATE $table SET $columns WHERE $where";
    } else {
        $sql = "UPDATE $table SET $columns";
    }

    return mysqli_query($connection, $sql);
}