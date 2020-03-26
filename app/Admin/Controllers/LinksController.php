<?php

namespace App\Admin\Controllers;

use App\Models\link;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LinksController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '友链管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new link());

        $grid->column('id', 'ID')->sortable();
        $grid->column('name', '名称');
        $grid->column('url', 'URL');
        $grid->column('created_at', '创建时间');
        $grid->column('updated_at', '更新时间');

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
        $show = new Show(link::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('name', '名称');
        $show->field('url', 'URL');
        $show->field('created_at', '创建时间');
        $show->field('updated_at', '更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new link());

        $form->text('name', '名称');
        $form->url('url', 'URL');

        return $form;
    }
}
