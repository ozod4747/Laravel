<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('admin.post.index') }}" class="brand-link">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.post.index') }}"
                       class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Posts
                            <span class="badge badge-info right">{{ $posts->total() }}</span>
                        </p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>

</aside>
