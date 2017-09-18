<?php
declare(strict_types=1);

namespace tests\unit\bee;

use BeeGame\Bee\Drone;
use PHPUnit\Framework\TestCase;

final class DroneTest extends TestCase
{
  public function testInitialHitpoints()
  {

    $drone = new Drone();
    $this->assertEquals($drone->getHitPoints(), 50);

  }

  public function testHit()
  {

    $drone = new Drone();
    $drone->hit();
    $this->assertEquals($drone->getHitPoints(), 50 - 12);

  }
}