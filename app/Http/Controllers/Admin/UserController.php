<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewProfile(): View
    {
        $user = auth()->user();
        return view('admin.user.profile', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $file = $request->avatar;
        $user = auth()->user();
        $this->deleteImgbase64($user->avatar, 'avatar');
        $avatar = $this->saveImgBase64($file, 'avatar');
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'avatar' => $avatar ?: $user->avatar,
        ]);
        Artisan::call('storage:link');
        return redirect()->back()->with('success', 'update profile thành công');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    protected function deleteImgbase64($avatar, $folder)
    {
        $storage = Storage::disk('public');
        $isDirectory = $storage->exists($folder);
        if ($avatar && $isDirectory) {
            Storage::disk('public')->delete('avatar/' . $avatar);
        }
    }

    protected function saveImgBase64($file, $folder)
    {
        if ($file) {
            list($extension, $content) = explode(';', $file);
            $tmpExtension = explode('/', $extension);
            preg_match('/.([0-9]+) /', microtime(), $m);
            $fileName = sprintf('img%s%s.%s', date('YmdHis'), $m[1], $tmpExtension[1]);
            $content = explode(',', $content)[1];
            $storage = Storage::disk('public');
            $isDirectory = $storage->exists($folder);
            if (!$isDirectory) {
                $storage->makeDirectory($folder);
            }
            $storage->put($folder . '/' . $fileName, base64_decode($content), 'public');
            return $fileName;
        }
    }
}
