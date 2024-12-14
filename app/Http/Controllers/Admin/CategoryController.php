<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\categoryStoreRequest;
use App\Http\Requests\categoryUpdateRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Traits\uploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use uploadImage;
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(categoryStoreRequest $r)
    {
        $category = new Category();
        $c = DB::table('categories')
            ->selectRaw('count(id) as no ')
            ->where('name', $r->name)
            ->first();
        // echo $c->no;
        if ($c->no === 0) {
            $this->imageProcess($category, $r);
            $this->saveChanges($category, $r);
            $category->slug = Str::slug($r->name,'-');
            $category->save();
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'The category name already exists');
        }
    }

    public function edit($slug)
    {
        $category = new Category();
        $category = $category->where('slug', $slug)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function change($slug, categoryUpdateRequest $r)
    {
        $category = new Category();
        $category = $category->where('slug', $slug)->first();
        $c = $this->checkTitleAlreadyPresent($category, $r);
        if ($c->no === 0) {
            $this->imageProcess($category, $r);
            $this->saveChanges($category, $r);
            $category->save();
            return redirect()->route('admin.category');
        } else {
            return redirect()->back()->with('error', 'The category already exists');
        }
    }

    public function saveChanges($category, $r)
    {
        $category->name = $r->name;
        $category->show_at_home = $r->show_at_home;
        $category->status = $r->status;
    }

    public function imageProcess($category, $r)
    {
        $icon = $category->icon_image;
        $bg = $category->bg_image;

        if ($r->icon) {
            $iconPath = $this->uploadImg(
                $r,
                'icon',
                $icon ? $icon : null
            );
            if ($iconPath) {
                $category->icon_image = $iconPath;
            }
        }
        if ($r->bg_img) {
            $bgPath = $this->uploadImg(
                $r,
                'bg_img',
                $bg ? $bg : null
            );
            if ($bg) {
                $category->bg_image = $bgPath;
            }
        }
    }

    public function checkTitleAlreadyPresent($category, $r)
    {
        $c = DB::table('categories')
            ->selectRaw('count(id) as no ')
            ->whereNot('id', $category->id)
            ->where('name', $r->name)
            ->first();
        return $c;
    }
}
