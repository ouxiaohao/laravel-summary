<header>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand ouhao" href="{{ url('/') }}">OuHao</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">首页</a></li>
                    <li class="{{ Request::is('student/*') ? 'active' : '' }}">
                        <a href="{{ url('student/index') }}">学生管理系统</a>
                    </li>
                    <li class="{{ Request::is('file/*') ? 'active' : '' }}">
                        <a href="{{ url('file/index') }}">上传文件</a>
                    </li>
                    <li class="{{ Request::is('mail/*') ? 'active' : '' }}">
                        <a href="{{ url('mail/index') }}">发送邮件</a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">登录</a></li>
                    <li><a href="{{ url('/register') }}">注册</a></li>
                @else
                    <li>
                        <a href="javascript:;" class="dropdown-toggle" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" ">{{ csrf_field() }}
                            <input type="submit" value="退出">
                        </form>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>