<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'full_name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:14', 'min:11'],
            'post_code' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'full_name' => $input['full_name'],
                'contact_number' => $input['contact_number'],
                'post_code' => strtoupper($input['post_code']),
                'email' => strtolower($input['email']),
                'password' => Hash::make($input['password']),
                'status' => $input['status'] ?? 0
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function createTeam(User $user)
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'full_name' => explode(' ', $user->full_name, 2)[0] . "'s Team",
            'personal_team' => true,
        ]));
    }
}
