<?php

namespace App\Admin\Controllers;

use App\Models\Label;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LabelsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '标签管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Label());

        $grid->column('id', 'ID')->sortable();
        $grid->column('name', '名称');
        // $grid->column('introduction', '介绍')->display(function($text){
        //     return \Str::limit($text, 30, '...');
        // });
        $grid->column('topics', '博文数')->display(function ($topics) {
            $count = count($topics);
            return $count;
        })->sortable();

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
        $show = new Show(Label::findOrFail($id));

        $show->field('id', 'ID');
        $show->field('name', '名称');
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
        $form = new Form(new Label());

        $form->text('name', '名称');
        $form->textarea('introduction', '介绍');

        return $form;
    }
}
