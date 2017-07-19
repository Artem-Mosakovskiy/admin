<?php

namespace App\Http\Controllers\Admin;

use App\WarmMarka;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WarmMarkaController extends CRUDMarksController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new WarmMarka();
    }

    public $view_directory = 'warm_marka';
    public $route = 'warm_marka';

    public $add_message = 'Марка тепловычислителя успешно добавлена';
    public $edit_message = 'Марка тепловычислителя успешно отредактирована';
    public $delete_message = 'Марка тепловычислителя успешно удалена';
}
