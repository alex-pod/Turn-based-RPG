<?php
/**
 * author: Alexander Podybailo
 * email: ninjootsu@gmail.com
 * date: 1/2/19
 */
declare(strict_types=1);

namespace app\models;

/**
 * Class Aircraft
 * Represents flyable units.
 *
 * @package app\models
 */
class Aircraft extends AbstractUnit
{
    public const TYPE_CARRIER = 'carrier';
    public const TYPE_FIGHTER = 'fighter';
    public const TYPE_BOMBER = 'bomber';

    public const TYPES = [
        self::TYPE_CARRIER,
        self::TYPE_FIGHTER,
        self::TYPE_BOMBER,
    ];

    public const CAN_ATTACK_LIST = [
        Vehicle::class
    ];

    public const UNREACHABLE_TERRAIN = [];
}