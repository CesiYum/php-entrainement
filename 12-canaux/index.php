<?php
declare(strict_types=1);
interface Notifier { public function send(string $message): string; }

class EmailNotifier implements Notifier {
    public function send(string $message): string {
        return "Email: $message";
    }
}

class ConsoleNotifier implements Notifier {
    public function send(string $message): string {
        return "Console: $message";
    }
}

function announce(Notifier $notifier): void {
    echo $notifier->send('Coucou tout le monde :D'), "\n";
}

announce(new EmailNotifier());
announce(new ConsoleNotifier());