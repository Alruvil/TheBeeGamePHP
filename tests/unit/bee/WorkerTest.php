<?php
declare(strict_types=1);

namespace tests\unit\bee;

use BeeGame\Bee\Worker;
use PHPUnit\Framework\TestCase;

final class WorkerTest extends TestCase
{
  public function testInitialHitpoints()
  {

    $drone = new Worker();
    $this->assertEquals($drone->getHitPoints(), 75);

  }

  public function testHit()
  {

    $drone = new Worker();
    $drone->hit();
    $this->assertEquals($drone->getHitPoints(), 75 - 10);

  }
}