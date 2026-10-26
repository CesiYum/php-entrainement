<?php
declare(strict_types=1);

readonly class Money {
    public function __construct(public int $centimes, public string $devise = "EUR") {
        if($centimes < 0) {
            throw new InvalidArgumentException("Prix negatif");
        }
    }

    public function add(self $other): self {
        if ($this->devise !== $other->devise) {
            throw new InvalidArgumentException("Devise differente mon coco");
        }

        return new self($this->centimes + $other->centimes, $this->devise);
    }
}

$first = new Money(0);
$total = $first->add(new Money(1000));
echo $first->centimes, ' -> ', $total->centimes, "\n";