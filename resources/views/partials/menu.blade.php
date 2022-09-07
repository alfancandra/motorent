<ul class="nav nav-primary">
    <!-- <li class="nav-item {{ Request::segment(1) === '' ? 'active' : null }}">
        <a href="">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
            <span class="badge badge-success"></span>
        </a>
    </li> -->
    
    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Action</h4>
    </li>
    <li class="nav-item {{ Request::segment(1) === 'motor' ? 'active' : null }}">
        <a href="{{ route('login.motor.index') }}">
            <i class="fas fa-motorcycle"></i>
            <p>Motor</p>
            <span class="badge badge-success"></span>
        </a>
    </li>
    <li class="nav-item {{ Request::segment(1) === 'sewa' ? 'active' : null }}">
        <a href="{{ route('login.sewa.index') }}">
            <i class="fas fa-book-open"></i>
            <p>Sewa</p>
            <span class="badge badge-success"></span>
        </a>
    </li>
    
</ul>