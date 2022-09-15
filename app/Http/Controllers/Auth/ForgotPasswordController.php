<?php

namespace App\Http\Controllers\Auth;

use Illuminate\contracts\Queue\ShouldQueue;
use App\Http\Controllers\Controller;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller implements ShouldQueue
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use Queueable;

    use SendsPasswordResetEmails;
}
