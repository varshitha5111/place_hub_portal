<?php

namespace App\Http\Controllers\Admin;

use App\Models\hero;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\heroUpdateRequest;
use App\Models\allList;
use App\Models\Category;
use App\Traits\uploadImage;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    use uploadImage;

    public function hero_index()
    {
        $hero = hero::first();
        
        return view('admin.hero.index', compact('hero'));
    }

    public function update(heroUpdateRequest $r)
    {

        hero::updateOrCreate(
            ['id'=>1],
            [
                'id' => 1,
                'title' => $r->title,
                'sub_title' => $r->sub,
                'banner' => !empty($r->banner) ? $this->uploadImg($r, 'banner', $r->oldImg) : $r->oldImg
            ]
        );
        return redirect()->back();
    }

}
