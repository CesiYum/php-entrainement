<?php
declare(strict_types=1);
$raw = $_GET['q'] ?? '';
$query = is_string($raw) ? trim(substr($raw, 0, 80)) : '';
$method = $_SERVER['REQUEST_METHOD'] ?? 'CLI';

function escape(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

?><!doctype html>
<html lang="fr">
<meta charset="utf-8">
<title>Recherche</title>
<h1>Recherche</h1>
<form method="get"><label>Mot-clé <input name="q" value="<?= escape($query) ?>"></label>
    <button>Rechercher</button>
</form>
<p>Méthode : <?= escape($method) ?></p>
<p>Terme : <?= escape($query) ?></p>
</html>