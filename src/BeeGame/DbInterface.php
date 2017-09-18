<?php

namespace BeeGame;

/**
 * Interface DbInterface
 * The minimum methods to manage Hives with different storage types
 * @package BeeGame
 */
interface DbInterface
{
  /**
   * Load Hive data from the storage type
   * @return Hive The Hive loaded from memory
   * @throws \Exception if there is no saved hive in session
   */
  public function loadHive() : Hive;

  /**
   * Check if there is a Hive saved in the storage type
   * @return bool The hive exists in memory?
   */
  public function isHiveSaved() : bool;

  /**
   * Saves the Hive in the storage type
   * @param Hive $hive The Hive to save
   */
  public function saveHive(Hive $hive);

  /**
   * Deletes the hive from the storage type
   */
  public function destroyHive();
}