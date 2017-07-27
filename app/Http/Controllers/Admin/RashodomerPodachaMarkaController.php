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
    public $route = 'rashodomer_marka';

    public $add_message = 'Марка расходомера успешно добавлена';
    public $edit_message = 'Марка расходомера успешно отредактирована';
    public $delete_message = 'Марка расходомера успешно удалена';
}
