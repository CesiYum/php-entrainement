<?php
declare(strict_types=1);
$settings = ['player' => 'Nova', 'theme' => 'dark'];
$path = tempnam(sys_get_temp_dir(), 'php-ex-');
if ($path === false) {
    throw new RuntimeException('Fichier temporaire indisponible');
}
try {
    $json = json_encode($settings, JSON_THROW_ON_ERROR);
    if (file_put_contents($path, $json) === false) {
        throw new RuntimeException('Écriture impossible');
    }
    $content = file_get_contents($path);
    if ($content === false) {
        throw new RuntimeException('Lecture impossible');
    }
    $loaded = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
    echo $loaded['player'], ' / ', $loaded['theme'], "\n";
}catch (JsonException $e) {
    var_dump($e->getMessage());
} finally {
    unlink($path);
}