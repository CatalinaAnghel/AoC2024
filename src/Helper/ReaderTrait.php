<?php

namespace AdventOfCode2024\Helper;

trait ReaderTrait
{
    const INPUT_FILE_PATH = './input/';
    
    /**
     * @return string[]
     */
    protected function getFileContent(): array
    {
        $fileReader = new FileReader;
        return $fileReader->readLineByLine(static::INPUT_FILE_PATH . $this->getFileName());
    }
}