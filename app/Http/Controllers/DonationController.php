<?php

namespace App\Http\Controllers;

use App\Donation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $donates = Donation::paginate(10);

        return view('pages.welcome', ['donates' => $donates->appends($request->except('page'))]);
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
            'email'=>['required', 'string', 'email', 'max:255', 'unique:donations'],
            'donationAmount'=>['required', 'regex:/\d+(\.\d{1,2})?$/'],
            'message'=>['required', 'string', 'max:3000']
        ]);

        Donation::create([
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
        $donate = Donation::find($id);

        return view('pages.loupe', ['donate' => $donate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $donate = Donation::find($id);

        if (!$donate) {
            return redirect(route('donates.create'));
        }

        return view('pages.create-edit', ['donate' => $donate]);
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

        Donation::where('id', $id)->update([
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
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Donation::where('id', $id)->delete();

        return redirect()->back();
    }
}
