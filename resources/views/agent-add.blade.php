@extends('layouts.app')
@section('title', 'Agent Add')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <div class="remedy-form-wrapper agent-form-wrapper">
            <div class="remedy-logout-details-block">
                <h2>Add a <span>Sales Agent</span></h2>
                <span class="border-line"></span>
                <p>Enter your details below</p>
            </div>
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('agent.store') }}" method="POST" enctype="multipart/form-data" class="agent-form-handler dropzone" id="agent-form-handler">
                @include('agent-form')
            </form>
        </div>
    </div>
</section>
@endsection
