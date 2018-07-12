<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
    	<h2>Hi {{$company_name}}</h2>
        <div>
            Welcome to Registration of  <b>{{ SITE_NAME }}</b>
        </div>
        <div>
            Click <a href="{{ $link }}">here</a> to activate your account
        </div>
        <hr/>
        <div>
            <b>From {{ SITE_NAME }} Team</b>
        </div>
    </body>
</html>
