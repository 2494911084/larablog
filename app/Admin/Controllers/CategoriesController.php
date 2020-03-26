<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class CategoriesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '博文分类';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->column('id', 'ID')->sortable();
        $grid->column('name', '名称');
        // $grid->column('introduction', '介绍')->display(function($introduction){
        //     return \Str::limit($introduction, 30, '...');
        // });
        $grid->column('topics', '文章数')->display(function($topics){
            $count = count($topics);
            return $count;
        })->sortable();
        $grid->column('order', '排序')->sortable();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('name', '名称');
        $show->field('order', '排序');
        $show->field('introduction', '介绍');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category());

        $form->text('name', '名称');
        $form->number('order', '排序');
        $form->textarea('introduction', '介绍');

        return $form;
    }

    // 博文分类 Api
    public function apiIndex(Request $request)
    {
        $q = $request->get('q');

        return Category::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }
}
