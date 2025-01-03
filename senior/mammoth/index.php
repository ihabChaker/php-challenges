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
        $key = $v[($v[$v])]; // $v is some kind of weird array
        $value = $v(); // and a callback!
        $this->{$key} = $value;
    }

}


$test = new Test;

// start editing here
class WierdArray implements ArrayAccess
{
    private Test $test;

    public function setTest($test)
    {
        $this->test = $test;
    }
    public function offsetExists(mixed $offset): bool
    {
        return true;
    }
    public function offsetGet(mixed $offset): mixed
    {
        if (gettype($offset) != "object") {
            if ($offset == "get_val")
                return "callback";
        }
        if (get_class($offset) == WierdArray::class) {
            return "get_val";
        }

        return null;
    }
    public function offsetSet(mixed $offset, mixed $value): void
    {
        echo "set";
    }
    public function offsetUnset(mixed $offset): void
    {
        echo "unset";
    }
    public function __invoke()
    {
        $callback = function () {
            $this->secret = str_rot13($this->secret);
        };
        return $callback->bindTo($this->test, $this->test);
    }
}
$v = new WierdArray();
$v->setTest($test);
$test->ccc = $v;
// end editing here

echo $test->run();

