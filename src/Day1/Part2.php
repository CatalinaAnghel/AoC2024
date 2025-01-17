<?php

namespace AdventOfCode2024\Day1;


class Part2 extends AbstractSolution
{
    public function solve(): int
    {
        $similarityScores = [];

        foreach ($this->firstList as $value) {
            $appearances = array_filter($this->secondList, function($element) use($value){
                return $element === $value;
            });

            $similarityScores[] = $value * count($appearances);
        }

        return array_sum($similarityScores);
    }
}