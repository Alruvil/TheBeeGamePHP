<?php
namespace BeeGame\Bee;

use BeeGame\Bee;

/**
 * Class Drone
 * It starts with 50 hit points and loses 12 hit points every time it gets hit
 * @package BeeGame\Bee
 */
final class Drone extends Bee
{
  /**
   * Drone constructor.
   * @param null $hitPoints
   */
  public function __construct($hitPoints = null)
  {
    $this->name = 'Drone';
    $this->hitPoints = 50;
    $this->hitLose = 12;
    parent::__construct($hitPoints);
  }
}