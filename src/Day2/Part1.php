<?php

namespace AdventOfCode2024\Day2;


class Part1 extends AbstractSolution
{
    public function solve(): int
    {
        $safeReports = 0;
        foreach ($this->reports as $report) {
            $filteredReportValues = array_unique($report);
            if(count($filteredReportValues) < count($report)){
                continue;
            }

            $sortedReportValues = $report;
            $reverseSortedReportValues = $report;
            sort($sortedReportValues);
            rsort($reverseSortedReportValues);

            if ($sortedReportValues !== $report && $reverseSortedReportValues !== $report){
                continue;
            }

            $difference = 0;
            for ($iterator = 0; $iterator < count($report) - 1; $iterator++) {
                $difference = max(abs($report[$iterator] - $report[$iterator + 1]), $difference);
                if($difference > 3) {
                    break;
                }
            }

            if($difference <= 3){
                $safeReports++;
            }
        }

        return $safeReports;
    }
}