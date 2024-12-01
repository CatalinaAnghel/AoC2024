<?php

namespace AdventOfCode2024\Day1;

use AdventOfCode2024\Helper\FileReader;

abstract class AbstractSolution
{
    public const INPUT_FILE_PATH = 'day1/';

    /**
     * 
     * @param string $fileName
     * @param int[] $firstList
     * @param int[] $secondList
     */
    public function __construct(
        private string $fileName, 
        protected array $firstList = [], 
        protected array $secondList = []
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
        foreach ($content as $line) {
            preg_match_all('#[0-9]+#', $line, $matches);
            
            foreach ($matches as $match) {
                $this->firstList[] = (int) $match[0];
                $this->secondList[] = (int) $match[1];
            }
        }

        array_multisort($this->firstList);
        array_multisort($this->secondList);
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