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

/**
 * @param string $table
 * @param array $conditions
 * @return bool|array|null
 */
function first(string $table, array $conditions): bool|array|null
{
    global $connection;

    $wheres = "";

    foreach ($conditions as $column => $value) {
        $wheres .= "`$column`='$value' AND";
    }

    $wheres = rtrim($wheres, ' AND');

    $sql = "SELECT * FROM $table WHERE $wheres";

    $query = mysqli_query($connection, $sql);

    return mysqli_fetch_assoc($query);
}

/**
 * @param string $table
 * @param array $conditions
 * @param array $columns
 * @return array
 */
function get(string $table, array $conditions = [], array $columns = ['*']): array
{
    // SELECT id,title, FROM table; WHERE condition

    global $connection;

    $wheres = "";

    foreach ($conditions as $column => $value) {
        $wheres .= "`$column`='$value' AND";
    }

    $wheres = rtrim($wheres, ' AND');

    $columns = implode(',', $columns);

    if (count($conditions) > 0) {
        $sql = "SELECT $columns FROM $table WHERE $wheres";
    } else {
        $sql = "SELECT $columns FROM $table";
    }

    $query = mysqli_query($connection, $sql);

    $data = [];

    if (mysqli_num_rows($query) > 0) {

       while($row = mysqli_fetch_assoc($query)) {
           $data[] = $row;
       }

       return $data;
    } else {
        return [];
    }
}




/**
 * @param string $table
 * @param array $resource
 * @param array $data
 * @return bool
 */
function update(string $table, array $data, array $condition = [], string $operator = "AND"): bool
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
            $where .= "`$column`='$value' $operator ";
        }

        $where = trim($where, " $operator");

        $sql = "UPDATE $table SET $columns WHERE $where";
    } else {
        $sql = "UPDATE $table SET $columns";
    }

    return mysqli_query($connection, $sql);
}