<?php
/**
 * author: Alexander Podybailo
 * email: ninjootsu@gmail.com
 * date: 1/2/19
 */
declare(strict_types=1);

namespace app\models;

/**
 * Class Human
 * Represents human units.
 *
 * @package app\models
 */
class Human extends AbstractUnit
{
    public const TYPE_INFANTRY = 'infantry';
    public const TYPE_GRENADIER = 'grenadier';

    public const TYPES = [
        'infantry',
        'grenadier',
    ];

    public const CAN_ATTACK_LIST = [
        Human::class,
        Vehicle::class,
    ];

    public const UNREACHABLE_TERRAIN = [
        Tile::TERRAIN_SWAMP
    ];
}