<?php

namespace App\Http\Controllers\FrontOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontoffice.home');
    }

    public function showContactForm()
    {
        return view('frontoffice.contacts');
    }

    public function ContactFormHandler(Request $request)
    {
        $data = $request->all();
        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();

        Mail::to('account@mail.it')->send(new SendNewMail($newLead));
        return redirect()->route('frontoffice.thanks')->with('lead', $newLead->name);
    }

    public function ContactFormThanks()
    {
        return view('frontoffice.thanks');
    }
}
