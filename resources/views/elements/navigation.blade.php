<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Меню</li>
    @if(\Illuminate\Support\Facades\Auth::user()->hasRole(1))
        <li>
            <a href="/admin/users">
                <i class="fa fa-user"></i> <span>Пользователи</span>
            </a>
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