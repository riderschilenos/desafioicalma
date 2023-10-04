<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Intervention\Image\Facades\Image;
use Illuminate\support\Str;
use Illuminate\Support\Facades\Cache;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image'],
        ])->validateWithBag('updateProfileInformation');

        $nombre = Str::random(10).$input['photo']->getClientOriginalName();
        $ruta = public_path().'/storage/profile-photos/'.$nombre;
        Image::make($input['photo'])->orientate()
                ->resize(400, null , function($constraint){
                $constraint->aspectRatio();
                })
                ->save($ruta);
                
    
        $user->forceFill([
            'profile_photo_path'=>'profile-photos/'.$nombre
                ])->save();
        Cache::flush();
                /*
        if (isset($input['photo'])) {

            $user->updateProfilePhoto($input['photo']);

        }*/


        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
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
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
