<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Validators\AuthValidator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Prettus\Validator\Exceptions\ValidatorException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * Create a new controller instance.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->middleware('guest')->except('getLogout');
        $this->repository = $repository;
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param Request $request
     * @param AuthValidator $validator
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function checkAuth(Request $request, AuthValidator $validator)
    {
        try {
            $validator->with( $request->all() )->passesOrFail();


            // If the class is using the ThrottlesLogins trait, we can automatically throttle
            // the login attempts for this application. We'll key this by the username and
            // the IP address of the client making these requests into this application.
            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);

                return $this->sendLockoutResponse($request);
            }

            $credentials = $this->getCredentials($request);

//            if ($this->attemptLogin($request)) {
//                return $this->sendLoginResponse($request);
//            }

            if ($this->guard()->attempt($credentials, $request->has('remember'))) {
                return $this->sendLoginResponse($request);
            }

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            $this->incrementLoginAttempts($request);

            //return $this->sendFailedLoginResponse($request);
            $user = $this->repository->skipPresenter()->findWhere(['email' => $credentials['email']])->first();
            if (!$user) {
                $message = 'These credentials do not match our records.';
            } elseif (!$user->activated) {
                //$this->activationService->sendActivationMail($user);
                //auth()->logout();
                $message = 'You need to confirm your account. We have sent you an activation code, please check your email!';
            } else {
                $message = 'Credentials Invalid!';
            }

            if($this->sendFailedLoginResponse($request)){
                return response()->json([
                    'msg' => $message
                ],401);
            }


        } catch(ValidatorException $e) {

            return response()->json($e->getMessageBag(), 422);
        }

    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->getCredentials($request), $request->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return [
            'email'     => $request->input('email'),
            'password'  => $request->input('password'),
            'activated' => 1,
        ];
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if(\Auth::User()->isAdmin()) {
            $redirecturl = route('panel.dashboard');
        } else {
            $redirecturl = route('client.dashboard');
        }

        return response()->json([
            'type' => 'success',
            'msg' => 'User logged in, redirecting ...',
            //'redirect' => route('client.dashboard'),
            'redirect' => $redirecturl,
            'remember' => $request->only('email', 'remember')
        ], 200);

    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getLogout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/login');
//        return response()->json([
//            'type' => 'success',
//            'msg' => 'User logout in, redirecting ...',
//            'redirect' => route('login')
//        ], 200);
    }

}
