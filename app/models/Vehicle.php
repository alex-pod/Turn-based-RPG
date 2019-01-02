<?php
/**
 * author: Alexander Podybailo
 * email: ninjootsu@gmail.com
 * date: 1/2/19
 */
declare(strict_types=1);

namespace app\models;

/**
 * Class Vehicle
 * Represents vehicle units.
 *
 * @package app\models
 */
class Vehicle extends AbstractUnit
{
    public const TYPE_TANK = 'tank';
    public const TYPE_HUMVEE = 'humvee';
    public const TYPE_APC = 'apc';

    public const TYPES = [
        self::TYPE_TANK,
        self::TYPE_HUMVEE,
        self::TYPE_APC,
    ];

    public const CAN_ATTACK_LIST = [
        Human::class,
        Vehicle::class,
    ];

    public const UNREACHABLE_TERRAIN = [
        Tile::TERRAIN_ROCK,
        Tile::TERRAIN_WATER,
    ];
}