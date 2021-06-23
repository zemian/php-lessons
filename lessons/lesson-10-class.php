<?php

class SimpleClass {
    private $foo; // access visibility on property is a MUST

    public function __construct($init_foo = 'Foo') {
        $this->foo = $init_foo;
    }

    function showVar() {
        echo $this->foo;
    }

    static function util() {
        echo "I am a utils";
    }
}
$bar = new SimpleClass();
$bar->showVar();
SimpleClass::util();

class ExtendClass extends SimpleClass {
    function xShowVar() {
        echo "I can call parent method!";
        parent::showVar();
    }
}
$baz = new ExtendClass();
$baz->showVar();
$baz->xShowVar();

// Plain anonymous object
$obj = new stdClass();
$obj->foo = 'Bar';
var_dump($obj);

echo json_encode(new stdClass());
echo json_encode($obj);
echo json_encode(array());
echo json_encode(array('foo' => 'Bar'));

$array = (array) $obj;
$obj2 = (object) $array;
