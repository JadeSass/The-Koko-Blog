<header class="navbar-fixed">
    <nav class="black-text white-text nav-extended nav-extend">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo left blue-text">Koko Blog</a>
            <form action="/results" method="GET" class="container">
                <div class="input-field hoverable">
                    <input type="search" class="searchnav" placeholder="Search..."  id="search" name="query" required>
                    <label for="search" class="label-icon grey-text text-darken-3"><i class="fa fa-search search grey-text text-darken-3"></i></label>
                    <!-- <div class="ht" style="height: 30vh;">
                        ttyyy
                    </div> -->
                </div>
            </form>
        </div>

        <div class="nav-content center center-align nav-stick container-tab">
          <ul class="tabs tabs-transparent row">
                <li class="tab active-nav"><a href="{{route('index')}}" class="refs"><i class="fa fa-home navcon"></i> Home</a></li>
                @foreach($categories as $category)
                <li class="tab"><a href="{{route('post.index')}}" class="refs"><i class="fa fa-image navcon"></i> {{$category->name}}</a></li>
                @endforeach
                <li class="tab">
                    <div class="switch theme-switch-wrapper">
                        <label class="theme-switch">
                            Light <input type="checkbox" id="checkbox"><span class="lever"></span> Dark
                        </label>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
