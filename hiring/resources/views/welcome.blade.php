<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name') }} - Hiring</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <nav>
    <div class="nav-wrapper green">
      <a href="/" class="brand-logo center">{{ Config('app.name')}} - Hiring</a>
    </div>
  </nav>

  <div class="container">

    <div class="row">
      <div class="col s12">
        <h3 class="center">Github User Search</h3>
      </div>
    </div>

    <form class="col s12 center-div" action="/" method="GET" role="search">
      <div class="row">
        <div class="center">
          <div class="input-field col s7">
            <input type="text" id="search" name="search">
            <label for="search">Enter a user from Github</label>
          </div>
          <button class="btn waves-effect waves-light green position" type="submit" name="action">Search
            <i class="material-icons right">search</i>
          </button>
        </div>
      </div>
    </form>

    @if ($userData)
    @if (isset($userData->message))
    @if (!empty($notFoundMsg))
    <div class="row">
      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row">
            <div class="col s12">
              <h5>{{ $notFoundMsg }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
    @else

    <div class="row">
      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card-panel grey lighten-5 z-depth-1">
          <div class="row">
            <div class="col s3">
              <img src="{{ $userData->avatar_url }}" alt="" class="circle responsive-img">
            </div>
            <div class="col s9">
              <h5>{{ $userData->name }}</h5>
              <p><strong>Usuário: </strong>{{ $userData->login }}</p>
            </div>
          </div>
          <p>{{ $userData->bio}}</p>
          @if (isset($userData->email))
          <p><strong>E-Mail: <strong>{{ $userData->email}}</p>
            @endif
            @if (isset($userData->location))
            <p><strong>Location: </strong>{{ $userData->location}}</p>
            @endif
            <p><strong>Nº of Public Repos: </strong>{{ $userData->public_repos}}</p>
            <div class="divider"></div>
            <a class="center" href="{{ $userData->html_url }}">{{ $userData->html_url}}</a>
          </div>
        </div>
      </div>
      @endif
      @endif

      @if(!empty($emptyMsg))
      <div class="row">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
          <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row">
              <div class="col s12">
                <h5>{{ $emptyMsg }}</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif



    </div>
    <!-- Scripts-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
  </body>
  </html>
