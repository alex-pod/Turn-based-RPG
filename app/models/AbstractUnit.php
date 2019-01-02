<?php
/**
 * author: Alexander Podybailo
 * email: ninjootsu@gmail.com
 * date: 1/2/19
 */
declare(strict_types = 1);

namespace app\models;

use Faker\Factory;

/**
 * Class AbstractUnit
 * Base class for all units.
 *
 * @package app\models
 */
abstract class AbstractUnit
{
    public const CAN_ATTACK_LIST = [];
    public const UNREACHABLE_TERRAIN = [];
    public const TYPES = [];

    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var int
     */
    protected $steps;
    /**
     * @var int
     */
    protected $hp;
    /**
     * @var int
     */
    protected $attackPower;

    /**
     * Returns unit's id.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getSteps(): int
    {
        return $this->steps;
    }

    /**
     * @param int $steps
     */
    public function setSteps(int $steps): void
    {
        $this->steps = $steps;
    }

    /**
     * @return int
     */
    public function getHp(): int
    {
        return $this->hp;
    }

    /**
     * @param int $hp
     */
    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }

    /**
     * @return int
     */
    public function getAttackPower(): int
    {
        return $this->attackPower;
    }

    /**
     * @param int $attackPower
     */
    public function setAttackPower(int $attackPower): void
    {
        $this->attackPower = $attackPower;
    }

    /**
     * Method which implements ability to attack units each other.
     *
     * @param AbstractUnit $attackedUnit
     * @throws \Exception
     */
    public function attack(AbstractUnit $attackedUnit): void
    {
        if (!in_array(get_class($attackedUnit), self::CAN_ATTACK_LIST)) {
            throw new \Exception("Unit can't attack this class.");
        }

        // TODO: implement attack functional.
    }

    /**
     * Randomly populates a unit model.
     */
    public function populateRandomly(): void
    {
        $faker = Factory::create();
        $this->setId($faker->randomNumber());
        $this->setName($faker->word);
        $this->setType(static::TYPES[array_rand(static::TYPES)]);
        $this->setSteps($faker->numberBetween(1, 10));
        $this->sethp($faker->numberBetween(20, 200));
        $this->setAttackPower($faker->numberBetween(5, 50));
    }
}