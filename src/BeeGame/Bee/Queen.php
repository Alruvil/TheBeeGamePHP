<?php
namespace BeeGame\Bee;

use BeeGame\Bee;

/**
 * Class Queen
 * She starts with 100 hit points and loses 8 hit points every time she gets hit.
 * If she dies the hive will die and the game reset
 * @package BeeGame\Bee
 */
final class Queen extends Bee
{
  /**
   * Queen constructor.
   * @param null $hitPoints
   */
  public function __construct($hitPoints = null)
  {
    $this->name = 'Queen';
    $this->hitPoints = 100;
    $this->hitLose = 8;
    parent::__construct($hitPoints);
  }

  /**
   * {@inheritdoc}
   */
  public function isQueen() : bool
  {
   return true;
  }
}