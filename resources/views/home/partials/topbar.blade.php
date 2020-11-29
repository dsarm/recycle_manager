<ul class="nav navbar-top-links navbar-right">
    
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li>
                <a href="{{ route('home.users.edit', ['id' => $currentUser->id]) }} ">
                    <i class="fa fa-user fa-fw"></i>
                    User Profile
                </a>
            <li class="divider"></li>
            <li>
                <a href="{{ route('auth.logout') }}">
                    <i class="fa fa-sign-out fa-fw"></i> 
                    Logout
                </a>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
<!-- /.navbar-top-links -->