<?php
declare(strict_types=1);
$scores = [45, 0, 72, 120, 140];

foreach ($scores as $score) {
    if ($score === 0) {
        continue;
    } else {
        printf("Le score est de : %d \n", $score);
        if ($score >= 100) {
            break;
        }
    }
}
