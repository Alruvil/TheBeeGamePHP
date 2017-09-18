<?php

namespace BeeGame;

/**
 * Class Bee
 * Contains the basic properties and methods for Bees
 * @package BeeGame
 */
abstract class Bee
{
  /** @var string Name/Type of Bee, to be used in templates */
  protected $name;
  /** @var int The current hit points of the Bee */
  protected $hitPoints;
  /** @var int The number of hit points to lose when Bee gets hit */
  protected $hitLose;

  /**
   * Bee constructor.
   * @param null $hitPoints
   */
  public function __construct($hitPoints = null)
  {
    if (!is_null($hitPoints)) {
      $this->hitPoints = $hitPoints;
    }
  }

  /**
   * Reduce hit points of the bee based in the hit lose amount
   * @return Bee
   */
  public function hit(): Bee
  {
    $this->hitPoints -= $this->hitLose;

    return $this;
  }

  /**
   * Checks if the bee lost all hit points
   * @return bool
   */
  public function isDead(): bool
  {
    return $this->hitPoints <= 0;
  }

  /**
   * Return the current Bee hit points
   * @return int
   */
  public function getHitPoints(): int
  {
    return $this->hitPoints;
  }

  /**
   * Return the current Bee hit points
   * @return int
   */
  public function getHitLose(): int
  {
    return $this->hitLose;
  }

  /**
   * Return the name of the Bee
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * Returns if the bee is a queen
   * @return bool
   */
  public function isQueen()
  {
    return false;
  }
}