<?php

namespace App\Repositories;

use Exception;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsRepository
{
    protected $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function index($request)
    {
        $title = 'Settings';
        $request->merge(['per_page' => $request->per_page ?? 10]);
        $news = $this->news->paginate($request->per_page);
        return view('pages.news.index', compact('title', 'news'));
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $this->news->create($request->input());
            DB::commit();
            return redirect()->route('dashboard.settings.index', ['roleName' => strtolower(auth()->user()->role->name)])->with('success', 'Permission created');
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $this->news->where(['id' => $id])->update($request->except(['_method', '_token']));
            DB::commit();
            return redirect()->route('dashboard.settings.index', ['roleName' => strtolower(auth()->user()->role->name)])->with('success', 'Permission updated');
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $role = $this->news->find($id);
            $role->permissions()->delete();
            $role->delete();
            DB::commit();
            return redirect()->route('dashboard.settings.index', ['roleName' => strtolower(auth()->user()->role->name)])->with('success', 'Permission updated');
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
    }
}
