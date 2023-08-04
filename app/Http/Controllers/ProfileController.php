<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        $profile = Profile::find(Auth::user()->profile->id);
        return view('user.profile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'occupation' => 'required|in:Student,Professional,Other',
            'dietary_preference' => 'required|in:Vegetarian,Non-Vegetarian,Vegan',
            'allergies' => 'nullable',
            'contact_number' => 'required|digits:10',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
        ]);
        $user = Profile::find(Auth::user()->profile->id);
        $user->update($validated);
        return redirect()->route('explore')->with('success', 'Your profile has been updated.');
    }

    public function updateLinksProfile(Request $request)
    {
        $validated = $request->validate([
            'facebook_link' => 'nullable|regex:^(https?:\/\/)?(www\.)?facebook\.com\/[a-zA-Z0-9\.]+$^|active_url',
            'instagram_link' => 'nullable|regex:^(https?:\/\/)?(www\.)?instagram\.com\/[a-zA-Z0-9_\.]+\/?$^|active_url',
            'linkedin_link' => 'nullable|regex:^(https?://)?(www\.)?linkedin\.com/in/[\w-]+/?$^|active_url',
        ]);
        $user = Profile::find(Auth::user()->profile->id);
        $user->update($validated);
        return redirect()->back()->with('success', 'Your links have been updated.');
    }

    public function updateAvatar(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|max:1024',
        ]);
        $user = Profile::find(Auth::user()->profile->id);
        if ($user->image) {
            Storage::delete($user->image);
        }
        $avatar = $request->file('image')->store('userAvatar');
        $user->image = $avatar;
        $user->update();
        return redirect()->back()->with('success', 'Your avatar has been uploaded.');
    }

    public function deleteAvatar()
    {
        $user = Profile::find(Auth::user()->profile->id);
        if ($user->image) {
            Storage::delete($user->image);
            $user->image = null;
            $user->update();
        }
        return redirect()->back()->with('danger', 'Your avatar has been deleted.');
    }
}
