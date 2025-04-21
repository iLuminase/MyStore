<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;
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

    public function show(Menu $menu) {
        return view('admin.menu.edit', [
            'title' => 'Chỉnh sửa Danh Mục: ' . $menu->name, // Fix string concatenation
            'menu' => $menu, // Change variable name to avoid duplication
            'menus' => $this->menuService->getParent(),
        ]);
    }
    public function update(Menu $menu, CreateFormRequest $request) {
        $this->menuService->update($menu, $request);

        return redirect('/admin/menus/list');
    }
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa danh mục thành công'
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Xóa danh mục không thành công'
            ]);
        }

    }
}

