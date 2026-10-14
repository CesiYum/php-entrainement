<?php
declare(strict_types=1);
function accessMessage(int $age, bool $hasTicket, bool $banned): string {
    if ($age >= 16 && $hasTicket === true && $banned === false) {
        return 'OK';
    }
    return 'NOPE';
}
echo accessMessage(17, true, false), "\n";
echo accessMessage(17, true, true), "\n";
