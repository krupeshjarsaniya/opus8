@extends('layouts.app')
@section('title', 'Agent Preview')
@section('content')
<section class="remedy-layout-wrapper">
    <div class="container">
        <p class="text-center agent-not-founds">{{ $message }}</p>
    </div>
</section>
@endsection