<?php
declare(strict_types=1);

namespace tests\unit\bee;

use BeeGame\Bee\Queen;
use PHPUnit\Framework\TestCase;

final class QueenTest extends TestCase
{
  public function testInitialHitpoints()
  {

    $drone = new Queen();
    $this->assertEquals($drone->getHitPoints(), 100);

  }

  public function testHit()
  {

    $drone = new Queen();
    $drone->hit();
    $this->assertEquals($drone->getHitPoints(), 100 - 8);

  }
}