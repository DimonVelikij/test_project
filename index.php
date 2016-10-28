<?php
	abstract class Duck
	{

		public function swim()
		{
			echo 'swim';
		}

		abstract public function display();
	}

	interface Flyable
	{
		public function fly();
	}

	interface Quackable
	{
		public function quack();
	}

	class MallardDuck extends Duck implements Flyable, Quackable
	{
		public function fly()
		{
			echo 'fly';
		}

		public function quack()
		{
			echo 'quack';
		}

		public function display()
		{
			echo 'Mallard Duck';
		}
	}

	class RedheadDuck extends Duck implements Flyable, Quackable
	{
		public function fly()
		{
			echo 'fly';
		}

		public function quack()
		{
			echo 'quack';
		}

		public function display()
		{
			echo 'RedheadDuck';
		}
	}

	class RubberDuck extends Duck implements Quackable
	{
		public function quack()
		{
			echo 'quack';
		}

		public function display()
		{
			echo 'RubberDuck';
		}
	}

	class DecoyDuck extends Duck
	{
		public function display()
		{
			echo 'Decoy Duck';
		}
	}
//================
	interface FlyBehavior
	{
		public function fly();
	}
	class FlyWithWings implements FlyBehavior
	{
		public function fly()
		{
			echo 'fly';
		}
	}
	class FlyNoWay implements FlyBehavior
	{
		public function fly(){}
	}

	interface QuackBehavior
	{
		public function quack();
	}
	class Quack implements QuackBehavior
	{
		public function quack()
		{
			echo 'quack';
		}
	}
	class Squack implements QuackBehavior
	{
		public function quack()
		{
			echo 'squack';
		}
	}
	class MuteQuack implements QuackBehavior
	{
		public function quack(){}
	}

?>
