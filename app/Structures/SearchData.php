<?php

namespace App\Structures;

/**
 * Class SearchData
 * @package App\Structures
 */
class SearchData
{
    /** @var string */
    public $search;

    /** @var float */
    public $minAmount;

    /** @var float */
    public $maxAmount;

    /** @var string */
    public $minDate;

    /** @var string */
    public $maxDate;

    /** @var array */
    public $exceptNames;

    /**
     * @param float $amount
     * @return SearchData
     */
    public function setMinAmount(float $amount): self
    {
        $this->minAmount = $this->prepareAmount($amount);
        return $this;
    }

    /**
     * @param float $amount
     * @return SearchData
     */
    public function setMaxAmount(float $amount): self
    {
        $this->maxAmount = $this->prepareAmount($amount);
        return $this;
    }

    /**
     * @param string $date
     * @return SearchData
     */
    public function setMinDate(string $date): self
    {
        $this->minDate = $date;

        return $this;
    }

    /**
     * @param string $date
     * @return SearchData
     */
    public function setMaxDate(string $date): self
    {
        $this->maxDate = $date;

        return $this;
    }


    /**
     * @param float $amount
     * @return float
     */
    private function prepareAmount(float $amount): float
    {
        return round($amount, 2);
    }

    /**
     * @param string $search
     * @return SearchData
     */
    public function setSearch(string $search): self
    {
        $this->search = $search;

        return $this;
    }
}
