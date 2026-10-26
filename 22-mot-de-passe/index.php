<?php
declare(strict_types=1);
$input = '<script>alert(1)</script>';
$hash = password_hash('mot de passe de démonstration', PASSWORD_DEFAULT);
$valid = password_verify('mot de passe de démonstration', $hash);
$invalid = password_verify('erreur', $hash);
function escape(string $value): string { return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
?><!doctype html><html lang="fr"><meta charset="utf-8"><title>Sécurité</title>
<p>Bonne tentative : <?= $valid ? 'oui' : 'non' ?></p>
<p>Mauvaise tentative : <?= $invalid ? 'oui' : 'non' ?></p>
<p>Texte externe : <?= escape($input) ?></p></html>