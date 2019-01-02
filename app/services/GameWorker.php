<?php
/**
 * author: Alexander Podybailo
 * email: ninjootsu@gmail.com
 * date: 1/2/19
 */
declare(strict_types=1);

namespace app\services;

use app\models\Map;
use Exception;

/**
 * Class GameWorker
 * Core class which invokes in-game services.
 *
 * @package app\services
 */
class GameWorker
{
    /**
     * Runs the game.
     * This is the main entrance of an application.
     *
     * @param array $config
     */
    public function run(array $config = []): void
    {
        $amountOfUnits = $config['amountOfUnits'] ?? 2;
        $amountOfConstructions = $config['amountOfConstructions'] ?? 2;
        $mapHeight = $config['mapHeight'] ?? 4;
        $mapWidth = $config['mapWidth'] ?? 4;

        $map = new Map($mapWidth, $mapHeight);
        $constructionGenerator = new ConstructionGenerator();
        $unitGenerator = new UnitGenerator();

        $constructionGenerator->generateConstructions($amountOfConstructions, $map);
        $unitGenerator->generateUnits($amountOfUnits, $map);

        try {
            echo '<pre>';
            print_r($map->getMap());
            echo '</pre>';
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}