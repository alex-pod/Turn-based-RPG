<?php
/**
 * author: Alexander Podybailo
 * email: ninjootsu@gmail.com
 * date: 1/2/19
 */
declare(strict_types=1);

namespace app\models;

class Base extends AbstractConstruction
{
    public const UNREACHABLE_TERRAIN = [
        Tile::TERRAIN_WATER,
        Tile::TERRAIN_ROCK,
        Tile::TERRAIN_SWAMP,
    ];
}