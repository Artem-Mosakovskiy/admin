<?php

namespace App\Http\Controllers\Admin;

use App\RashodomerObrabotkaMarka;

class RashodomerObrabotkaMarkaController extends CRUDMarksController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new RashodomerObrabotkaMarka();
    }

    public $view_directory = 'rashodomer_obrabotka_marka';
    public $route = 'rashodomer_obrabotka_marka';

    public $add_message = 'Марка расходомера на обработке успешно добавлена';
    public $edit_message = 'Марка расходомера на обработке успешно отредактирована';
    public $delete_message = 'Марка расходомера на обработке успешно удалена';
}
