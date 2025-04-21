<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
class MenuController extends Controller
{
    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }
    public function create()
    {
        $menus = $this->menuService->getParent();
        return view('admin.menu.add', [
            'title' => 'Thêm Danh Mục Mới',
            'menus' => $this->menuService->getParent(),
        ]);
    }

    public function store(Request $request)
    {
        $result = $this->menuService->create(request());

        return redirect()->back();
    }
    public function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh Sách Danh Mục',
            'menus' => $this->menuService->getAll(),
        ]);
    }
}

