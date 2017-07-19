<?php

namespace App\Http\Controllers\Admin;

use App\RashodomerPodachaMarka;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RashodomerPodachaMarkaController extends CRUDMarksController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new RashodomerPodachaMarka();
    }

    public $view_directory = 'rashodomer_podacha_marka';
    public $route = 'rashodomer_podacha_marka';

    public $add_message = 'Марка расходомера на подаче успешно добавлена';
    public $edit_message = 'Марка расходомера на подаче успешно отредактирована';
    public $delete_message = 'Марка расходомера на подаче успешно удалена';
}
