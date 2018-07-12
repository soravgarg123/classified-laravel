<?php
    if (!isset($pageNo)) {
        $pageNo = 0;
    }
?>

<ul class="tabbable faq-tabbable margin-bottom-normal">
    <li class="{{ ($pageNo == 1) ? 'active' : '' }}"><a href="#">{{ $langLbl['Dashboard'] }}</a></li>
    <li class="{{ ($pageNo == 2) ? 'active' : '' }}"><a href="#">{{ $langLbl['Consumer Management'] }}</a></li>
    <li class="{{ ($pageNo == 3) ? 'active' : '' }}"><a href="#">{{ $langLbl['Marketing Tools'] }}</a></li>
    <li class="{{ ($pageNo == 4) ? 'active' : '' }}"><a href="#">{{ $langLbl['Comments Management'] }}</a></li>
    <li class="{{ ($pageNo == 5) ? 'active' : '' }}"><a href="#">{{ $langLbl['Rating Management'] }}</a></li>
    <li class="{{ ($pageNo == 6) ? 'active' : '' }}"><a href="#">{{ $langLbl['Feedback Management'] }}</a></li>
    <li class="{{ ($pageNo == 7) ? 'active' : '' }}"><a href="#">{{ $langLbl['Offer Management'] }}</a></li>
    <li class="{{ ($pageNo == 8) ? 'active' : '' }}"><a href="#">{{ $langLbl['Loyalty Management'] }}</a></li>
    <li class="{{ ($pageNo == 10) ? 'active' : '' }}"><a href="#">{{ $langLbl['Settings'] }}</a></li>
    <li class="{{ ($pageNo == 9) ? 'active' : '' }}"><a href="{{ URL::route('company.auth.profile') }}">{{ $langLbl['Company Profile'] }}</a></li>
</ul>
