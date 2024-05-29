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