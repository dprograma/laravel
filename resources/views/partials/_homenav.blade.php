<div class="container">
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">My Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample09">
          <ul class="navbar-nav mr-auto">
            <li class="{{ Request::is('welcome') ? "active" : ""}}">
              <a class="nav-link" href="/welcome">Home</a>
            </li>
            <li class="{{ Request::is('blog') ? "active" : ""}}">
              <a class="nav-link" href="/blog">Blog</a>
            </li>
            <li class="{{ Request::is('about') ? "active" : ""}}">
              <a class="nav-link" href="/about">About Us</a>
            </li>
            <li class="{{ Request::is('contact') ? "active" : ""}}">
              <a class="nav-link" href="/contact">Contact Us</a>
            </li>
            @guest
              <a href="#"></a>
            @else
            <li class="{{ Request::is('posts/create') ? "active" : ""}}">
              <a class = "nav-link" href="{{ route('posts.create') }}">Create Post</a>
            </li>
            @endguest
          </ul>
          <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Hello
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                     <a class = "dropdown-item" href="{{ route('posts.index') }}">Post</a>
                     <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
                     <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                      </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>         
            @endguest
          </ul>
        </div>
      </nav>
</div>