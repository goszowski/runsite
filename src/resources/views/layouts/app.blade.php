@extends('runsite::layouts.resources')

@section('app')

  <iframe src="" width="0" height="0" class="hidden" name="runsiteIframe" id="runsiteIframe"></iframe>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed rippler rippler-inverse" data-toggle="collapse" data-target="#top-nav" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="top-nav">

        <ul class="nav navbar-nav">
          <li class="active"><a href="#website" data-toggle="tab"><i class="icofont icofont-site-map"></i> Tree</a></li>
          <li><a href="#tools" data-toggle="tab"><i class="icofont icofont-ui-settings"></i> Tools</a></li>
        </ul>

        <ul class="nav navbar-nav">
          <li><a href="{{url('/')}}" target="_blank"><i class="icofont icofont-computer"></i> Open website</a></li>
        </ul>

        <div id="app-menu">
          @yield('app_menu')
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icofont icofont-ui-user"></i> Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="icofont icofont-settings"></i> Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#"><i class="icofont icofont-logout"></i> Separated link</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="sidebar">
    <div class="scroll">
      <div class="tab-content">
        <div class="tab-pane active" id="website">
          <nav class="tree">
            <ul>
              <li>
                <a href="#" class="rippler rippler-inverse"><i class="fa fa-home"></i> Головна сторінка</a>
                <ul>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="tree-icon icofont icofont-folder"></i> Налаштування</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="tree-icon icofont icofont-folder"></i> Статті</a>
                  </li>
                  <li class="open">
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="tree-icon icofont icofont-ui-folder"></i> Новини</a>
                    <ul>
                      <li>
                        <a href="#" class="rippler rippler-inverse"><i class="tree-icon icofont icofont-archive"></i> Коментарі</a>
                      </li>
                      <li>
                        <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <a href="#" class="rippler rippler-inverse"><i class="tree-icon icofont icofont-users-alt-4"></i> Автори</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Фотогалерея</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Налаштування</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Статті</a>
                  </li>
                  <li class="open">
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Новини</a>
                    <ul>
                      <li>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Коментарі</a>
                      </li>
                      <li>
                        <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Автори</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Фотогалерея</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Налаштування</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Статті</a>
                  </li>
                  <li class="open">
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Новини</a>
                    <ul>
                      <li>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Коментарі</a>
                      </li>
                      <li>
                        <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Автори</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Фотогалерея</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Налаштування</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Статті</a>
                  </li>
                  <li class="open">
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Новини</a>
                    <ul>
                      <li>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Коментарі</a>
                      </li>
                      <li>
                        <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Автори</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Фотогалерея</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Налаштування</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Статті</a>
                  </li>
                  <li class="open">
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Новини</a>
                    <ul>
                      <li>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Коментарі</a>
                      </li>
                      <li>
                        <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Автори</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Фотогалерея</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Налаштування</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Статті</a>
                  </li>
                  <li class="open">
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Новини</a>
                    <ul>
                      <li>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Коментарі</a>
                      </li>
                      <li>
                        <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Автори</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Фотогалерея</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Налаштування</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Статті</a>
                  </li>
                  <li class="open">
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Новини</a>
                    <ul>
                      <li>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Коментарі</a>
                      </li>
                      <li>
                        <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Автори</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Фотогалерея</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Налаштування</a>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Статті</a>
                  </li>
                  <li class="open">
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Новини</a>
                    <ul>
                      <li>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Коментарі</a>
                      </li>
                      <li>
                        <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        <a href="#" class="rippler rippler-inverse"><i class="fa fa-file"></i> Автори</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <span class="angle rippler rippler-inverse"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                    <a href="#" class="rippler rippler-inverse"><i class="fa fa-folder"></i> Фотогалерея</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>

        <div class="tab-pane" id="tools">
          <nav class="tree">
            <ul>
              <li>
                <a href="{{route('runsite.models.index')}}" target="runsiteIframe" class="rippler rippler-inverse"><i class="icofont icofont-database"></i> {{trans('runsite::model.app_name')}}</a>
              </li>
              <li>
                <a href="{{route('runsite.languages.index')}}" target="runsiteIframe" class="rippler rippler-inverse"><i class="fa fa-language"></i> {{trans('runsite::language.app_name')}}</a>
              </li>
              <li>
                <a href="{{route('runsite.usergroups.index')}}" target="runsiteIframe" class="rippler rippler-inverse"><i class="fa fa-users"></i> {{trans('runsite::usergroup.app_name')}}</a>
              </li>
              <li>
                <a href="{{route('runsite.users.index')}}" target="runsiteIframe" class="rippler rippler-inverse"><i class="fa fa-users"></i> {{trans('runsite::user.app_name')}}</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <div class="content">
    <div class="scroll" id="app-content">
      @if(\Session::has('alert-success'))
          <div class="alert alert-success">
            {{\Session::get('alert-success')}}
          </div>
      @endif
      @if(\Session::has('alert-error'))
          <div class="alert alert-danger">
            {{\Session::get('alert-error')}}
          </div>
      @endif
      @if(\Session::has('alert-warning'))
          <div class="alert alert-warning">
            {{\Session::get('alert-warning')}}
          </div>
      @endif
      @if(\Session::has('alert-info'))
          <div class="alert alert-info">
            {{\Session::get('alert-info')}}
          </div>
      @endif
      @yield('content')
    </div>
  </div>







  <nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control input-sm" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default btn-sm">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
@endsection
