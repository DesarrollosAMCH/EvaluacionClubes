@extends('App.Layout.Main')

@section('content')
<section class="well well7">
      <div class="container">


        <div class="resp-tabs">
          <ul class="resp-tabs-list">
            <li >Todas las categorías</li>
            @foreach( $categoriasList as $categoria )
            <li >{{ $categoria->nombre }}</li>
            @endforeach
          </ul>
          <div class="resp-tabs-container">

            <!--
              Muestra todos los requisitos agrupados
            -->
            <div>
              <div class="row">
                @foreach( $oEvaluacion->requisitos as $oRequisito)
                  <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="thumbnail thumbnail4">
                      <a class="thumb" data-fancybox-group="2" href="/app/requisito/{{ $oRequisito->id }}">
                        <img src="/assets/app/images/page-4_img5.jpg" alt=""/>
                        <span class="thumb_overlay"></span>
                      </a>

                      <div class="caption">
                        <h6>
                          <a href="#">
                            {{ $oRequisito->nombre }}
                          </a>
                        </h6>

                        <p>
                          {{ $oRequisito->descripción}}
                        </p>
                        <a href="/app/requisito/{{ $oRequisito->id }}" class="btn-link">
                          <span class="fst" data-txt="Read More"></span>
                          <span class="snd" data-txt="Read More"></span>
                        </a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>


            <!--
              Muestra los requisitos separados por categoría
            -->
            @foreach( $categoriasList as $oCategoria )
            <div>
              <div class="row">
                @foreach( $oEvaluacion->requisitos as $oRequisito)
                  @if( $oRequisito->idCategoria == $oCategoria->id )
                    <div class="col-md-4 col-sm-6 col-xs-12">
                      <div class="thumbnail thumbnail4">
                        <a class="thumb" data-fancybox-group="2" href="/app/requisito/{{ $oRequisito->id }}">
                          <img src="/assets/app/images/page-4_img5.jpg" alt=""/>
                          <span class="thumb_overlay"></span>
                        </a>

                        <div class="caption">
                          <h6>
                            <a href="#">
                              {{ $oRequisito->nombre }}
                            </a>
                          </h6>

                          <p>
                            {{ $oRequisito->descripción}}
                          </p>
                          <a href="/app/requisito/{{ $oRequisito->id }}" class="btn-link">
                            <span class="fst" data-txt="Read More"></span>
                            <span class="snd" data-txt="Read More"></span>
                          </a>
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
</section>
@endsection