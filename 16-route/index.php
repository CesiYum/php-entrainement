<?php
declare(strict_types=1);
// TODO : #[Attribute], classe contrôleur et réflexion.

#[Attribute(Attribute::TARGET_METHOD)]
class Route { public function __construct(public string $path) {} }

class PageController {
    #[Route('/')]
    public function home(): string { return 'Accueil'; }
    #[Route('/about')]
    public function about(): string { return 'À propos'; }
}

foreach ((new ReflectionClass(PageController::class))->getMethods() as $method) {
    foreach ($method->getAttributes(Route::class) as $attribute) {
        $route = $attribute->newInstance();
        echo $route->path, ' → ', $method->getName(), "\n";
    }
}