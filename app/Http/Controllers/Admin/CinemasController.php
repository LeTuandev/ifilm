<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $cinemas = Cinema::getListCinemas($search);
        return view('admin.cinemas.index', ['cinemas' => $cinemas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = [
            'name' => $request->name,
            'address' => $request->address,
        ];
        Cinema::create($payload);
        return redirect()->route('admin.cinemas')->with('success', "Thêm mới cinema thành công");
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
    public function update(Request $request, Cinema $cinema)
    {
        $data = [
            'name' => $request->name,
            'address' => $request->address,
        ];
        $cinema->update($data);
        return redirect()->route('admin.cinemas')->with('success', 'cập nhật cinema thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cinema $cinema)
    {
        $cinema->delete();
        return redirect()->route('admin.cinemas')->with('success', 'Xóa cinema thành công');
    }
}
