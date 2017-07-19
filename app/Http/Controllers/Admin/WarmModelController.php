<?php

namespace App\Http\Controllers\Admin;

use App\WarmMarka;
use App\WarmModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WarmModelController extends CRUDModelController
{
    public function __construct()
    {
        $this->model = new WarmModel();
        $this->parent_marka = new WarmMarka();
    }

    public $view_directory = 'warm_model';
    public $route = 'warm_model';

    public $add_message = 'Модель тепловычислителя успешно добавлена';
    public $edit_message = 'Модель тепловычислителя успешно отредактирована';
    public $delete_message = 'Модель тепловычислителя успешно удалена';
}
