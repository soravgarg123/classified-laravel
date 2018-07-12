<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <div>
            <h2>Congratulation!</h2>
        </div>
        <div>
            <p>You get the offers from {{ SITE_NAME }}</p>
            <p>Offer Name : {{ $offer_name }}</p>
            <p>Offer Description : {{ $offer_description }}</p>
            <p>Offer Code : {{ $offer_code }}</p>
            <p>Company Name : <a href="{{ $company_link }}" target="_blank">{{ $company_name }} </a></p>        
        </div>
        <hr/>
        <div>
            <b>From {{ SITE_NAME }} Team</b>
        </div>
    </body>
</html>
