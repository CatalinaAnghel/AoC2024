<?php

namespace AdventOfCode2024\Day1;

use AdventOfCode2024\Helper\FileReader;

class Part2 extends AbstractSolution
{
    public function solve(): int
    {
        $similarityScores = [];
        
        
        array_multisort($this->firstList);
        array_multisort($this->secondList);

        foreach ($this->firstList as $value) {
            $appearances = array_filter($this->secondList, function($element) use($value){
                return $element === $value;
            });

            $similarityScores[] = $value * count($appearances);
        }

        return array_sum($similarityScores);
    }
}