<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdatePassword;
use App\Http\Requests\User\UpdateProfile;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $query = Question::whereHas('choices', function ($subQuery) use ($user) {
            $subQuery->where('result', config('constants.result.correct'));
            $subQuery->where('user_id', $user->id);
        });

        $activities = $user->activities->sortByDesc('id');

        $totalLearned = $query->count();

        return view('front.profiles.show', compact('user', 'totalLearned', 'activities'));
    }

    public function edit()
    {
        $user = Auth::user();

        return view('front.profiles.edit', compact('user'));
    }

    public function update(UpdateProfile $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $extName = $file->getClientOriginalExtension();
            $fileName = getFileName(Str::slug($request->name, '-'), $extName);
            $file->storeAs(config('upload.path.user'), $fileName, config('upload.disk_name'));
            $user->avatar = $fileName;
        }

        $user->save();

        return redirect()->back()->with('success', __('success.update_profile'));
    }

    public function changePassword()
    {
        return view('front.profiles.change-password');
    }

    public function updateChangePassword(UpdatePassword $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->new_password);
        $user->save();

        return back()->with('success', __('success.update_password'));
    }
}
