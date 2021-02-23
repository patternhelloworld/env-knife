<?php


namespace Arwg\EnvKnife\Parser;


class Parser extends AbstractParser
{
   private function mArrToOneArr($mMatches) : array{

       $oneArr = [];

       foreach ($mMatches as $matches){
           foreach ($matches as $match){
               array_push($oneArr, $match);
           }
       }

       return $oneArr;
   }

   public function parse(string $text) : array
   {
       preg_match_all('/' . $this->envRegex->finalRegex . '/', $text, $matches);

       return $this->mArrToOneArr($matches);

   }

}