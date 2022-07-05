<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember_me = false;
    public $title = "Login";

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    //This mounts the default credentials for the admin. Remove this section if you want to make it public.
    public function mount()
    {
        if (auth()->user()) {
            return redirect()->intended('/dashboard');
        }
        // $this->fill([
        //     'email' => 'admin@test.com',
        //     'password' => 'pass',
        // ]);
    }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }


    public function login()
    {
        $this->validate();
        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(['email' => $this->email])->first();
            auth()->login($user, $this->remember_me);
            if (!$user->is_admin) {
                return redirect()->route('profile');
            }
            return redirect()->intended('/');
        } else {
            return $this->addError('email', trans('auth.failed'));
            // session()->flash('login', 'email/password are incorrect');
            // return redirect()->route('login');
        }
    }

    public function randomeUser()
    {
        $user = User::whereIsAdmin(0)->inRandomOrder()->first();
        $this->email = $user->email;
        $this->password = "password";
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.guest');
    }
}
