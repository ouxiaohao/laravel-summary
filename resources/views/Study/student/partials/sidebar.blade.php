<aside>
<a href="{{ url('student/index') }}" class="list-group-item {{ Request::is('student/index') ? 'active' : '' }}">
    查看
</a>
<a href="{{ url('student/add') }}" class="list-group-item {{ Request::is('student/add') ? 'active' : '' }}">添加</a>
</aside>