<?php namespace Acme;

class TwoOne extends LinkedList
{
    public function deDuplicate()
    {
        $temp = new TwoOne();
        $current = $this->root;

        while($current != null) {
            if($temp->indexOf($current->getValue()) < 0) {
                $temp->add($current->getValue());
            }

            $current = $current->next;
        }

        $this->root = $temp->root;
    }
}
