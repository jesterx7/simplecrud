<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

/**
* 
*/
class MainController extends Controller
{
	
	public function user_login(Request $request) {
		$this->validate($request, [
			'username' => 'required',
			'password' => 'required'
		]);

		$userdata = array(
			'username' => $request->get('username'),
			'password' => $request->get('password')
		);

		$user = User::where('username', $userdata['username'])->first();
		if ($user) {
			if ($userdata['password'] == $user->password) {
				Session::put('name', $user->name);
				Session::put('username', $user->username);
				Session::put('email', $user->email);
				Session::put('phone', $user->phone);
				Session::put('address', $user->address);
				Session::put('level', $user->level);
				Session::put('login', true);
				return redirect('/');
			}
			else {
				return back()->with('error', 'Wrong username / password, please try again');
			}
		}
		else {
			return back()->with('error', 'Wrong username / password, please try again');
		}
	}

	public function signup() {
		return view('signup');
	}

	public function user_signup(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'username' => 'required',
			'email' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'level' => 'nullable',
			'password' => 'required',
			'conf_password' => 'required'
		]);

		if ($request->get('password') != $request->get('conf_password')) {
			return back()->with('error', 'Password doesnt match, please try again');
		} else {
			$user = new User;
			$user->name = $request->get('name');
			$user->username = $request->get('username');
			$user->email = $request->get('email');
			$user->phone = $request->get('phone');
			$user->address = $request->get('address');
			$user->level = $request->get('level');
			$user->password = $request->get('password');
			$user->save();

			return redirect('/login')->with('success', 'Sign Up Successfull');
		}
	}

	public function index() {
		if (Session::get('login') == true) {
			return view('index');
		} else {
			return redirect('/login');
		}
		
	}

	public function list_data() {
		$files = Storage::disk('public')->files('account');
		$list_data = array();
		foreach($files as $file) {
			array_push($list_data, explode(',', Storage::disk('public')->get($file)));
		}
		return view('list_data', compact('list_data'));
	}

	public function manage_data() {
		$files = Storage::disk('public')->files('account');
		$list_data = array();
		foreach($files as $file) {
			array_push($list_data, explode(',', Storage::disk('public')->get($file) . "," . str_replace("account/", "", $file)));
		}
		return view('CRUD_Data.manage_data', compact('list_data',  'filename'));
	}

	public function add_data() {
		return view('CRUD_Data.add_data');
	}

	public function submit_data(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required',
			'dob' => 'required',
			'phone' => 'required',
			'gender' => 'nullable',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$data = array(
			'name' => $request->get('name'),
			'email' => $request->get('email'),
			'date_of_birth' => $request->get('dob'),
			'phone' => $request->get('phone'),
			'gender' => $request->get('gender'),
		);

		if ($request->image != "") {
			$imageName = time().'.'.request()->image->getClientOriginalExtension();
			$data['image'] = $imageName;

			request()->image->storeAs('public/images/', $imageName);
		} else {
			$data['image'] = "defaultimage.jpg";
		}

		$filename = str_replace(' ', '', $data['name'] . "-" . date("dmYhis") . ".txt");

		Storage::disk('public')->put('account/'.$filename, implode(", ", $data));

		return redirect('/add_data')->with('success', 'Data Added Successfully');
	}

	public function checking() {
		$data = session()->get('data');
		return view('checking', compact('data'));
	}

	public function edit_data($data_id) {
		$data = explode(', ', Storage::disk('public')->get("account/" . $data_id));

		return view('CRUD_Data.edit_data', compact('data', 'data_id'));
	}

	public function update_data($data_id, Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required',
			'dob' => 'required',
			'phone' => 'required',
			'gender' => 'required',
			'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);

		$data = array(
			'name' => $request->get('name'),
			'email' => $request->get('email'),
			'date_of_birth' => $request->get('dob'),
			'phone' => $request->get('phone'),
			'gender' => $request->get('gender'),
			'image' => $request->get('imagefilename')
		);

		if ($request->image != "") {
			if ($data['image'] == "defaultimage.jpg") {
				$data['image'] = time().'.'.request()->image->getClientOriginalExtension();
				request()->image->storeAs('public/images/', $data['image']);
			} else {
				request()->image->storeAs('public/images/', $data['image']);
			}
		}
		Storage::disk('public')->put('account/'. $data_id, implode(", ", $data));

		return redirect('/manage_data')->with('success', 'Data Updated Successfully');
	}

	public function delete_data($data_id) {
		$data = explode(', ', Storage::disk('public')->get("account/" . $data_id));
		Storage::disk('public')->delete('images/'.$data[5]);
		Storage::disk('public')->delete('account/'.$data_id);
		return redirect('manage_data')->with('success', 'Data Deleted Successfully');
	}

	public function manage_account() {
		$users = User::all();

		return view('manage_account', compact('users'));
	}

	public function add_account() {
		return view('CRUD_Account.add_account');
	}

	public function submit_account(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'username' => 'required',
			'email' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'level' => 'nullable',
			'password' => 'required',
			'conf_password' => 'required'
		]);

		if ($request->get('password') != $request->get('conf_password')) {
			return back()->with('error', 'Password doesnt match, please try again');
		} else {
			$user = new User;
			$user->name = $request->get('name');
			$user->username = $request->get('username');
			$user->email = $request->get('email');
			$user->phone = $request->get('phone');
			$user->address = $request->get('address');
			$user->level = $request->get('level');
			$user->password = $request->get('password');
			$user->save();

			return redirect('/add_account')->with('success', 'Account Added Successfully');
		}
	}

	public function edit_account($user_id) {
		$userdata = User::find($user_id);

		return view('CRUD_Account.edit_account', compact('userdata'));
	}

	public function update_account($user_id, Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'username' => 'required',
			'email' => 'required',
			'password' => 'nullable',
			'conf_password' => 'nullable'
		]);

		if ($request->get('password') != "") {
			if ($request->get('password') != $request->get('conf_password')) {
				return back()->with('error', 'Password doesnt match, please try again');
			} else {
				User::find($user_id)->update([
				'name' => $request->get('name'),
				'username' => $request->get('username'),
				'email' => $request->get('email'),
				'password' => $request->get('password')
				]);

				return redirect('/manage_account')->with('success', 'Account Updated Successfully');
			}
		}
		else {
			User::find($user_id)->update([
			'name' => $request->get('name'),
			'username' => $request->get('username'),
			'email' => $request->get('email'),
			]);

			return redirect('/manage_account')->with('success', 'Account Updated Successfully');
		}
	}

	public function delete_account($user_id) {
		$user = User::find($user_id);

		$user->delete();
		return redirect('/manage_account')->with('success', 'Account Deleted Successfully');
	}

	public function logout() {
		Auth::logout();
		Session::forget('name');
		Session::forget('username');
		Session::forget('email');
		Session::put('login', false);
		return redirect('/login')->with('success', 'Logout Successfull');
	}
}
?>