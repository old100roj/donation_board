<?php

namespace App\Http\Controllers;

use App\Repositories\Donation\DonationRepository;
use App\Services\MonthlyAmountRetriever;
use App\Services\TopDonatorRetriever;
use App\Structures\SearchData;
use Illuminate\Container\Container;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class DonationController
 * @package App\Http\Controllers
 */
class DonationController extends Controller
{
    /** @var Container */
    private $container;

    /** @var DonationRepository */
    private $donationRepository;

    private $topDonatorRetriver;

    private $monthlyAmountRetriever;

    /**
     * DonationController constructor.
     * @param Container $container
     * @param DonationRepository $donationRepository
     * @param TopDonatorRetriever $topDonatorRetriever
     * @param MonthlyAmountRetriever $monthlyAmountRetriever
     */
    public function __construct(
        Container $container,
        DonationRepository $donationRepository,
        TopDonatorRetriever $topDonatorRetriever,
        MonthlyAmountRetriever $monthlyAmountRetriever
    ) {
        $this->container = $container;
        $this->donationRepository = $donationRepository;
        $this->topDonatorRetriver = $topDonatorRetriever;
        $this->monthlyAmountRetriever = $monthlyAmountRetriever;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $searchData = new SearchData();
        $searchData->setSearch((string)$request->get('search'));
        $searchData->setMinAmount((float)$request->get('min_amount'));
        $searchData->setMaxAmount((float)$request->get('max_amount'));
        $searchData->setMinDate((string)$request->get('min_date'));
        $searchData->setMaxDate((string)$request->get('max_date'));
        $getParams = $request->except('page');

        return view('pages.welcome', [
            'donates' => $this->donationRepository->search($searchData, $getParams),
            'topDonator' => $this->topDonatorRetriver->topDonator(),
            'month' => $this->monthlyAmountRetriever->monthlyAmount(),
            'allTime' => $this->donationRepository->allTimeAmount()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pages.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required', 'string', 'max:50'],
            'email'=>['required', 'string', 'email', 'max:255'],
            'donationAmount'=>['required', 'regex:/\d+(\.\d{1,2})?$/'],
            'message'=>['required', 'string', 'max:3000']
        ]);

       $this->donationRepository->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'donation_amount'=> $request->get('donationAmount'),
            'message' => $request->get('message')
        ]);
        return redirect('/donates')->with('success', 'Donation accepted, thank you!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('pages.loupe', ['donate' => $this->donationRepository->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if (!$this->donationRepository->find($id)) {
            return redirect(route('donates.create'));
        }

        return view('pages.create-edit', ['donate' => $this->donationRepository->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>['required', 'string', 'max:50'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:donations,email,' . $id],
            'donationAmount'=>['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'message'=>['required', 'string', 'max:3000']
        ]);

        $this->donationRepository->update($id, [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'donation_amount'=> $request->get('donationAmount'),
            'message' => $request->get('message')
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $this->donationRepository->delete($id);

        return redirect()->back();
    }
}
