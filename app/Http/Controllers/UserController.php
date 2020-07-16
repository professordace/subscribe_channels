<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Channel;

class UserController extends Controller
{
    public function getChannels(Request $request)
    {
        $data['user'] = User::with(['channels'])->find($request->user()->id);
        $data['channels'] = Channel::get();
        return view('user_channels', $data);
    }

    public function updateChannels(Request $request)
    {
        $this->validate($request, [
            'channels.*' => 'required|numeric|exists:channels,id',
        ]);

        $user = User::with(['channels'])->find($request->user()->id);
        if ($user->channels()->sync($request->input('channels'))) {
            return redirect()->back()->with('success', 'Список подписных каналов успешно обновлён.');
        }

        return false;
    }
}
