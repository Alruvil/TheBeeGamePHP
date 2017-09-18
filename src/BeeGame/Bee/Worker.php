<?php
namespace BeeGame\Bee;

use BeeGame\Bee;

/**
 * Class Worker
 * It starts with 75 hit points and loses 10 hit points every time it gets hit.
 * @package BeeGame\Bee
 */
final class Worker extends Bee
{
  /**
   * Worker constructor.
   * @param null $hitPoints
   */
  public function __construct($hitPoints = null)
  {
    $this->name = 'Worker';
    $this->hitPoints = 75;
    $this->hitLose = 10;
    parent::__construct($hitPoints);
  }
}