<?php
//обновление данных
interface Observer
{
    public function update($temp, $humidity, $pressure);
}
//вывод информации
interface DisplayElement
{
    public function display();
}
//работа с субъектом
interface Subject
{
    public function registerObserver(Observer $ob);
    public function removeObserver(Observer $ob);
    public function notifyObserver();
}

//погода
class WeaterData implements Subject
{
    private $observers = [];
    private $temperature;
    private $humidity;
    private $pressure;

    public function registerObserver(Observer $ob)
    {
        $this->observers[] = $ob;
    }
    public function removeObserver(Observer $ob)
    {
        for($i = 0; $i < count($this->observers); $i++) {
            if($this->observers[$i] == $ob) {
                unset($this->observers[$i]);
            }
        }
    }
    public function notifyObserver()
    {
        for($i = 0; $i < count($this->observers); $i++) {
            $this->observers[$i]->update(
                $this->temperature,
                $this->humidity,
                $this->pressure
            );
        }
    }

    public function setMeasurements($temp, $humidity, $pressure)
    {
        $this->temperature = $temp;
        $this->humidity = $humidity;
        $this->pressure = $pressure;
        $this->notifyObserver();
    }
}

//Текущее состояние
class CurrentConditionsDisplay implements Observer, DisplayElement
{
    private $temperature;
    private $humidity;
    private $weather_data;

    public function __construct(Subject $weather_data)
    {
        $this->weather_data = $weather_data;
        $weather_data->registerObserver($this);
    }

    public function update($temp, $humidity, $pressure)
    {
        $this->temperature = $temp;
        $this->humidity = $humidity;
        $this->display();
    }

    public function display()
    {
        echo 'Current: '.$this->temperature.' '.$this->humidity.'<br>';
    }
}

//статистика
class StaticDisplay implements Observer, DisplayElement
{
    private $temperature;
    private $humidity;
    private $weather_data;

    public function __construct(Subject $weather_data)
    {
        $this->weather_data = $weather_data;
        $weather_data->registerObserver($this);
    }

    public function update($temp, $humidity, $pressure)
    {
        $this->temperature = $temp;
        $this->humidity = $humidity;
        $this->display();
    }

    public function display()
    {
        echo 'Static: '.$this->temperature.' '.$this->humidity.'<br>';
    }
}
class HeatIndex implements Observer, DisplayElement
{
    private $temperature;
    private $humidity;
    private $weather_data;

    public function __construct(Subject $weather_data)
    {
        $this->weather_data = $weather_data;
        $weather_data->registerObserver($this);
    }

    public function update($temp, $humidity, $pressure)
    {
        $this->temperature = $temp;
        $this->humidity = $humidity;
        $this->display();
    }

    public function display()
    {
        echo 'Heat Index: '.$this->temperature*5/$this->humidity.'<br>';
    }
}

$weather_data = new WeaterData();
$current_condition = new CurrentConditionsDisplay($weather_data);
$static_display = new StaticDisplay($weather_data);
$heat_index = new HeatIndex($weather_data);

$weather_data->setMeasurements(100,100,100);
echo '<br>';
$weather_data->setMeasurements(200,200,200);
?>