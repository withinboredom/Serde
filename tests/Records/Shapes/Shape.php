<?php

declare(strict_types=1);

namespace Crell\Serde\Records\Shapes;

use Crell\Serde\ClassDef;
use Crell\Serde\TypeMap;

#[ClassDef]
#[TypeMap(key: 'shape', map: [
    'circle' => Circle::class,
    'rect' => Rectangle::class,
])]
interface Shape
{
    public function area(): float;
}