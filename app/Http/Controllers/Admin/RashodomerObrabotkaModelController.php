<?php

namespace App\Http\Controllers\Admin;

use App\RashodomerObrabotkaMarka;
use App\RashodomerObrabotkaModel;

class RashodomerObrabotkaModelController extends CRUDModelController
{
    public function __construct()
    {
        $this->model = new RashodomerObrabotkaModel();
        $this->parent_marka = new RashodomerObrabotkaMarka();
    }

    public $view_directory = 'rashodomer_obrabotka_model';
    public $route = 'rashodomer_obrabotka_model';

    public $add_message = 'Модель расходомера на обработке успешно добавлена';
    public $edit_message = 'Модель расходомера на обработке успешно отредактирована';
    public $delete_message = 'Модель расходомера на обработке успешно удалена';
}
