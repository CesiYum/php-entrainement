<?php
declare(strict_types=1);

trait HasLevel {
    public function levelLabel(): string {
        return 'Niveau ' . $this->level;
    }
}

class Character {
    use HasLevel;
    public function __construct(protected string $name, protected int $level) {}
    public function describe(): string {
        return $this->name;
    }
}

class Mage extends Character {
    public function describe(): string {
        return parent::describe() . ' — mage';
    }
}

$mage = new Mage('Yaya', 7);
echo $mage->describe(), ' / ', $mage->levelLabel(), "\n";