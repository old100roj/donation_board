<?php

namespace App\Services;

use App\Repositories\Donation\DonationRepository;
use App\Structures\DonationsData;
use App\Structures\SearchData;

class DonationsDataRetriever
{
    /** @var MonthlyAmountRetriever */
    private $monthlyAmountRetriever;

    /** @var TopDonatorRetriever */
    private $topDonatorRetriever;

    /** @var DonationRepository */
    private $donationRepository;


    public function __construct(
        MonthlyAmountRetriever $monthlyAmountRetriever,
        TopDonatorRetriever $topDonatorRetriever,
        DonationRepository $donationRepository
    )
    {
        $this->monthlyAmountRetriever = $monthlyAmountRetriever;
        $this->topDonatorRetriever = $topDonatorRetriever;
        $this->donationRepository = $donationRepository;
    }

    public function getDonationData(SearchData $searchData, array $getParams): DonationsData
    {
        $topDonator = $this->topDonatorRetriever->topDonator();
        $mounthlyAmount = $this->monthlyAmountRetriever->monthlyAmount();
        $allTimeAmount = $this->donationRepository->allTimeAmount();
        $donations = $this->donationRepository->search($searchData, $getParams);

        $donationsData = new DonationsData();
        $donationsData->topDonator = $topDonator;
        $donationsData->mounthlyAmount = $mounthlyAmount;
        $donationsData->allTimeAmount = $allTimeAmount;
        $donationsData->donations = $donations;

        return $donationsData;
    }

}
