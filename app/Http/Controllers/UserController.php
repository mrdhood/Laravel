<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show a user profile
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        return view('settings');
    }

    /**
     * Show the settings form on a GET request
     * Update the profile on a POST request
     *
     * @return \Illuminate\Http\Response
     */
    public function settings(Request $request)
    {
        if ($request->getMethod() === Request::METHOD_POST)
        {
            $user = Auth::user();
            $user->address = $request->post('address', '');
            $user->phone = $request->post('phone', '');

            $validator = Validator::make($request->all(), [
                'color' => [
                    'required',
                    Rule::in(['red', 'blue', 'green'])
                ],
                'sport' => [
                    'required',
                    Rule::in(['basketball', 'baseball', 'football', 'hockey', 'soccer', 'golf'])
                ]
            ]);

            if ($validator->fails())
            {
                return back()->withErrors($validator)->withInput($request->all());
            }

            $user->sport = $request->post('sport');
            $user->color = $request->post('color');

            $user->save();

            return redirect()->route('profile', ['id' => Auth::id()]);
        }

        return view('settings');
    }
}
