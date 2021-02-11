<footer class="page-footer black lighten-3">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Footer Content</h5>
        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Sitemap</h5>
        <ul>
        @foreach($categories as $category)
            <li><a class="grey-text text-lighten-3" href="{{route('category.all', ['id' => $category->id])}}">{{$category->name}}</a></li>
        @endforeach
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
        <p>&copy; 2021 KokoBlog, Inc.</p>
    </div>
  </div>
</footer>
