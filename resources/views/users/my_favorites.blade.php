@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="text-center mb-3">
        <h3>My Favorite Companies</h3>
    </div>
    
    <!-- Favorite Companies -->
    @foreach ($myFavorites as $company)
    <div class="card mb-3">
        <div class="card-header">
            {{ Carbon\Carbon::parse($company->created_at)->diffForHumans() }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $company->name }}</h5>
            <p class="card-text"></p>
            <ul class="card-text pl-0">
                <li class="list-unstyled">Phone Number : {{ $company->phone }}</li>
                <li class="list-unstyled">Address : {{ $company->address }}</li>
            </ul>
        </div>
        @if (Auth::check())
        <div class="card-footer text-muted">
            <favorite
                :company={{ $company->id }}
                :favorited={{ $company->getIsFavoritedAttribute() ? 'true' : 'false' }}
                >
            </favorite>
        </div>
        @endif
    </div>
    @endforeach

</div>
@endsection