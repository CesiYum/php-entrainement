<?php
declare(strict_types=1);
function scores(int $count): Generator {
    for ($index = 1; $index <= $count; $index++) {
        $score = $index * 10;
        echo "Production : $score\n";
        yield $score;
    }
}
foreach (scores(3) as $score) echo "Consommation : $score\n";