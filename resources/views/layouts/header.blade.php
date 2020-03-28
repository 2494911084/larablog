        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm shadow mb-3 bg-white rounded app-header">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ getSetting('name')?:config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item mr-4 {{ active_class(if_route('topics.index')) }}">
                          <a class="nav-link" href="{{ route('topics.index') }}">首页</a>
                        </li>
                        @foreach (getSetting('category') as $category)
                        <li class="nav-item mr-4 {{ active_class(if_route('categories.show') && if_route_param('category', $category->id)) }}">
                          <a class="nav-link" href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <form class="form-inline my-2 my-lg-0">
                          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜索</button>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
