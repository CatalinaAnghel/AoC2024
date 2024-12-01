<?php

namespace AdventOfCode2024\Day1;

use AdventOfCode2024\Helper\FileReader;

class Part2
{
    public const INPUT_FILE_PATH = 'day1/';

    public function __construct(private string $fileName){}

    public function solve(): int
    {
        $firstList = [];
        $secondList = [];
        $similarityScores = [];
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

        foreach ($firstList as $value) {
            $appearances = array_filter($secondList, function($element) use($value){
                return $element === $value;
            });

            $similarityScores[] = $value * count($appearances);
        }

        return array_sum($similarityScores);
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