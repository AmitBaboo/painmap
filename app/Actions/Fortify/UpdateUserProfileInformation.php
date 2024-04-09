<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'full_name' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:11'],
            'post_code' => ['required', 'string'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'user_photo' => ['nullable', 'image', 'max:1024'],
            'company_bio' => ['nullable', 'string', 'min:10'],
            'website' => ['nullable', 'string'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['user_photo'])) {
            $user->updateProfilePhoto($input['user_photo']);
        }

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            return $user->forceFill([
                'full_name' => $input['full_name'],
                'website' => $input['website'],
                'contact_number' => $input['contact_number'],
                'post_code' => $input['post_code'],
                'email' => $input['email'],
                'updated_by' => Auth::id(),
                'company_bio' => $input['company_bio'],
                'status' => $input['status'] ?? $user->status
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'full_name' => $input['full_name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
