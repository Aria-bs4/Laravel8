<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newletter)
    {
        request()->validate(['email' => "required|email"]);

        try{
            $newletter->submit(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added.'
            ]);
        }

        return redirect('/')->with('success', 'You are now signed up for request!');
    }
}
