<?php

declare(strict_types=1);

namespace App\Entity\Enum;


enum NiveauRecettesEnums: string
{
    case FACILE = 'Facile';
    case INTERMEDIAIRE = 'Intermédiaire';
    case DIFFICILE = 'Difficile';
}
?>