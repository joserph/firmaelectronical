@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tests</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>{{ $test->titulo }}</h1>
                            <h3>{{ $test->contenido }}</h3>
                            <img style="width:500px;height:600px;" src="{{ $url }}" alt="Test">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

