<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Models\User;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Auth\Events\Registered;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\Rules;
// use Illuminate\View\View;

// class RegisteredUserController extends Controller
// {
//     /**
//      * Display the registration view.
//      */
//     public function create(): View
//     {
//         return view('auth.register');
//     }

//     /**
//      * Handle an incoming registration request.
//      *
//      * @throws \Illuminate\Validation\ValidationException
//      */
//     public function store(Request $request): RedirectResponse
//     {
//         $request->validate([
//             'name' => ['required', 'string', 'max:255'],
//             'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
//             'password' => ['required', 'confirmed', Rules\Password::defaults()],
//             'phone' => ['nullable', 'string', 'max:20'],
//             'referral_email' => [
//                 'nullable',
//                 'string',
//                 'email:rfc,dns',
//                 function ($attribute, $value, $fail) {
//                     if (strpos($value, '@hannanpiper.com') === false) {
//                         return $fail("The referral email must be a valid email address from hannanpiper.com.");
//                     }
//                 },
//             ],
//         ]);

//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'phone' => $request->phone ?? null,
//             'referral_email' => $request->referral_email ?? null,
//             'password' => Hash::make($request->password),
//         ]);

//         event(new Registered($user));

//         Auth::login($user);

//         return redirect(RouteServiceProvider::HOME);
//     }
// }


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['nullable', 'string', 'max:20'],
            'referral_email' => [
                'nullable',
                'string',
                'email:rfc,dns',
                function ($attribute, $value, $fail) {
                    if (strpos($value, '@hannanpiper.com') === false) {
                        return $fail("The referral email must be a valid email address from hannanpiper.com.");
                    }
                },
            ],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone ?? null,
            'referral_email' => $request->referral_email ?? null,
            'password' => Hash::make($request->password),
        ]);

        // Set the user as admin if a specific condition is met
        if ($user->email === 'admin@example.com') {
            $user->is_admin = true;
            $user->save();
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}