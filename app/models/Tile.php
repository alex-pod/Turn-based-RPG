<?php
/**
 * author: Alexander Podybailo
 * email: ninjootsu@gmail.com
 * date: 1/2/19
 */
declare(strict_types=1);

namespace app\models;

/**
 * Class Tile
 *
 * Represents single tile.
 *
 * @package app\models
 */
class Tile
{
    public const TERRAIN_ROCK = 'rock';
    public const TERRAIN_WATER = 'water';
    public const TERRAIN_SWAMP = 'swamp';
    public const TERRAIN_FIELD = 'field';

    public const TERRAIN_LIST = [
        self::TERRAIN_ROCK,
        self::TERRAIN_WATER,
        self::TERRAIN_SWAMP,
        self::TERRAIN_FIELD,
    ];

    /** @var string */
    private $type;
    /** @var AbstractUnit|null */
    private $locatedUnit = null;
    /** @var AbstractConstruction|null */
    private $locatedConstruction = null;

    /**
     * Tile constructor.
     */
    public function __construct()
    {
        $this->type = self::TERRAIN_LIST[array_rand(self::TERRAIN_LIST)];
    }

    /**
     * Setter for a tile type.
     *
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * Getter for a tile type.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Add unit to a tile.
     *
     * @param AbstractUnit $unit
     */
    public function setLocatedUnit(AbstractUnit $unit): void
    {
        $this->locatedUnit = $unit;
    }

    /**
     * Remove unit from a tile.
     */
    public function removeLocatedUnit(): void
    {
        $this->locatedUnit = null;
    }

    /**
     * Get located unit at a tile or null.
     *
     * @return AbstractUnit|null
     */
    public function getLocatedUnit(): ?AbstractUnit
    {
        return $this->locatedUnit;
    }

    /**
     * Add construction to a tile.
     *
     * @param AbstractConstruction $construction
     */
    public function setLocatedConstruction(AbstractConstruction $construction): void
    {
        $this->locatedConstruction = $construction;
    }

    /**
     * Remove construction from a tile.
     */
    public function removeLocatedConstruction(): void
    {
        $this->locatedConstruction = null;
    }

    /**
     * Get located construction at a tile or null.
     *
     * @return AbstractConstruction|null
     */
    public function getLocatedConstruction(): ?AbstractConstruction
    {
        return $this->locatedConstruction;
    }

    /**
     * Checks if tile has located unit or construction.
     *
     * @return bool
     */
    public function isAnythingLocated(): bool
    {
        return $this->locatedUnit || $this->locatedConstruction;
    }
}