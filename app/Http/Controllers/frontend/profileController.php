<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Traits\uploadImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use Illuminate\Http\Request;

class profileController extends Controller
{
    use uploadImage;

    public function profilePg()
    {
        return view('frontend.dashboard.profile.update');
    }

    public function change_detail(ProfileUpdateRequest $r)
    {

        $userId = auth()->user()->id;
        $user_data = User::find($userId);

        $avatarName = $user_data->avatar;
        $bannerName = $user_data->banner;

        if ($r->avatar) {
            $avatarPath = $this->uploadImg(
                $r,
                'avatar',
                $avatarName ? $avatarName : null
            );
            if ($avatarPath) {
                $user_data->avatar = $avatarPath;
            }
        }
        if ($r->banner) {
            $bannerPath = $this->uploadImg(
                $r,
                'banner',
                $bannerName ? $bannerName : null
            );
            if ($bannerPath) {
                $user_data->banner = $bannerPath;
            }
        }

        $user_data->name = $r->name;
        $user_data->email = $r->email;
        $user_data->phone = $r->phone;
        $user_data->address = $r->address;
        $user_data->website = $r->website;
        $user_data->fb = $r->fb;
        $user_data->insta = $r->insta;
        $user_data->twitter = $r->twitter;
        $user_data->linkden = $r->linkden;
        $user_data->about = $r->about;
        $user_data->save();

        return redirect()->route('user.update')->with('success', 'Updated Successfully');
    }

    public function updatePassword(Request $r)
    {
        $r->validate([
            'oldPass' => ['required', 'min:5'],
            'newPass' => ['required', 'min:5'],
            'confirmPass' => ['required', 'min:5'],
        ]);
        // dd(auth()->user()->password);
        $id = auth()->user()->id;
        $user_data = User::find($id);
        if (password_verify($r->oldPass, $user_data->password)) {
            if ($r->newPass === $r->confirmPass) {
                $user_data->password = password_hash($r->newPass, PASSWORD_DEFAULT);
                $user_data->save();
                return redirect()->back()->with('success', 'Password Updated Successfully');
            } else {
                return redirect()->back()->with('wrng_confirm', 'wrong New or confirm password');
            }
        } else {
            return redirect()->back()->with('wrng_oldPass', 'wrong current password');
        }
    }
}
