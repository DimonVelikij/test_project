<?php

abstract class Duck
{
    //type interface
    public $fly;
    public $quack;

    public function setFly(Fly $fly)
    {
        $this->fly = $fly;
    }
    public function setQuack(Quack $quack)
    {
        $this->quack = $quack;
    }
    //required function
    public abstract function display();

    //implements fly()
    public function performFly()
    {
        $this->fly->fly();
    }
    //implement quack()
    public function performQuack()
    {
        $this->quack->quack();
    }
}

interface Fly
{
    public function fly();
}
class FlyYes implements Fly
{
    public function fly()
    {
        echo 'fly';
    }
}
class FlyNo implements Fly
{
    public function fly()
    {
        echo 'no fly';
    }
}

interface Quack
{
    public function quack();
}
class QuackYes implements Quack
{
    public function quack()
    {
        echo 'quack';
    }
}
class QuackNo implements Quack
{
    public function quack()
    {
        echo 'no quack';
    }
}

//MalladDuck
class MallardDuck extends Duck
{
    public function __construct(Fly $fly, Quack $quack)
    {
        $this->fly = $fly;
        $this->quack = $quack;
    }

    public function display()
    {
        echo 'mallard duck';
    }
}

class RubberDuck extends Duck
{
    
    public function __construct(Fly $fly, Quack $quack)
    {
        $this->fly = $fly;
        $this->quack = $quack;
    }

    public function display()
    {
        echo 'rubber duck';
    }
}

//object MallardDuck
$mallard_duck = new MallardDuck(new FlyNo(), new QuackNo());
$mallard_duck->performFly();
echo '<br>';
$mallard_duck->performQuack();
echo '<br>';
$mallard_duck->setFly(new FlyYes());
$mallard_duck->performFly();
echo '<br>';
$mallard_duck->setQuack(new QuackYes());
$mallard_duck->performQuack();
echo '<br>';
$mallard_duck->display();
echo '<br>';
echo '<br>';

//object RubberDuck
$rubber_duck = new RubberDuck(new FlyYes(), new QuackYes());
$rubber_duck->performFly();
echo '<br>';
$rubber_duck->performQuack();
echo '<br>';
$rubber_duck->setFly(new FlyNo());
$rubber_duck->performFly();
echo '<br>';
$rubber_duck->setQuack(new QuackNo());
$rubber_duck->performQuack();
echo '<br>';
$rubber_duck->display();
echo '<br>';

?>