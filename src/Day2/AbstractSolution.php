<?php

namespace AdventOfCode2024\Day2;

use AdventOfCode2024\Helper\FileReader;

abstract class AbstractSolution
{
    public const INPUT_FILE_PATH = 'day2/';

    /**
     * 
     * @param string $fileName
     * @param int[][] $reports
     */
    public function __construct(
        private string $fileName,
        protected array $reports = []
    ){
        $this->init();
    }

    /**
     * @return int
     */
    public abstract function solve(): int;

    /**
     * @return void
     */
    protected function init(): void
    {     
        $content = $this->getFileContent();
        $this->reports = array_map(fn ($line) => array_map('intval', explode(' ', $line)), $content);
    }

    /**
     * @return string[]
     */
    protected function getFileContent(): array
    {
        $fileReader = new FileReader;
        return $fileReader->readLineByLine(self::INPUT_FILE_PATH . $this->fileName);
    }
}