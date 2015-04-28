<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TwoOneSpec extends ObjectBehavior
{
    public function it_removes_duplicates_from_linked_list()
    {
        $this->add('Testing');
        $this->add('Testing');
        $this->add('1');
        $this->add('2');

        $this->deDuplicate();

        $this->toArray()->shouldReturn(['Testing', '1', '2']);
    }
}
