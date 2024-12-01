<?php

namespace AdventOfCode2024\Day1;

use AdventOfCode2024\Helper\FileReader;

class Part1 extends AbstractSolution
{
    public function solve(): int
    {
        $differences = [];

        foreach ($this->firstList as $key => $value) {
            $differences[] = abs($value - $this->secondList[$key]);
        }

        return array_sum($differences);
    }
}