@extends('App.Layout.Main')

@section('content')
    @foreach($oEvaluacionesList as $oEvaluacion)
        <section class="well well4 parallax text-center" data-url="/assets/app/images/parallax4-1.jpg" data-mobile="true"
             data-speed="0.6">
      <div class="container">
        <h2>
          {{ $oEvaluacion->nombre }}
        </h2>

        <p class="white ins1">
          {{ $oEvaluacion->descripcion }}
        </p>
        <a href="/app/requisitos/{{ $oEvaluacion->id }}" class="btn btn-primary">Ingresar a Evaluación</a>
      </div>
    </section>
    @endforeach
@endsection