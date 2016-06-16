@extends('App.Layout.Main')

@section('content')
<section class="well well7">
      <div class="container">


        <div class="resp-tabs">
          <ul class="resp-tabs-list">
            <li>show all</li>
            <li>first category</li>
            <li>second category</li>
            <li>third category</li>
          </ul>
          <div class="resp-tabs-container">

            <div>
              <div class="row col-4_mod-1">
                @foreach( $oEvaluacion->requisitos as $oRequisito)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="thumbnail thumbnail4">
                    <a class="thumb" href="/app/requisito/{{ $oRequisito->id }}">
                      <img src="/assets/app/images/page-4_img1.jpg" alt=""/>
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
                        <span class="fst" data-txt="Ingresar"></span>
                        <span class="snd" data-txt="Ingresar"></span>
                      </a>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>


            <!--
            <div>
              <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="thumbnail thumbnail4">
                    <a class="thumb" data-fancybox-group="2" href="/assets/app/images/page-4_img5_original.jpg">
                      <img src="/assets/app/images/page-4_img5.jpg" alt=""/>
                      <span class="thumb_overlay"></span>
                    </a>

                    <div class="caption">
                      <h6>
                        <a href="#">
                          Fusce euismod consequa
                        </a>
                      </h6>

                      <p>
                        Rutrum dui a varius. Mauris ornare tortor in eleifend blanditu. Quisque
                        suscipit lacus vestibulum odio rhonc us, non iaculis lectus mattis.
                        Integer
                      </p>
                      <a href="#" class="btn-link">
                        <span class="fst" data-txt="Read More"></span>
                        <span class="snd" data-txt="Read More"></span>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="thumbnail thumbnail4">
                    <a class="thumb" data-fancybox-group="2" href="/assets/app/images/page-4_img6_original.jpg">
                      <img src="/assets/app/images/page-4_img6.jpg" alt=""/>
                      <span class="thumb_overlay"></span>
                    </a>

                    <div class="caption">
                      <h6>
                        <a href="#">
                          Vestibulum iaculis lacinia est
                        </a>
                      </h6>

                      <p>
                        Rutrum dui a varius. Mauris ornare tortor in eleifend blanditu. Quisque
                        suscipit lacus vestibulum odio rhonc us, non iaculis lectus mattis.
                        Integer
                      </p>
                      <a href="#" class="btn-link">
                        <span class="fst" data-txt="Read More"></span>
                        <span class="snd" data-txt="Read More"></span>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="thumbnail thumbnail4">
                    <a class="thumb" data-fancybox-group="2" href="/assets/app/images/page-4_img3_original.jpg">
                      <img src="/assets/app/images/page-4_img3.jpg" alt=""/>
                      <span class="thumb_overlay"></span>
                    </a>

                    <div class="caption">
                      <h6>
                        <a href="#">
                          Fusce euismod consequa
                        </a>
                      </h6>

                      <p>
                        Rutrum dui a varius. Mauris ornare tortor in eleifend blanditu. Quisque
                        suscipit lacus vestibulum odio rhonc us, non iaculis lectus mattis.
                        Integer
                      </p>
                      <a href="#" class="btn-link">
                        <span class="fst" data-txt="Read More"></span>
                        <span class="snd" data-txt="Read More"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div>
              <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="thumbnail thumbnail4">
                    <a class="thumb" data-fancybox-group="3" href="/assets/app/images/page-4_img4_original.jpg">
                      <img src="/assets/app/images/page-4_img4.jpg" alt=""/>
                      <span class="thumb_overlay"></span>
                    </a>

                    <div class="caption">
                      <h6>
                        <a href="#">
                          Proin dictum elementum
                        </a>
                      </h6>

                      <p>
                        Rutrum dui a varius. Mauris ornare tortor in eleifend blanditu. Quisque
                        suscipit lacus vestibulum odio rhonc us, non iaculis lectus mattis.
                        Integer
                      </p>
                      <a href="#" class="btn-link">
                        <span class="fst" data-txt="Read More"></span>
                        <span class="snd" data-txt="Read More"></span>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="thumbnail thumbnail4">
                    <a class="thumb" data-fancybox-group="3" href="/assets/app/images/page-4_img5_original.jpg">
                      <img src="/assets/app/images/page-4_img5.jpg" alt=""/>
                      <span class="thumb_overlay"></span>
                    </a>

                    <div class="caption">
                      <h6>
                        <a href="#">
                          Fusce euismod consequa
                        </a>
                      </h6>

                      <p>
                        Rutrum dui a varius. Mauris ornare tortor in eleifend blanditu. Quisque
                        suscipit lacus vestibulum odio rhonc us, non iaculis lectus mattis.
                        Integer
                      </p>
                      <a href="#" class="btn-link">
                        <span class="fst" data-txt="Read More"></span>
                        <span class="snd" data-txt="Read More"></span>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="thumbnail thumbnail4">
                    <a class="thumb" data-fancybox-group="3" href="/assets/app/images/page-4_img6_original.jpg">
                      <img src="/assets/app/images/page-4_img6.jpg" alt=""/>
                      <span class="thumb_overlay"></span>
                    </a>

                    <div class="caption">
                      <h6>
                        <a href="#">
                          Proin dictum elementum
                        </a>
                      </h6>

                      <p>
                        Rutrum dui a varius. Mauris ornare tortor in eleifend blanditu. Quisque
                        suscipit lacus vestibulum odio rhonc us, non iaculis lectus mattis.
                        Integer
                      </p>
                      <a href="#" class="btn-link">
                        <span class="fst" data-txt="Read More"></span>
                        <span class="snd" data-txt="Read More"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div>
              <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="thumbnail thumbnail4">
                    <a class="thumb" data-fancybox-group="4" href="/assets/app/images/page-4_img2_original.jpg">
                      <img src="/assets/app/images/page-4_img2.jpg" alt=""/>
                      <span class="thumb_overlay"></span>
                    </a>

                    <div class="caption">
                      <h6>
                        <a href="#">
                          Lacinia fermentum
                        </a>
                      </h6>

                      <p>
                        Rutrum dui a varius. Mauris ornare tortor in eleifend blanditu. Quisque
                        suscipit lacus vestibulum odio rhonc us, non iaculis lectus mattis.
                        Integer
                      </p>
                      <a href="#" class="btn-link">
                        <span class="fst" data-txt="Read More"></span>
                        <span class="snd" data-txt="Read More"></span>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="thumbnail thumbnail4">
                    <a class="thumb" data-fancybox-group="4" href="/assets/app/images/page-4_img3_original.jpg">
                      <img src="/assets/app/images/page-4_img3.jpg" alt=""/>
                      <span class="thumb_overlay"></span>
                    </a>

                    <div class="caption">
                      <h6>
                        <a href="#">
                          Donec in velit vel ipsum
                        </a>
                      </h6>

                      <p>
                        Rutrum dui a varius. Mauris ornare tortor in eleifend blanditu. Quisque
                        suscipit lacus vestibulum odio rhonc us, non iaculis lectus mattis.
                        Integer
                      </p>
                      <a href="#" class="btn-link">
                        <span class="fst" data-txt="Read More"></span>
                        <span class="snd" data-txt="Read More"></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            -->
          </div>
        </div>
      </div>
</section>
@endsection