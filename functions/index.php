<?php


// PHP-də funksiya yaratmaq üçün function açar sözündən istifadə edilir.

function withOutParameter()
{
    return "Hello";
}

echo withOutParameter(); // nəticə Hello

// Funksiyalar muxtelif sayda parametr qebul edir...

function withParameter($firstname, $lastname)
{
    return $firstname . " " . $lastname;
}

echo withParameter('Vasif', 'Hummetov'); // nəticə Vasif Hummetov

// Funksiyalara default deyerler atamaq

function withDefaultParameter($firstname, $lastname = "Eliyev")
{
    return $firstname . " " . $lastname;
}

echo withDefaultParameter('Davud'); //  $lastname gondermeyende Davud Eliyev
echo withDefaultParameter('Tural', 'Ehmedov'); // $lastname gonderende  Tural Ehmedov


/*
 * callback functions
 *
 * Bu numunede functiona ad vermeyeceyik
 *
 */

$users = function () {
      return "Users";
}; // noqteli vergul mutleq qoyulmalidir!

echo $users(); // bu formada cagirilir. variable adi ne qoyulubsa onu yazib ve qarsina () bu simvolu qoyuruq

