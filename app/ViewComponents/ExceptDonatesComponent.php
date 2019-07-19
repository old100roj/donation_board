<?php

namespace App\ViewComponents;

use App\Repositories\Donation\DonationRepository;
use Illuminate\Contracts\Support\Htmlable;
use View;

class ExceptDonatesComponent implements Htmlable
{
    /** @var DonationRepository */
    private $donationRepository;

    public function __construct(DonationRepository $donationRepository)
    {
        $this->donationRepository = $donationRepository;
    }

    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        return View::make('components.exceptDonates')
            ->with('donates', $this->donationRepository->getUniqByName())
            ->render();
    }
}
