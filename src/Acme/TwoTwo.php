<?php namespace Acme;

class TwoTwo extends LinkedList
{
    public function nthFromLast($n) {
        $target = $this->size - $n - 1;

        return $this->get($target);
    }
}
