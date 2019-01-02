<?php
/**
 * author: Alexander Podybailo
 * email: ninjootsu@gmail.com
 * date: 1/2/19
 */
declare(strict_types=1);

namespace app\services;

use app\models\AbstractUnit;
use app\models\Aircraft;
use app\models\Human;
use app\models\Map;
use app\models\Tile;
use app\models\Vehicle;

class UnitGenerator
{
    /**
     * Initialization of a units.
     *
     * @param int $amount
     * @param Map $map
     */
    public function generateUnits(int $amount, Map $map): void
    {
        for ($i = 0; $i < $amount; $i++) {
            /* @var $tile Tile */
            $tile = $map->getMap()[rand(1, $map->getWidth())][rand(1, $map->getHeight())];
            $unit = $this->getRandomUnit();
            $unit->populateRandomly();
            if (!$tile->isAnythingLocated()) {
                if (!in_array($tile->getType(), $unit::UNREACHABLE_TERRAIN)) {
                    $tile->setLocatedUnit($unit);
                } else {
                    $this->setAtFreeTile($unit, $map);
                }
            }
        }
    }

    /**
     * Get random unit.
     *
     * @return AbstractUnit
     */
    protected function getRandomUnit(): AbstractUnit
    {
        $units = [
            Vehicle::class,
            Human::class,
            Aircraft::class,
        ];

        /* @var $unit AbstractUnit */
        $unit = new $units[array_rand($units)];

        return $unit;
    }

    /**
     * Try to find a free tile and set construction there.
     *
     * @param AbstractUnit $unit
     * @param Map $map
     */
    private function setAtFreeTile(AbstractUnit $unit, Map $map): void
    {
        $reachableTypes = array_diff(Tile::TERRAIN_LIST, $unit::UNREACHABLE_TERRAIN);
        if ($reachableTypes) {
            $randomIndex = array_rand($reachableTypes);
            $tile = $map->getFreeTileByType($reachableTypes[$randomIndex]);
            if ($tile) {
                $tile->setLocatedUnit($unit);
            }
        }
    }
}