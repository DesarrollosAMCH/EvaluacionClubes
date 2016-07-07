@extends('App.Layout.Main')

@section('content')
    <section class="well well-9 well-9-mod">
        <div class="container text-center">
            <h3>{{ $oRequisito->nombre }}</h3>
            <p>{{ $oRequisito->valor }} pts.</p>

            <h6 class="offset-7">{{ $oRequisito->descripcion }}</h6>

            <!--action = bat/rd-mailform.php-->
            <form class='rd-mailform rd-mailform-contact text-center' method="post" action="{{ url('/app/requisito/guardar-requisito/') . '/'.$oRequisito->id }}">
                <!-- RD Mailform Type -->
                <input type="hidden" name="form-type" value="requisito"/>
                <!-- END RD Mailform Type -->

                <div class="form-group form-group-bottom" >
                    <label class="form-label date" data-add-placeholder style="text-align: left;" for="mailform-input-date">¿Cuando?</label>
                    <input type="date" id="mailform-input-date" name="fecha" data-constraints="@Date @NotEmpty"/>
                </div>

                <div class="form-group form-group-bottom">
                    <label class="form-label" data-add-placeholder for="mailform-input-address">¿Donde?</label>
                    <input id="mailform-input-address" type="text" name="donde" data-constraints="@NotEmpty @LettersOnly"/>
                </div>

                <div></div>

                <div class="form-group textarea">
                    <label class="form-label" data-add-placeholder for="mailform-input-textarea-1">¿Como?</label>
                    <textarea id="mailform-input-textarea-1" name="comentario" data-constraints="@NotEmpty"></textarea>
                </div>

                <!--
                <div class="form-group form-group-bottom select mfSelect">
                    <div class="flt-select-box">
                        <label class="form-label" data-add-placeholder for="mailform-input-select"></label>
                        <select name="gender" data-constraints="@SelectRequired" id="mailform-input-select">
                            <option>Buget</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>
                -->

                <div class="form-group btn-gr">
                    <button class="btn btn-bord btn-default" type="submit">Submit</button>
                    <button class="btn btn-bord btn-primary" type="reset">Reset</button>
                    <div class="mfInfo"></div>
                </div>
            </form>
        </div>
    </section>
@endsection