<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsletterSignup;


class NewsletterSignupsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required|email|unique:newsletter_signups,email_address'
        ]);

        $newsletterSignup = new NewsletterSignup;

        $newsletterSignup->first_name = $request->input('first_name');
        $newsletterSignup->last_name = $request->input('last_name');
        $newsletterSignup->email_address = $request->input('email_address');

        $newsletterSignup->save();

        return response()->json(array('result' => 'success'));
    }

    public function show() {
        $signups = NewsletterSignup::all();

        return view('auth.newslettersignups.show')
            ->with('signups', $signups);
    }
}
