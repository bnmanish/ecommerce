<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact Enquiry</title>
</head>
<body>
<p>Hello</p>

<p>There is new contact enquiry from <b>{{ $emailData['name'] }}</b></p>
<p>Email : {{ $emailData['email'] }}</p>
<p>Mobile : {{ $emailData['mobile'] }}</p>
<p>City : {{ $emailData['city'] }}</p>
<p>Message :</p>
<p>{{ $emailData['message'] }}</p>
</body>
</html>