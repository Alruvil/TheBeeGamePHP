<?php

namespace BeeGame;

use BeeGame\Db\SessionDb;

/**
 * Class Game
 * Controls all the basic game functionality and acts as a controller processing requests and rendering views
 * @package BeeGame
 */
class Game
{
  /** @var Hive Instance of the hive that contains all game actions and bees */
  private $hive = null;

  /** @var string Url to the view directory */
  private $viewsPath = __DIR__ . '/views/';

  /** @var string Alert to show on top of the game */
  private $alert = '';

  /**
   * Game constructor.
   * Loads the game data with the passed storage class
   */
  public function __construct()
  {
    $this->load(new SessionDb());
  }

  /**
   * Creates a new games from the given bee array
   * @param $bees
   */
  public function newGame($bees)
  {
    $this->hive = new Hive();
    foreach ($bees as $beeType => $beeAmount) {
      $beeClass = 'BeeGame\\Bee\\' . $beeType;
      if (class_exists($beeClass)) {
        for ($i = 0; $i < $beeAmount; $i++) {
          $this->hive->addBee(new $beeClass());
        }
      }
    }
  }

  /**
   * Processes the POST request and trigger actions accordingly
   */
  private function processRequest()
  {
    $this->alert = '';
    if (isset($_POST['action'])) {
      switch ($_POST['action']) {
        case 'hit':
          $this->hive->hit();
          if($this->hive->countBees() == 0) {
            $this->hive = null;
            $this->alert = 'All bees died. Game finished. Start a new one.';
          }
        break;
        case 'newGame':
          $this->newGame(
            [
              'Queen' => 1,
              'Worker' => isset($_POST['worker']) ? $_POST['worker'] : 0,
              'Drone' => isset($_POST['drone']) ? $_POST['drone'] : 0,
            ]
          );
        break;
      }
      $this->save(new SessionDb());
    }
  }

  /**
   * Render all suitable templates
   */
  private function renderTemplates()
  {
    include($this->viewsPath . 'header.php');
    echo "<h2>" . $this->alert . "</h2>";
    if (is_null($this->hive)) {
      include($this->viewsPath . 'newGame.php');
    } else {
      include($this->viewsPath . 'beeList.php');
      include($this->viewsPath . 'hitButton.php');
    }
    include($this->viewsPath . 'footer.php');
  }

  /**
   * Function used in the index file to start the game
   */
  public function start()
  {
    $this->processRequest();
    $this->renderTemplates();
  }

  /**
   * Load the game data saved in the given storage class
   * @param DbInterface $db
   */
  public function load(DbInterface $db)
  {
    if ($db->isHiveSaved()) {
      $this->hive = $db->loadHive();
    }
  }

  /**
   * Saves the game data using the given storage class
   * @param DbInterface $db
   */
  public function save(DbInterface $db)
  {
    if(is_null($this->hive)) {
      $db->destroyHive();
    } else {
      $db->saveHive($this->hive);
    }
  }
}