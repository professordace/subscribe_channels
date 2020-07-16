<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Channel;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getChannels(Request $request)
    {
        $data['user'] = User::with(['channels'])->find($request->user()->id);
        $data['channels'] = Channel::get();
        return view('user_channels', $data);
    }

    /**
     * @param Request $request
     * @return bool|\Illuminate\Http\RedirectResponse
     */
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
