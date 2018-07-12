@extends('company.layout')

@section('custom-styles')
<style>
    .control-label {
        font-weight: bold;
    }
    .page-container {
        background: #FFF;
    }
</style>
@stop

@section('main')
<div class="page-container page_wrap">
    <div class="page-contect-wrapper">
        <div class="page-content"> 
            <div class="col-sm-8 col-sm-offset-2 padding-bottom-lg">             
                <div class="col-md-3 col-sm-offset-2">
                    <div class="pricing pricing-active hover-effect">
                        <div class="pricing-head">
                            <h3>{{ $langLbl['Professional Basic'] }}
                                <span>
                                    Officia deserunt mollitia
                                </span>
                            </h3>
                            <h4>Free</h4>
                        </div>
                        <ul class="pricing-content list-unstyled">
                            <li>
                                <i class="fa fa-tags"></i>{{ $langLbl['VIEWING YOUR PROFESSIONAL DETAILS'] }}
                            </li>
                            <li>
                                <i class="fa fa-asterisk"></i>{{ $langLbl['PERSONAL ADMINISTRATOR PANEL'] }}
                            </li>
                            <li>
                                <i class="fa fa-heart"></i>{{ $langLbl['ONE SERVICE AND ONE OFFICE'] }}
                            </li>
                            <li>
                                <i class="fa fa-star"></i>{{ $langLbl['PERSONAL CONNECTION URL'] }}
                            </li>
                            <li>
                                <i class="fa fa-shopping-cart"></i>{{ $langLbl['INDEX PROFILE'] }}
                            </li>
                        </ul>
                        <div class="pricing-footer">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor.
                            </p>
                            <a href="{{ URL::route('company.auth.signup', array('basic','free') ) }}" class="btn btn-primary">
                                Sign Up <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @foreach($plans as $key => $plan)
                <div class="col-md-3">
                    <div class="pricing pricing-active hover-effect">
                        <div class="pricing-head pricing-head-active">
                            <h3>{{$plan->name}}
                                <span>
                                    Officia deserunt mollitia
                                </span>
                            </h3>
                            <h4>{{$plan->type == 'py' ? '<i>&euro;</i>'.$plan->price : 'Fee'}}</i>
                                <span>
                                    {{$plan->type == 'py' ? $langLbl['Per Year'] :  $langLbl['Per Service']}}
                                </span>
                            </h4>
                        </div>
                        <ul class="pricing-content list-unstyled">
                            <li>
                                <i class="fa fa-tags"></i>{{ $langLbl['VIEWING YOUR PROFESSIONAL DETAILS'] }}
                            </li>
                            <li>
                                <i class="fa fa-asterisk"></i>{{ $langLbl['PERSONAL ADMINISTRATOR PANEL'] }}
                            </li>
                            <li>
                                <i class="fa fa-heart"></i>{{ $langLbl['MULTIPLE SERVICES AND MULTIPLE OFFICES'] }}
                            </li>
                            <li>
                                <i class="fa fa-star"></i>{{ $langLbl['PERSONAL CONNECTION URL'] }}
                            </li>
                            <li>
                                <i class="fa fa-shopping-cart"></i>{{ $langLbl['INDEX PROFILE'] }}
                            </li>
                            <li>
                                <i class="fa fa-tree"></i>{{ $langLbl['OFFERS PUBLICATION'] }}
                            </li>
                            <li>
                                <i class="fa fa-child"></i>{{ $langLbl['SECTION PERSONAL ITEMS'] }}
                            </li>
                        </ul>
                        <div class="pricing-footer">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .
                            </p>
                            <a href="{{ URL::route('company.auth.signup', array('pro_'.$plan->type, $plan->price ) ) }}" class="btn btn-primary">
                                {{ $langLbl['Sign Up'] }} <i class="m-icon-swapright m-icon-white"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach                
            </div>
        </div>
    </div>
</div>
@stop

@stop
