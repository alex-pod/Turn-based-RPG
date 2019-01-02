<?php
/**
 * author: Alexander Podybailo
 * email: ninjootsu@gmail.com
 * date: 1/2/19
 */
declare(strict_types=1);

namespace app\services;

use app\models\AbstractConstruction;
use app\models\Base;
use app\models\Map;
use app\models\Tile;

class ConstructionGenerator
{
    /**
     * Initialization of a constructions.
     *
     * @param int $amount
     * @param Map $map
     */
    public function generateConstructions(int $amount, Map $map): void
    {
        for ($i = 0; $i < $amount; $i++) {
            /* @var $tile Tile */
            $tile = $map->getMap()[rand(1, $map->getWidth())][rand(1, $map->getHeight())];
            $construction = new Base();
            if (!$tile->isAnythingLocated()) {
                if (!in_array($tile->getType(), $construction::UNREACHABLE_TERRAIN)) {
                    $tile->setLocatedConstruction($construction);
                } else {
                    $this->setAtFreeTile($construction, $map);
                }
            }
        }
    }

    /**
     * Try to find a free tile and set construction there.
     *
     * @param AbstractConstruction $construction
     * @param Map $map
     */
    private function setAtFreeTile(AbstractConstruction $construction, Map $map): void
    {
        $reachableTypes = array_diff(Tile::TERRAIN_LIST, $construction::UNREACHABLE_TERRAIN);
        if ($reachableTypes) {
            $randomIndex = array_rand($reachableTypes);
            $tile = $map->getFreeTileByType($reachableTypes[$randomIndex]);
            if ($tile) {
                $tile->setLocatedConstruction($construction);
            }
        }
    }
}