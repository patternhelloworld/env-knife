<?php

namespace Arwg\EnvKnife\Model;

class Result
{
    private $fileName;
    private $executedFullFunc;
    private $returnedValue;
    private $isError;
    private $error;

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param mixed $fileName
     */
    public function setFileName($fileName): void
    {
        $this->fileName = $fileName;
    }



    /**
     * @return mixed
     */
    public function getExecutedFullFunc()
    {
        return $this->executedFullFunc;
    }

    /**
     * @param mixed $executedFullFunc
     */
    public function setExecutedFullFunc($executedFullFunc): void
    {
        $this->executedFullFunc = $executedFullFunc;
    }

    /**
     * @return mixed
     */
    public function getReturnedValue()
    {
        return $this->returnedValue;
    }

    /**
     * @param mixed $returnedValue
     */
    public function setReturnedValue($returnedValue): void
    {
        $this->returnedValue = $returnedValue;
    }

    /**
     * @return mixed
     */
    public function getIsError()
    {
        return $this->isError;
    }

    /**
     * @param mixed $isError
     */
    public function setIsError($isError): void
    {
        $this->isError = $isError;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     */
    public function setError($error): void
    {
        $this->error = $error;
    }



}