<?php
declare(strict_types=1);
if (!extension_loaded('pdo_sqlite')) { echo "Activez pdo_sqlite.\n"; return; }
$games = [['Arcadia', 15], ['Orbit', 35], ['Citadel', 50]];
$minimum = 30;
$db = new PDO('sqlite::memory:', options: [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$db->exec('CREATE TABLE games (id INTEGER PRIMARY KEY, title TEXT NOT NULL, price INTEGER NOT NULL)');
$insert = $db->prepare('INSERT INTO games (title, price) VALUES (:title, :price)');
foreach ($games as [$title, $price]) $insert->execute(['title' => $title, 'price' => $price]);
$query = $db->prepare('SELECT title, price FROM games WHERE price >= :minimum ORDER BY price');
$query->execute(['minimum' => $minimum]);
foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $game) echo $game['title'], ' : ', $game['price'], " €\n";