<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Меню</li>
    <li>
        <a href="/admin/users">
            <i class="fa fa-list"></i> <span>Узлы учета</span>
        </a>
    </li>
    @if(\Illuminate\Support\Facades\Auth::user()->hasRole(1))
        <li>
            <a href="/admin/users">
                <i class="fa fa-user"></i> <span>Пользователи</span>
            </a>
        </li>
        <li class="header">Редактируемые справочники</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-circle"></i> <span>Местоположение</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/admin/cities"><i class="fa fa-building-o"></i> Города</a></li>
                <li><a href="/admin/streets"><i class="fa fa-building"></i> Улицы</a></li>
                <li><a href="/admin/houses"><i class="fa fa-home"></i> Дома</a></li>
            </ul>
        </li>
        <li>
            <a href="/admin/resource">
                <i class="glyphicon glyphicon-certificate"></i> <span>Ресурсы</span>
            </a>
        </li>
        <li>
            <a href="/admin/ycompany">
                <i class="glyphicon glyphicon-home"></i> <span>УК</span>
            </a>
        </li>
        <li>
            <a href="/admin/rsocompany">
                <i class="glyphicon glyphicon-usd"></i> <span>РСО</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-thermometer-quarter"></i> <span>Тепловычислители</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/admin/warm_marka"><i class="fa fa-circle-o"></i> Марки</a></li>
                <li><a href="/admin/warm_model"><i class="fa fa-circle-o"></i> Модели</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Расходомеры на подаче</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/admin/rashodomer_podacha_marka"><i class="fa fa-circle-o"></i> Марки</a></li>
                <li><a href="/admin/rashodomer_podacha_model"><i class="fa fa-circle-o"></i> Модели</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Расходомеры на обработке</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/admin/rashodomer_obrabotka_marka"><i class="fa fa-circle-o"></i> Марки</a></li>
                <li><a href="/admin/rashodomer_obrabotka_model"><i class="fa fa-circle-o"></i> Модели</a></li>
            </ul>
        </li>
        <li>
            <a href="/admin/complect">
                <i class="fa fa-microchip"></i> <span>Комплект термопар</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-tachometer"></i> <span>Датчики давления</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/admin/power_podacha"><i class="fa fa-circle-o"></i> На подаче</a></li>
                <li><a href="/admin/power_obrabotka"><i class="fa fa-circle-o"></i> На обработке</a></li>
            </ul>
        </li>
    @endif

    {{-- <li class="treeview">
         <a href="#">
             <i class="fa fa-dashboard"></i> <span>Dashboard</span>
             <span class="pull-right-container">
               <i class="fa fa-angle-left pull-right"></i>
             </span>
         </a>
         <ul class="treeview-menu">
             <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
             <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
         </ul>
     </li>--}}
</ul>