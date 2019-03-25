<nav class="navbar navbar-expand-lg navbar-dark bg-primary pb-1" id='nav' style="background-color:black !important">
        <div class="container">
          <a class="navbar-brand" href="/">My<span style="color:red">Q</span>Bee</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/"><span style="color:red">H</span>ome <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/quizzes"><span style="color:red">Q</span>uizzes</a>
              </li>

            </ul>
            <ul class="nav navbar-nav nav-right">
               
            
              @if (Auth::guest())
              <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><span style="color:red">L</span>ogin</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><span style="color:red">R</span>egister</a></li>
          @else
            <ul class="nav navbar-nav nav-right">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><span style="color:red">D</span>ashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><span style="color:red">L</span>ogout</a></li>
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
            </ul>
          @endif

          </div>
          
        </div>
      </nav>