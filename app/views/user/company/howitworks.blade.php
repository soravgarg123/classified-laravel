@extends('user.layout')

@section('custom-styles')
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}
{{ HTML::style('/assets/metronic/frontend/onepage/css/custom.css') }}
{{ HTML::style('/assets/metronic/global/plugins/bootstrap-modal/css/bootstrap-modal.css') }}
{{ HTML::style('/assets/css/bootstrap-checkbox.css') }}
{{ HTML::style('/assets/css/howitworks.css') }}
<style>
    .faq-tabbable i {
        color: #000 !important;
    }
</style>
@stop

@section('main')
<?php
$nameVal = 'name' . $currentLanguage;
?>
<div class="container">
    <div class="row">        
        <div class="col-md-12 margin-top-normal">

            @if (isset($alert))
            <div class="alert alert-{{ $alert['type'] }} alert-dismissibl fade in">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">{{ $langLbl['Close'] }}</span>
                </button>
                <p>
                    {{ $alert['msg'] }}
                </p>
            </div>
            @endif

        <div id="content"><div class="clear"></div>
          <div class="cuerpo funziona-profe-cli">
            <div class="col-md-4">
                <img style="cursor:pointer;" class="professional" src="{{ HTTP_IMG_PATH }}icn-profesio.png" alt="icn-profesio.png"><br><span style="cursor:pointer;" class="subti-profe-cliente professional">{{ $langLbl['Professional'] }}</span></div>
            <div class="col-md-4">
                <img src="{{ HTTP_IMG_PATH }}icono-dove.png" alt="icono-dove.png"></div>
            <div class="col-md-4">
                <img style="cursor:pointer;" class="user" src="{{ HTTP_IMG_PATH }}icn-cliente.png" alt="icn-cliente.png"><br><span style="cursor:pointer;" class="subti-profe-cliente user">{{ $langLbl['User'] }}</span></div>
            <div class="clear"></div>
          </div>
        <div class="professinal_section">
            <?php 
            $currentLang = $_COOKIE['current_lang'];
            $title = "title".$currentLang;
            $content = "content".$currentLang;
            $i =1; foreach($howitworks as $h) { if($h->type == "Professional") { ?>
            <div class="row cont-demo">
                <div class="col-md-6">
                  <div class="paso-img">
                    <img src="{{ HTTP_HOWITWORKS_PATH }}{{ $h->image }}" class="img-responsive inline-block" alt="Responsive image"></div>
                </div>
                <div class="col-md-6">
                  <div class="paso-tex">
                    <h5>{{ $h->$title }}</h5>
                    {{ $h->$content }}</div>
                </div>
            </div>
            <?php } } ?>
        </div>
        <div class="user_section">
            <?php 
            $i =1; foreach($howitworks as $h) { if($h->type == "User") { ?>
            <div class="row cont-demo">
                <div class="col-md-6">
                  <div class="paso-img">
                    <img src="{{ HTTP_HOWITWORKS_PATH }}{{ $h->image }}" class="img-responsive inline-block" alt="Responsive image"></div>
                </div>
                <div class="col-md-6">
                  <div class="paso-tex">
                    <h5>{{ $h->$title }}</h5>
                    {{ $h->$content }}</div>
                </div>
            </div>
            <?php } } ?>
        </div>

        </div>
        </div>
    </div>            
</div>
</div>
@stop

@section('custom-scripts')
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-modal/js/bootstrap-modal.js') }}
{{ HTML::script('/assets/metronic/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}
{{ HTML::script('/assets/js/bootstrap-checkbox.js') }}
<script type="text/javascript">
    $(document).ready(function(){
        $('.professinal_section').show();
        $('.user_section').hide();
        $('.professional').click(function(){
            $('.professinal_section').show();
            $('.user_section').hide();
        });
        $('.user').click(function(){
            $('.user_section').show();
            $('.professinal_section').hide();
        });
    });
</script>
@stop
@stop