<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TwoTwoSpec extends ObjectBehavior
{
    function it_gets_nth_from_last()
    {
        $this->add('Hello');
        $this->add('there');
        $this->add('mister');
        $this->add('Bond');

        $this->nthFromLast(2)->shouldReturn('there');
    }
}
