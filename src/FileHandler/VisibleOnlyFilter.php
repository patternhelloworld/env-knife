<?php


namespace Arwg\EnvKnife\FileHandler;


class VisibleOnlyFilter extends \RecursiveFilterIterator
{
    public function accept()
    {
        $fileName = $this->getInnerIterator()->current()->getFileName();
        $firstChar = $fileName[0];
        return $firstChar !== '.';
    }
}