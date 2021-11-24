@include('core.header')
<div class="wrapper">
    @include('core.sidebar')

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <div class="btn-group ms-auto">
                <a class="btn btn-warning me-2" href="{{ url('/home') }}" role="button">Početna</a>

                <a class="btn btn-success adPost me-2" href="javascript:void(0)" role="button">Dodaj oglas</a>
                
              <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $user->fname}} {{$user->lname}}
              </button>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Dodaj oglas</a></li>
                <li><a class="dropdown-item" href="#">Moji oglasi</a></li>
                <li><a class="dropdown-item" href="#">Moj profil</a></li>
                @if($user->role == 1)
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Admin deo</a></li>
                @endif
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ url('/logout') }}">Odjava</a></li>
              </ul>
            </div>
                
        </nav>

        <h2>{{$adData->title}}</h2>
        <p><b>Oglas postavio:</b> {{$adData->fname}} {{$adData->lname}}</p>
        <p><b>Postavljeno:</b> {{date('d. m. Y', strtotime($adData->created_at))}} u {{date('H.i', strtotime($adData->created_at))}}h</p>
        <p><b>Lokacija:</b> {{$adData->location}}</p>
        <p><b>Kontakt telefon:</b> {{$adData->phone}}</p>
        <p><b>Opis:</b> <br>{{$adData->description}}</p>
        <div class="d-flex justify-content-center">
            <img class="bigger" src="{{asset('images/')}}/{{$adData->image}}">
        </div>
        
    </div> 
    
    <!-- Modals -->
    @include('modals.registerModal')
    @include('modals.loginModal')
    @include('modals.postAdModal')
</div>
@include('core.footer')
