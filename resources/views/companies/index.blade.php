@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Page Header -->
    <div class="text-center mb-3">
        <h3>Company List</h3>
    </div>

    <!-- Search input form -->
    <input class="form-control mb-3" type="search" v-model="search" placeholder="Search" aria-label="search">
    
    <!-- Companies with Vue + Bootstrap -->
    <div class="row">
        <div class="col-md-6" v-for="(company, index) in companies" v-bind:key="index">
            <div class="card mb-3">
                <div class="card-header">
                    @{{ company.created_date }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">@{{ company.name }}</h5>
                    <p class="card-text"></p>
                    <ul class="card-text pl-0">
                        <li class="list-unstyled">Phone Number : @{{ company.phone }}</li>
                        <li class="list-unstyled">Address : @{{ company.address }}</li>
                    </ul>
                </div>
                @if (Auth::check())
                <div class="card-footer text-muted">
                    <favorite
                        :company="company.id"
                        :favorited="company.is_favorited" 
                        >
                    </favorite>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection