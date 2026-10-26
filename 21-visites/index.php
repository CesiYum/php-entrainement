<?php
declare(strict_types=1);
session_start(['cookie_httponly' => true, 'cookie_samesite' => 'Lax']);
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $_SESSION['visits'] = 0;
    $_SESSION['just_reset'] = true;
    header('Location: ' . ($_SERVER['SCRIPT_NAME'] ?? '/'), true, 303);
    exit;
}
if (!empty($_SESSION['just_reset'])) {
    unset($_SESSION['just_reset']);
} else {
    $_SESSION['visits'] = (int) ($_SESSION['visits'] ?? 0) + 1;
}
?><!doctype html><html lang="fr"><meta charset="utf-8"><title>Visites</title>
<h1>Visites : <?= $_SESSION['visits'] ?></h1><form method="post"><button>Remettre à zéro</button></form></html>