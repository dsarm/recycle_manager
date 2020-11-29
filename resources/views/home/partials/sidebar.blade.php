<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">

            </li>
            <li>
                <a href="{{ route('home.index') }}"><i class="fa fa-dashboard fa-fw"></i> {{ trans('common.sidebar.dashboard') }}</a>
            </li>
            <li>
                <a href="{{ route('home.users') }}"><i class="fa fa-table fa-fw"></i> {{ trans('common.sidebar.users') }}</a>
            </li>
            <li>
                <a href="{{ route('home.settings') }}"><i class="fa fa-cog fa-fw"></i> {{ trans('common.sidebar.settings') }}</a>
            </li>
            <li>
                <a href="{{ route('home.recycles') }}"><i class="fa fa-recycle fa-fw"></i> {{ trans('common.sidebar.recycles') }}</a>

                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('home.recycles') }}">list</a>
                    </li>
                    <li>
                        <a href="{{ route('home.recycles.map') }}">map</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->