<?php
declare(strict_types=1);

namespace tests\unit;

use BeeGame\Bee\Queen;
use BeeGame\Bee\Drone;
use BeeGame\Bee\Worker;
use BeeGame\Hive;
use PHPUnit\Framework\TestCase;

final class HiveTest extends TestCase
{
  public function testQueenDead()
  {
    $hive = new Hive();
    $hive
      ->addBee(new Queen())
      ->addBee(new Worker())
      ->addBee(new Drone());

    $this->assertEquals($hive->countBees(), 3);

    $hits = 0;
    while($hive->countBees() > 0) {
      $hits++;
      $hive->hitBee(0);
    }

    $this->assertEquals($hive->countBees(), 0);
    $this->assertEquals($hits, ceil(100/8));

  }
}