<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\UserCatalogue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminUserController extends Controller    
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = User::query();
        if ($keyword) { 
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }
        $users = $query->paginate(8);
        $template = 'backend.user.index';
        return view('backend.dashboard.layout', compact('template', 'users'));
    }
    public function create() 
    {
        $users = User::all();
        $userCatalogue = UserCatalogue::all();
        $template = 'backend.user.create';
        return view('backend.dashboard.layout', compact('template', 'users', 'userCatalogue'));
    }
    public function store(StoreUserRequest $request)
    {
        $payload = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/user/', $filename);
            $payload['image'] = $filename;
        }
        User::create($payload);
        return redirect()->route('admin.users')->with('success', 'Thêm mới thành viên thành công!');
    }

    public function update($id)
    {
        $user = User::find($id);
        $userCatalogue = UserCatalogue::all();
        $template = 'backend.user.update';
        return view('backend.dashboard.layout', compact('template', 'user', 'userCatalogue'));
    }
    public function edit($id = 0, UpdateUserRequest $request)
    {
        $user = User::find($id);
        $payload = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/user/', $filename);
            $payload['image'] = $filename;
        } else {
            $payload['image'] = $user->image;
        }
        $user->update($payload);
        return redirect()->route('admin.users')->with('success', 'Cập nhật thành viên thành công!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $template = 'backend.user.delete';
        return view('backend.dashboard.layout', compact('template', 'user'));
    }
    public function destroy($id = 0)
    {
        $user = User::withTrashed()->find($id);
        $user->forceDelete(); 
        return redirect()->route('admin.users')->with('success', 'Xóa thành công thành viên!');
    }
    public function softDelete($id = 0)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'Xóa thành công thương hiệu!');
    }
}
