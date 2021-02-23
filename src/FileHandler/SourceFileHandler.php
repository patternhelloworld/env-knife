<?php


namespace Arwg\EnvKnife\FileHandler;


use Arwg\EnvKnife\FileHandler\FilesOnlyFilter;
use Arwg\EnvKnife\FileHandler\VisibleOnlyFilter;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

class SourceFileHandler
{
    protected $rootPath;

    protected $targetedFolders;

    public function __construct($rootPath, $targetedFolders)
    {
        $this->rootPath = $rootPath ? $rootPath : base_path();
        $this->targetedFolders = !empty($targetedFolders) ? $targetedFolders : ['app', 'bootstrap', 'config', 'routes'];
    }

    public function setRootPath(string $rootPath): void
    {
        $this->rootPath = $rootPath;
    }

    public function setTargetedFolders(array $targetedFolders): void
    {
        $this->targetedFolders = $targetedFolders;
    }

    public function getRootPath(): string
    {
        return $this->rootPath;
    }

    public function getTargetedFolders(): array
    {
        return $this->targetedFolders;
    }

    public function getAllFilePaths(){

        $filePaths = [];

        foreach ($this->targetedFolders as $targetedFolder){

            $fileinfos = new \RecursiveIteratorIterator(
                new FilesOnlyFilter(
                    new VisibleOnlyFilter(
                        new RecursiveDirectoryIterator(
                            $this->rootPath . DIRECTORY_SEPARATOR . $targetedFolder,
                            \FilesystemIterator::SKIP_DOTS
                            | \FilesystemIterator::UNIX_PATHS
                        )
                    )
                ),
                \RecursiveIteratorIterator::LEAVES_ONLY,
                \RecursiveIteratorIterator::CATCH_GET_CHILD
            );

            foreach ($fileinfos as $pathname => $fileinfo) {
                array_push( $filePaths, $pathname);
            }

        }

        return $filePaths;

    }

    public function getFileText(string $fileName){
        return file_get_contents($fileName);
    }



}