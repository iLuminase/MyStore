<?php

namespace App\Http\Services\Menu;
use Illuminate\Support\Facades\Session;
use App\Models\Menu;
use Illuminate\Support\Str;

class MenuService
{
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }
    public function getAll()
    {
        return Menu::orderBy('id', 'desc')->paginate(20);
    }
    public function create($request)
    {
        try {
//            $data = $request->input();
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'slug' => Str::slug($request->input('name')),
                'active' => (bool) $request->input('active'),
            ]);

            Session::flash('success', 'Tạo danh mục thành công');
        } catch(\Exception $e) {
            Session::flash('error', $e->getMessage());
            return false;
        }
        return true;
    }
}
