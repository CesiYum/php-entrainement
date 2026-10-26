<?php
declare(strict_types=1);
session_start(['cookie_httponly' => true, 'cookie_samesite' => 'Lax']);
$ideas = [1 => 'Jeu coopératif', 2 => 'Carte des cafés', 3 => 'Quiz musical'];
if (!isset($_SESSION['votes']) || !is_array($_SESSION['votes'])) $_SESSION['votes'] = [1 => 0, 2 => 0, 3 => 0];
function escape(string $value): string { return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
function ranking(array $ideas, array $votes): array {
    $ids = array_keys($ideas);
    usort($ids, static fn (int $a, int $b): int => (($votes[$b] ?? 0) <=> ($votes[$a] ?? 0)) ?: ($a <=> $b));
    return $ids;
}
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $raw = $_POST['idea'] ?? null;
    $id = is_string($raw) ? filter_var($raw, FILTER_VALIDATE_INT) : false;
    if ($id !== false && array_key_exists($id, $ideas)) $_SESSION['votes'][$id] = (int) ($_SESSION['votes'][$id] ?? 0) + 1;
    header('Location: ' . ($_SERVER['SCRIPT_NAME'] ?? '/'), true, 303);
    exit;
}
$ordered = ranking($ideas, $_SESSION['votes']);
?><!doctype html><html lang="fr"><meta charset="utf-8"><title>Vote des idées</title>
<h1>Vote des idées</h1>
<?php foreach ($ordered as $id): ?>
    <article><h2><?= escape($ideas[$id]) ?></h2><p><?= (int) ($_SESSION['votes'][$id] ?? 0) ?> vote(s)</p>
        <form method="post"><input type="hidden" name="idea" value="<?= $id ?>"><button>Voter</button></form></article>
<?php endforeach; ?></html>