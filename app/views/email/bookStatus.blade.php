<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <div>
            <h4>Hi {{$user_name}}</h4>
        </div>
        <div>
            <p>Your booking was {{$status}} by {{$store_name}}</p>            
            <p>Book Date : {{ $book_date }}</p>
            <p>Duration : {{ $duration }}</p>                    
        </div>
        <hr/>
        <div>
            <b>From {{ SITE_NAME }} Team</b>
        </div>
    </body>
</html>