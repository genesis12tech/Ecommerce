<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\AttemptToAuthenticate;
use App\Actions\Fortify\RedirectIfTwoFactorAuthenticatable;
use App\Models\Admin;
use App\Responses\LoginResponse;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Actions\CanonicalizeUsername;
use Laravel\Fortify\Actions\EnsureLoginIsNotThrottled;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
use Laravel\Fortify\Contracts\LoginViewResponse;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Features;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Http\Requests\LoginRequest;

class Admincontroller extends Controller {
	/**
	 * The guard implementation.
	 *
	 * @var \Illuminate\Contracts\Auth\StatefulGuard
	 */
	protected $guard;

	/**
	 * Create a new controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
	 * @return void
	 */
	public function __construct(StatefulGuard $guard) {
		$this->guard = $guard;
	}

	public function loginForm() {

		return view('auth.admin_login', ['guard' => 'admin']);
	}

	/**
	 * Show the login view.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Laravel\Fortify\Contracts\LoginViewResponse
	 */
	public function create(Request $request): LoginViewResponse {
		return app(LoginViewResponse::class);
	}

	/**
	 * Attempt to authenticate a new session.
	 *
	 * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
	 * @return mixed
	 */
	public function store(LoginRequest $request) {
		return $this->loginPipeline($request)->then(function ($request) {
			return app(LoginResponse::class);
		});
	}

	/**
	 * Get the authentication pipeline instance.
	 *
	 * @param  \Laravel\Fortify\Http\Requests\LoginRequest  $request
	 * @return \Illuminate\Pipeline\Pipeline
	 */
	protected function loginPipeline(LoginRequest $request) {
		if (Fortify::$authenticateThroughCallback) {
			return (new Pipeline(app()))->send($request)->through(array_filter(
				call_user_func(Fortify::$authenticateThroughCallback, $request)
			));
		}

		if (is_array(config('fortify.pipelines.login'))) {
			return (new Pipeline(app()))->send($request)->through(array_filter(
				config('fortify.pipelines.login')
			));
		}

		return (new Pipeline(app()))->send($request)->through(array_filter([
			config('fortify.limiters.login') ? null : EnsureLoginIsNotThrottled::class,
			config('fortify.lowercase_usernames') ? CanonicalizeUsername::class : null,
			Features::enabled(Features::twoFactorAuthentication()) ? RedirectIfTwoFactorAuthenticatable::class : null,
			AttemptToAuthenticate::class,
			PrepareAuthenticatedSession::class,
		]));
	}

	/**
	 * Destroy an authenticated session.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Laravel\Fortify\Contracts\LogoutResponse
	 */
	public function destroy(Request $request): LogoutResponse {
		$this->guard->logout();

		if ($request->hasSession()) {
			$request->session()->invalidate();
			$request->session()->regenerateToken();
		}

		return app(LogoutResponse::class);
	}

	################################## Admim Profile #########################

	public function AdminProfile() {

		$adminData = Admin::find(1);

		return view('admin.admin_profile_view', compact('adminData'));
	}

	public function AdminProfileStore(Request $request) {

		$data = Admin::find(1);

		$data->name = $request->name;
		$data->email = $request->email;

		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/admin_images/' . $data->profile_photo_path));
			$filename = date('YmdHi') . $file->getClientOriginalName();
			$file->move(public_path('upload/admin_images'), $filename);
			$data['profile_photo_path'] = $filename;
		}
		$data->save();

		$notification = array(
			'message' => 'Admin Profile Updated Successfully',
			'alert-type' => 'success',
		);

		return redirect()->route('admin.profile')->with($notification);

	} // end method

	public function AdminChangePassword() {

		return view('admin.change_password');

	} // End of Method

	public function AdminUpdatePassword(Request $request) {

		$validateData = $request->validate([

			'oldpassword' => 'required',
			'password' => 'required|confirmed',

		]);

		$hashedPassword = Admin::find(1)->password;
		if (Hash::check($request->oldpassword, $hashedPassword)) {
			$admin = Admin::find(1);
			$admin->password = Hash::make($request->password);
			$admin->save();
			$admin->logout();

			return redirect()->route('admin.logout');
		} else {

			return redirect()->back();

		}

	} // End of Method

}
