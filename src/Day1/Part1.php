<?php

namespace AdventOfCode2024\Day1;

use AdventOfCode2024\Helper\FileReader;

class Part1
{
    public const INPUT_FILE_PATH = 'day1/';

    public function __construct(private string $fileName){}

    public function solve(): int
    {
        $firstList = [];
        $secondList = [];
        $differences = [];
        $content = $this->getFileContent();
        foreach ($content as $line) {
            preg_match_all('#[0-9]+#', $line, $matches);
            foreach ($matches as $match) {
                $firstList[] = (int) $match[0];
                $secondList[] = (int) $match[1];
            }
        }
        
        array_multisort($firstList);
        array_multisort($secondList);

        foreach ($firstList as $key => $value) {
            $differences[] = abs($firstList[$key] - $secondList[$key]);
        }

        return array_sum($differences);
    }

    /**
     * @return string[]
     */
    private function getFileContent(): array
    {
        $fileReader = new FileReader;
        return $fileReader->readLineByLine(self::INPUT_FILE_PATH . $this->fileName);
    }
}