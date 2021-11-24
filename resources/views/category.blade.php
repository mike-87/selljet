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

        <h2>{{$category}}</h2>
        @if(count($ads) > 0)
        <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($ads as $ad)
            <div class="col">
                <div class="card card-style">
                    <img src="{{asset('images/')}}/{{$ad->image}}" class="card-img-top" alt="img">
                    <div class="card-body">
                        <h5 class="card-title">{{$ad->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$ad->name}}</h6>
                        <p class="card-text">{{substr($ad->description, 0, 40)}}...</p>
                        <p class="card-text"><b>Postavljeno:</b> {{date('d. m. Y', strtotime($ad->created_at))}} u {{date('H.i', strtotime($ad->created_at))}}h</p>
                        <a href="/ad/preview/{{$ad->ads_id}}" class="btn btn-primary">Detaljnije</a>
                    </div>
                </div>
            </div>
        
        @endforeach
        </div>
        <div class="row mt-5">
           <div class="d-flex justify-content-end">
                {{$ads->links()}}
            </div> 
        </div>
        @else
        <div class="row mt-5">
           <div class="d-flex justify-content-center">
                <h3><i>Ne postoje oglasi u ovoj kategoriji</i></h3>
            </div>
            <div class="d-flex justify-content-center">
                <img src="{{asset('images/no-results.png')}}" alt="no-results.png">
            </div>
        </div>
        @endif
    </div> 
    
    <!-- Modals -->
    @include('modals.registerModal')
    @include('modals.loginModal')
    @include('modals.postAdModal')
</div>
@include('core.footer')
