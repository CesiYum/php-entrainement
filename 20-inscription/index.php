<?php
declare(strict_types=1);
function escape(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
$isPost = ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';
$rawName = $_POST['name'] ?? '';
$rawEmail = $_POST['email'] ?? '';
$name = is_string($rawName) ? trim($rawName) : '';
$email = is_string($rawEmail) ? trim($rawEmail) : '';
$errors = [];
if ($isPost) {
    if ($name === '' || strlen($name) > 80) $errors[] = 'Nom requis (80 octets maximum).';
    if ($email === '' || strlen($email) > 254 || filter_var($email, FILTER_VALIDATE_EMAIL) === false) $errors[] = 'Adresse e-mail invalide.';
}
?>

<!doctype html>
<html lang="fr"><meta charset="utf-8"><title>Inscription</title>
<h1>Inscription</h1>
<?php if ($isPost && $errors === []): ?><p>Bienvenue <?= escape($name) ?> !</p><?php endif; ?>
<?php foreach ($errors as $error): ?><p><?= escape($error) ?></p><?php endforeach; ?>
<form method="post"><label>Nom <input name="name" value="<?= escape($name) ?>"></label><label>E-mail <input name="email" type="email" value="<?= escape($email) ?>"></label><button>Envoyer</button></form>
</html>