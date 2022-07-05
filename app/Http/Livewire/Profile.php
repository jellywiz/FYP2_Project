<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profile extends Component
{
    //page title
    public $title = "Profile";

    public User $user;
    public $showSavedAlert = false;

    public function rules()
    {

        return [
            'user.first_name' => 'max:15',
            'user.last_name' => 'max:20',
            'user.email' => 'email',
            'user.gender' => ['required', Rule::in([0, 1])],
            'user.address' => 'max:40',
            'user.number' => ['required', 'min:7'],
        ];
    }

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function save()
    {

        $this->validate();

        $this->user->save();
        $this->user->refresh();

        $this->showSavedAlert = true;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
