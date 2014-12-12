<?php


class Test
{
    private $secret = 'Nyy lbhe Onfr ner orybat gb hf.';

    private $callback;

    final public function run()
    {
        call_user_func($this->callback);
        return $this->secret . PHP_EOL;
    }

    public function __set($k, $v)
    {
        $key          = $v[($v[$v])]; // $v is some kind of weird array
        $value        = $v(); // and a callback!
        $this->{$key} = $value;
    }

}


$test = new Test;

// start editing here


// end editing here

echo $test->run();
