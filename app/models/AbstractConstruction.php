<?php
/**
 * author: Alexander Podybailo
 * email: ninjootsu@gmail.com
 * date: 1/2/19
 */
declare(strict_types=1);

namespace app\models;

/**
 * Class AbstractConstruction
 * Base class for all units.
 *
 * @package app\models
 */
abstract class AbstractConstruction
{
    public const UNREACHABLE_TERRAIN = [];

    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $hp;
}