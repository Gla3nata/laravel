<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category:: with(['news'])
        ->select(['id', 'title', 'description', 'created_at'])
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.categories.index', [
            'categoryList' => $categories
        ]);
//        return "Список категрий"; $this->getCategory();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category:: create(
            $request->only(['title', 'color', 'description'])
        );

        if ($category) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория успешно создана');
        }
        return back()->with('error', 'Не удалось создать запись');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $statusCategory = $category->fill(
            $request->only(['title', 'color', 'description'])
        )->save();

        if ($statusCategory) {
            return redirect()->route('admin.categories.index')
                ->with('success', 'Категория успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
