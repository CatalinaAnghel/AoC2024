<?php

namespace AdventOfCode2024\Day1;


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