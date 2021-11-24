@include('core.header')
<div class="wrapper">
    @include('core.sidebar')

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            
            <ul class="nav navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link loginUser" href="javascript:void(0)">Prijava</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link registerUser" href="javascript:void(0)">Registracija</a>
                </li>
            </ul>
                
        </nav>

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
                    <a href="javascript:void(0)" class="btn btn-primary loginUser">Prijavite se za detaljne informacije</a>
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

        
    </div>
    <!-- Modals -->
    @include('modals.registerModal')
    @include('modals.loginModal')
</div>
@include('core.footer')
