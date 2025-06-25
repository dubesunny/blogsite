<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <x-admin.sidebar.item name="Dashboard" icon="tachometer-alt" href="{{ route('dashboard') }}" class="{{request()->is('/') ? 'active':''}}" />


    <!-- Divider -->
    <hr class="sidebar-divider">
    <x-admin.sidebar.item name="User" icon="fa fa-user" href="{{ route('user.index') }}" class="{{request()->is('user*') ? 'active':''}}" />
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <x-admin.sidebar.item name="Category" icon="fa fa-bars" href="{{ route('category.index') }}" class="{{ request()->is('category.*') ? 'active':'' }}"/>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
