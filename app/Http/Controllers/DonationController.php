<?php

namespace App\Http\Controllers;

use App\Repositories\Donation\DonationRepository;
use App\Services\DonationsDataRetriever;
use App\Structures\SearchData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class DonationController
 * @package App\Http\Controllers
 */
class DonationController extends BaseController
{

    /** @var DonationsDataRetriever */
    private $donationData;

    /** @var DonationRepository */
    private $donationRepository;

    /**
     * DonationController constructor.
     * @param DonationsDataRetriever $donationData
     * @param DonationRepository $donationRepository
     */
    public function __construct(DonationsDataRetriever $donationData, DonationRepository $donationRepository)
    {
        $this->donationData = $donationData;
        $this->donationRepository = $donationRepository;
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
        $searchData->exceptNames = (array)$request->get('except');
        $getParams = $request->except('page');

        return view('pages.welcome', [
            'donationsData' => $this->donationData->getDonationData($searchData, $getParams)
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
