<?php
namespace BeeGame\Db;

session_start();
use BeeGame\DbInterface;
use BeeGame\Hive;

class SessionDb implements DbInterface
{
  /** @var string The session key used to save the bees */
  private $sessionVariable = 'BeeGame_bees';

  /**
   * {@inheritdoc}
   */
  public function isHiveSaved() : bool
  {
    return isset($_SESSION[$this->sessionVariable]);
  }

  /**
   * {@inheritdoc}
   */
  public function loadHive() : Hive
  {
    if(isset($_SESSION[$this->sessionVariable])) {
      $bees = $_SESSION[$this->sessionVariable];
      $hive = new Hive();
      foreach($bees as $bee) {
        $beeClass = $bee['type'];
        if(class_exists($beeClass)) {
          $hive->addBee(new $beeClass($bee['hitPoints']));
        }
      }
    } else {
      throw new \Exception('There is no hive in session');
    }

    return $hive;
  }

  /**
   * {@inheritdoc}
   */
  public function saveHive(Hive $hive)
  {
    $bees = $hive->getBees();
    $beeArray = [];
    foreach($bees as $bee) {
      $beeArray[] = [
        'type' => get_class($bee),
        'hitPoints' => $bee->getHitPoints(),
      ];
    }
    $_SESSION[$this->sessionVariable] = $beeArray;
  }

  /**
   * {@inheritdoc}
   */
  public function destroyHive()
  {
    unset($_SESSION[$this->sessionVariable]);
  }
}