<?php

namespace Arwg\EnvKnife;

use Arwg\EnvKnife\Model\Result;
use Arwg\EnvKnife\Parser\Parser;
use Arwg\EnvKnife\FileHandler\SourceFileHandler;

class EnvKnife
{
    private $results = [];

    public function __construct()
    {

    }


    public function getAllResults(bool $onlyError = false) : array
    {
        return $this->results;

    }

    public function getErrorResults() : array
    {
        return array_filter($this->results,  function ($result) {
            if($result->getIsError()){
                return $result;
            }
        });

    }

    public function getEmptyResults() : array
    {
        return array_filter($this->results,  function ($result) {
            if(empty($result->getReturnedValue())){
                return $result;
            }
        });

    }


    public function parseResults(string $funcName, $rootPath = null, $targetedFolders = null) : void
    {
        $sourceFileHandler = new SourceFileHandler($rootPath, $targetedFolders);

        $parser = new Parser(new EnvRegex($funcName));

        foreach ($sourceFileHandler->getAllFilePaths() as $fileName){

            $fullFuncAsMatches = $parser->parse($sourceFileHandler->getFileText($fileName));

            foreach ($fullFuncAsMatches as $fullFuncAsMatch){

                $returnedValue = null;

                $result = new Result();

                $result->setFileName($fileName);

                try {
                    eval(" \$returnedValue = $fullFuncAsMatch; ");
                }catch (\Exception $e){
                    $result->setIsError(true);
                    $result->setError($e);
                }

                $result->setExecutedFullFunc($fullFuncAsMatch);
                $result->setReturnedValue($returnedValue);

                array_push($this->results, $result);
            }

        }

    }

    /**
     * @return boolean
     */
    public function hasWarnings()
    {
        return !empty($this->warnings);
    }

    /**
     * @return array
     */
    public function getWarnings()
    {
        return $this->warnings;
    }

    /**
     * @return InvalidEmail|null
     */
    public function getError()
    {
        return $this->error;
    }
}
