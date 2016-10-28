<header>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand ouhao" href="{{ url('/') }}">OuHao</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">首页</a></li>
                    <li class="{{ Request::is('student/*') ? 'active' : '' }}"><a href="{{ url('student/index') }}">学生管理系统</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>