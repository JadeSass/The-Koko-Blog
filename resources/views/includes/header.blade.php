<header class="navbar-fixed">
    <nav class="black-text white-text nav-extended nav-extend">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo left blue-text"><img src="{{asset('img/logo.jpg')}}" height="140px" width="180px" class="responsive-img brand-img" alt=""></a>
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
                <li class="tab"><a href="{{route('category.all', ['id' => $category->id])}}" class="refs">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </nav>
</header>
