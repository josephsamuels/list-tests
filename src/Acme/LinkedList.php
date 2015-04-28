<?php namespace Acme;

class LinkedList
{
    protected $root;
    protected $size;

    public function add($value)
    {
        $this->insert($value, $this->size);
    }

    public function get($index)
    {
        return $this->findNodeByIndex($index)->getValue();
    }

    public function insert($value, $index)
    {
        if($index == 0) {
            if($this->root == null) {
                $this->root = new LinkNode($value);
            } else {
                $this->insertNewNode($value, $this->root);
            }
        } else {
            $node = $this->findNodeByIndex($index - 1);
            $this->insertNewNode($value, $node);
        }

        $this->size++;
    }

    public function remove($index)
    {
        $this->boundsCheck($index);

        $node = $this->findNodeByIndex($index - 1);
        $toRemove = $node->next;
        $node->next = $node->next->next;

        $this->size--;

        return $toRemove->getValue();
    }

    public function indexOf($value)
    {
        $node = $this->root;
        $result = -1;

        for($i = 0; $node != null; $i++) {
            if($node->getValue() == $value) {
                $result = $i;
            }

            $node = $node->next;
        }

        return $result;
    }

    public function toArray()
    {
        $array = [];
        $node = $this->root;

        for($i = 0; $node != null; $i++) {
            $array[] = $node->getValue();
            $node = $node->next;
        }

        return $array;
    }

    /**
     * @param   int     $index
     */
    private function boundsCheck($index)
    {
        if ($index < 0 || $index > $this->size - 1)
            throw new \OutOfBoundsException;
    }

    /**
     * @param   int     $index
     * @return  mixed
     */
    private function findNodeByIndex($index)
    {
        $this->boundsCheck($index);

        $node = $this->root;

        for ($i = 0; $i < $index; $i++) {
            $node = $node->next;
        }

        return $node;
    }

    /**
     * @param   mixed     $value
     * @param   LinkNode  $node
     */
    private function insertNewNode($value, LinkNode $node)
    {
        $newNode = new LinkNode($value);
        $newNode->next = $node->next;
        $node->next = $newNode;
    }
}

class LinkNode
{
    private $value;
    public $next;

    /**
     * @param   mixed   $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return  mixed
     */
    public function getValue()
    {
        return $this->value;
    }

}
