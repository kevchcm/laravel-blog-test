<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => ['required', 'email']
        ]);

        try {
            $newsletter->subscribe(request('email'));
        }catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'Invalid email'
            ]);

            //return redirect(route('home'))
            //    ->withFragment('#footer')
            //    ->with('error', 'Invalid email');
        }

        return redirect(route('home'))->with('success', 'Thank you for signing up!');
    }
}
