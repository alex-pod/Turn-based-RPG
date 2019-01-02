<?php
/**
 * author: Alexander Podybailo
 * email: ninjootsu@gmail.com
 * date: 1/2/19
 */
declare(strict_types=1);

namespace app\models;

/**
 * Class Map
 *
 * Represents collection of tiles.
 *
 * @package app\models
 */
class Map
{
    /** @var array */
    protected $map;
    /** @var int */
    protected $width;
    /** @var int */
    protected $height;

    /**
     * Map constructor.
     * @param $width
     * @param $height
     */
    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
        $this->init();
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * Returns map.
     *
     * @return array
     */
    public function getMap(): array
    {
        return $this->map;
    }

    /**
     * Tries to find a free tile.
     *
     * @param string $type
     * @return Tile|null
     */
    public function getFreeTileByType(string $type): ?Tile
    {
        for ($w = 1; $w <= $this->width; $w++) {
            for ($h = 1; $h <= $this->height; $h++) {
                /* @var $tile \app\models\Tile */
                $tile = $this->map[$w][$h];
                if ($tile->getType() === $type && !$tile->isAnythingLocated()) {
                    echo "found free space at $w:$h<br>";
                    return $tile;
                }
            }
        }

        return null;
    }

    /**
     * Initialization of a map.
     */
    protected function init(): void
    {
        for ($w = 1; $w <= $this->width; $w++) {
            for ($h = 1; $h <= $this->height; $h++) {
                $this->map[$w][$h] = new Tile();
            }
        }
    }

}