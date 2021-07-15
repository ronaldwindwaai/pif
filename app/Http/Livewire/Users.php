<?php

namespace App\Http\Livewire;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Events\NewUserCreated;
use Livewire\Component;

class Users extends Component
{
    public $users, $name, $email, $user_id;
    public $updateMode = false;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
    }

    public function store(StoreUserRequest $request)
    {
        try{
            $validated = $request->validated();
            $validated['password'] = Hash::make($validated['password']);
            $user = new User($validated);
            $user->save();

            $role = Role::where('id', $validated['role_id'])->get();
            $user->assignRole($role);

            \event(new NewUserCreated($user));

            session()->flash('message', 'The  (' . strtoupper($user->name) . ') User was successfully created..');

            $this->resetInputFields();

            $this->emit('userStore'); // Close model to using to jquery


        }catch(Exception $exception){
            return \redirect()
                ->back()
                ->withErrors($exception->getMessage());
        }

    }
}
