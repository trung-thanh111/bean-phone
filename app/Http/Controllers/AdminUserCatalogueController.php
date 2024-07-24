<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserCatalogueRequest;
use App\Http\Requests\UpdateUserCatalogueRequest;
use App\Models\UserCatalogue;
use Illuminate\Http\Request;

class AdminUserCatalogueController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = UserCatalogue::query();
        if ($keyword) { 
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }
        $userCatalogues = $query->paginate(8);
        $template = 'backend.usercatalogue.index';
        return view('backend.dashboard.layout', compact('template', 'userCatalogues'));
    }
    public function create()
    {
        $userCatalogues = UserCatalogue::all();
        $template = 'backend.usercatalogue.create';
        return view('backend.dashboard.layout', compact('template', 'userCatalogues'));
    }
    public function store(StoreUserCatalogueRequest $request)
    {
        $payload = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/user/', $filename);
            $payload['image'] = $filename;
        }
        UserCatalogue::create($payload);
        return redirect()->route('admin.user.catalogues')->with('success', 'Thêm mới nhóm thành viên thành công!');
    }

    public function update($id)
    {
        $userCatalogue = UserCatalogue::find($id);
        $template = 'backend.usercatalogue.update';
        return view('backend.dashboard.layout', compact('template', 'userCatalogue'));
    }
    public function edit($id = 0, UpdateUserCatalogueRequest $request)
    {
        $userCatalogue = UserCatalogue::find($id);
        $payload = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move('upload/user/', $filename);
            $payload['image'] = $filename;
        } else {
            $payload['image'] = $userCatalogue->image;
        }
        $userCatalogue->update($payload);
        return redirect()->route('admin.user.catalogues')->with('success', 'Cập nhật nhóm thành viên thành công!');
    }

    public function delete($id)
    {
        $userCatalogue = UserCatalogue::find($id);
        $template = 'backend.usercatalogue.delete';
        return view('backend.dashboard.layout', compact('template', 'userCatalogue'));
    }
    public function destroy($id = 0)
    {
        $userCatalogue = UserCatalogue::withTrashed()->find($id);
        $userCatalogue->forceDelete(); 
        return redirect()->route('admin.user.catalogues')->with('success', 'Xóa thành công nhóm thành viên!');
    }
    public function softDelete($id = 0)
    {
        $userCatalogue = UserCatalogue::find($id);
        $userCatalogue->delete(); 
        return redirect()->route('admin.user.catalogues')->with('success', 'Xóa thành công nhóm thành viên!');
    }
}
