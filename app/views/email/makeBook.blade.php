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
            <p>You have booked on {{ SITE_NAME }}</p>
            <table>
            	<thead>
            		<tr>
            			<th>Service Name</th>
            			<th>Office</th>
            			<th>Address</th>
            			@if(!empty($book_date))
            			<th>Book Date</th>
            			@endif
            			@if(!empty($duration))
            			<th>Duration</th>
            			@endif
            			@if(!empty($delivery_days))
            			<th>Delivery Days</th>
            			@endif
            			<th>Total</th>
            		</tr>
            	</thead>
            	<tbody>
            		<tr>
            			<td>{{$store_name}}</td>
            			<td>{{$location}}</td>
            			<td>{{$addr}}</td>
            			@if(!empty($book_date))
            			<td>{{$book_date}}</td>
            			@endif
            			@if(!empty($duration))
            			<td>{{$duration}}</td>
            			@endif
            			@if(!empty($delivery_days))
            			<td>$delivery_days</td>
            			@endif
            			<td>$price</td>
            		</tr>
            	</tbody>
            </table>
           <br />
            <p>Message : {{$msg}}</p>
        </div>
        <hr/>
        <div>
            <b>From {{ SITE_NAME }} Team</b>
        </div>
    </body>
</html>
