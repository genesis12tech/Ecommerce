<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller {

	public function UserDashBoard() {

		$id = Auth::user()->id;

		$userData = User::find($id);

		return view('dashboard', compact('userData'));

	} // End Mehtod

	public function UserLogout() {

		Auth::logout();

		return redirect()->route('login');

	} // End Mehtod

	public function UserProfileStore(Request $request) {

		$id = Auth::user()->id;
		$data = User::find($id);
		$data->name = $request->name;
		$data->email = $request->email;
		$data->phone = $request->phone;
		$data->address = $request->address;

		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('upload/user_images/' . $data->profile_photo_path));
			$filename = date('YmdHi') . $file->getClientOriginalName();
			$file->move(public_path('upload/user_images'), $filename);
			$data['profile_photo_path'] = $filename;
		}

		$data->save();

		$notification = array(
			'message' => 'User Profile Updated Successfully',
			'alert-type' => 'success',
		);

		return redirect()->back()->with($notification);

	} // End Mehtod

	public function UserUpdatePassword(Request $request) {
		// Validation
		$request->validate([
			'old_password' => 'required',
			'new_password' => 'required|confirmed',
		]);

		// Match The Old Password
		if (!Hash::check($request->old_password, auth::user()->password)) {
			return back()->with("error", "Old Password Doesn't Match!!");
		}

		// Update The new password
		User::whereId(auth()->user()->id)->update([
			'password' => Hash::make($request->new_password),

		]);
		return back()->with("status", " Password Changed Successfully");

	} // End Mehtod

}
