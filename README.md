# The Bee Game

The Bee Game exercise received in a recruitment process to develop using only PHP

> The objective of this exercise is to create a PHP application that performs the following tasks:
> * A web page must be produced as the interface to play the game. Styling is not expected
nor necessary.
> * A button must be present to kick off the process of hitting a random bee.
> * All code must be submitted to work in a local environment. Hosted solutions will be
> rejected.
> * The game must adhere to the following rules and constraints:
>   * Queen:
>     * The Queen Bee has a lifespan of 100 Hit Points.
>     * When the Queen Bee is hit, 8 Hit Points are deducted from her lifespan.
>     * If/When the Queen Bee has run out of Hit Points, All remaining alive Bees
automatically run out of hit
>   * Worker:
>     * Worker Bees have a lifespan of 75 Hit Points.
>     * When a Worker Bee is hit, 10 Hit Points are deducted from his lifespan.
>   * Drone:
>     * Drone Bees have a lifespan of 50 Hit Points.
>     * When a Drone Bee is hit, 12 Hit Points are deducted from his lifespan.
> * To play, there must be a button that enables a user to “hit” a random bee. The selection
of a bee must be random.
> * When the bees are all dead, the game must be able to reset itself with full life bees for
another round.
> * The application must run through a browse
> * Must include unit tests

This solution has the following particularities

* It uses browser Session to store the bees. An Interface is created to allow other storage methods.
* When starting a new game a form is presented to decide the number of Worker and Drone bees for the next game 

### Installing

Install dependencies with composer

```
composer install
```

All action is always over the index.php file.

## Running the tests

There are unit tests

```
phpunit
```

## Deployment

Just make sure the index.php file is loaded. All forms actions are sent to the same file.

## Versioning

Used [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/Alruvil/TheBeeGamePHP/tags). 

## Authors

* **Alejandro Ruiz** - [Alruvil](https://github.com/Alruvil)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details