<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $role = Auth::user()->role;
        $status = Auth::user()->status;
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $user->update([
                        'is_online' => 'true',

                     ]);
        if($role == 'admin'){

            return redirect()->intended(RouteServiceProvider::HOME);
            
        }else{

            if ($status == 'active') {
              return redirect()->intended(RouteServiceProvider::CUSTOMERHOME);
            }else{
                $user->update([
                'is_online' => 'false',
                    ]);
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('login')->with('error', 'Your account is De-activated');;
            }
            
        }  
        
    }

    /**
     * Destroy an authenticated session.
     */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();
    //     $id = Auth::user()->id;
    //     $user = User::findOrFail($id);
    //     $user->update([
    //                     'is_online' => 'false',

    //                  ]);
    //     return redirect('login');
    // }

    public function destroy(Request $request): RedirectResponse
    {
    // Check if the user is authenticated
    if (Auth::check()) {
        $id = Auth::user()->id;
        // Check if the user with the given ID exists
        if ($user = User::find($id)) {
            $user->update([
                'is_online' => 'false',
            ]);
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        

            return redirect('login');
        } else {
            return redirect('/error');
        }
    }

}
}
