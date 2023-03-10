<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function esUltimo(string $actual, string $proximo): bool{
    if ($actual !== $proximo) {
        return true;
    }else{
        return false;
    }
}

//Funcion que revisa que el usuario este autenticado

function isAuth() : void {
    if(!isset($_SESSION['login'])) {
        header('Location: /');
    }
}

//Para proteger panel de administracion
//Void significa que no retorna nada
function isAdmin(): void {
    if (!isset($_SESSION['admin'])) {
        header('Location: /');
    }

}

function iniciaSesion(){
    if(!isset($_SESSION)){       
    session_start();
  }
 }