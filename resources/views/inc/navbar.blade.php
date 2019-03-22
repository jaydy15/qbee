<nav class="navbar navbar-expand-lg navbar-dark bg-primary" id='nav'>
        <div class="container">
          <a class="navbar-brand" href="/">MyQBee</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/quizzes">Quizzes</a>
              </li>
              {{--  <li class="nav-item">
                    <a class="nav-link" href="/services">Services</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/posts">Blogs</a>
            </li>   --}}
            </ul>
            <ul class="nav navbar-nav nav-right">
               {{--  <li class="nav-item">
                    <a class="nav-link" href="/posts/create">Create Post</a>
              </li>    --}}
            
              @if (Auth::guest())
              <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
          @else
            <ul class="nav navbar-nav nav-right">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a></li>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
            </ul>
          @endif

          </div>
          
        </div>
      </nav>