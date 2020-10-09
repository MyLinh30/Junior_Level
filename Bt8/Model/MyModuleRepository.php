<?php


namespace Magenest\Bt8\Model;


use Magenest\Bt8\Api\MyInterface;

class MyModuleRepository implements MyInterface
{

    public function foo()
    {
        echo "Foo";
    }
}
