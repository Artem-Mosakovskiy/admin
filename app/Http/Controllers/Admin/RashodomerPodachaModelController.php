<?php

namespace App\Http\Controllers\Admin;

use App\RashodomerPodachaMarka;
use App\RashodomerPodachaModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RashodomerPodachaModelController extends CRUDModelController
{
    public function __construct()
    {
        $this->model = new RashodomerPodachaModel();
        $this->parent_marka = new RashodomerPodachaMarka();
    }

    public $view_directory = 'rashodomer_podacha_model';
    public $route = 'rashodomer_model';

    public $add_message = 'Модель расходомера успешно добавлена';
    public $edit_message = 'Модель расходомера успешно отредактирована';
    public $delete_message = 'Модель расходомера успешно удалена';
}
