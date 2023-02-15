<div class="col-sm-3">
    <ul class="nav nav-pills nav-stacked nav-email shadow mb-20">
        <li class="{{ (Request::is('dashboard') ? 'active' : '') }}">
            <a href="{{ route('dashboard') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li class="{{ (Request::is('dashboard/inbox') ? 'active' : '') }}">
            <a href="{{ route('dashboard.inbox') }}">
                <i class="fa fa-inbox"></i> Inbox  <span class="label pull-right">7</span>
            </a>
        </li>
        <li>
            <a href="{{route('user.edit')}}"><i class="fa fa-edit"></i> Edit Profile</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-certificate"></i> Important</a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-file-text-o"></i> Drafts <span class="label label-info pull-right inbox-notification">35</span>
            </a>
        </li>
        <li><a href="#"> <i class="fa fa-trash-o"></i> Trash</a></li>
        <li>
            <a href="{{ route('logout') }}">
                <i class="fa fa-folder-open"></i> Logout
            </a>
        </li>
    </ul><!-- /.nav -->

  
</div>