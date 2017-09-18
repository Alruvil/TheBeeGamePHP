<?php

namespace BeeGame;

use Doctrine\Common\Collections\ArrayCollection;

class Hive
{
  /** @var ArrayCollection */
  private $bees;

  /**
   * Hive constructor.
   */
  public function __construct()
  {
    $this->bees = new ArrayCollection();
  }

  /**
   * Adds a bee to the hive
   * @param Bee $bee
   * @return Hive
   */
  public function addBee(Bee $bee) : Hive
  {
    $this->bees->add($bee);

    return $this;
  }

  /**
   * Hits a random bee
   */
  public function hit()
  {
    $this->hitRandomBee();
  }

  /**
   * Empty the hive by deleting all bees
   */
  public function emptyHive()
  {
    $this->bees->clear();
  }

  /**
   * Returns a random bee from the Hive
   * @return Bee
   */
  public function getRandomBee() : Bee
  {
    $beeIndex = rand(0, count($this->bees) - 1);
    return $this->bees[$beeIndex];
  }

  /**
   * Hit a random bee from the Hive
   */
  public function hitRandomBee()
  {
    $bee = &$this->getRandomBee();
    $bee->hit();
    $this->checkBeeIsDead($bee);
  }

  /**
   * Hit the bee matching the given by the index
   * @param int $index
   */
  public function hitBee($index)
  {
    $bee = &$this->bees[$index];
    $bee->hit();
    $this->checkBeeIsDead($bee);
  }

  /**
   * Check if bee is dead and react to it
   * @param Bee $bee
   */
  public function checkBeeIsDead(Bee $bee)
  {
    if($bee->isDead()) {
      $this->bees->removeElement($bee);
      if($bee->isQueen()) {
        $this->emptyHive();
      }
    }
  }

  /**
   * @return ArrayCollection
   */
  public function getBees()
  {
    return $this->bees;
  }

  /**
   * Return the number of bees in the Hive
   * @return int
   */
  public function countBees()
  {
    return $this->bees->count();
  }

}