<?php

namespace App\Admin\Controllers;

use App\Models\Topic;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Category;
use App\Models\Label;

class TopicsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '博文管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Topic());

        $grid->column('id', 'ID')->sortable();
        $grid->column('title', '标题');
        $grid->column('person', '来源');
        $grid->column('category.name', '分类');
        $grid->column('labels', '标签')->display(function ($labels) {

            $labels = array_map(function ($label) {
                return "<span class='label label-success'>{$label['name']}</span>";
            }, $labels);

            return join('&nbsp;', $labels);
        });

        $grid->column('view_count', '访问数')->sortable();
        $grid->column('order', '排序')->sortable();
        $grid->column('created_at', '发布时间');
        $grid->column('updated_at', '更新时间');
        $grid->actions(function($actions){
            $actions->disableView();
        });
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
        $show = new Show(Topic::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('title', '标题');
        $show->field('person', '来源');
        $show->field('category.name', '分类');
        $show->field('order', '排序');
        $show->field('body', '内容');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Topic());

        $form->text('title', '标题')->rules('required');

        $form->text('person', '来源')->rules('required');

        $form->select('category_id', '分类')->options('/admin/api/categories');

        $form->multipleSelect('labels', '标签')->options(Label::all()->pluck('name', 'id'))->rules('required');

        $form->number('order', '排序')->default(0);
        $form->simditor('body', '内容');

        return $form;
    }
}
