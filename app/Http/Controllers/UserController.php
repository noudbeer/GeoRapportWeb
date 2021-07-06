<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
		$this->middleware(['auth', 'verified']);
	}

    public function registerUserPage() {
        $roles = Role::all();
        return view('admin.registerUserPage', compact('roles'));
    }

    public function registerUser(Request $request) {

       // Champs à valider
		$fields = [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname'  => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id'   => ['required', 'integer'],
            'password'  => ['required', 'string', 'min:8']
		];

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $request['password'] = Hash::make($randomString);

        $data = $request->validate($fields);
        $user = User::create($data);

        Mail::to($data['email'])->send(new VerificationMail($data, $randomString));

        return view('admin.confirmationRegistration', compact('user'));
    }

    /**
     * returns all users matching the search 
     */
    public function users($search = "") 
    {
		$users = collect();

		User::all()->filter(function($user) use($search) {
			$data = $user->firstname . ' ' . $user->lastname . ' ' . $user->email;
            $data = $this->normalize($data);

            $keywords = explode(' ', strtoupper($search));

            foreach ($keywords as $keyword) 
                if (preg_match('/' . $keyword . '/', $data))
                    return true;

            return false;
		})->each(function($user) use($users) {
			$users->push($user);
		});

		return $users;
	}

    /**
     * normalize char
     */
    private function normalize($string) 
    {
        $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',
        );
        return strtoupper(strtr($string, $table));
    }
}
