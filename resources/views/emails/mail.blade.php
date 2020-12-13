<!DOCTYPE html>
<html>
<title>Email</title>
<body>
    <h1>Mail Testing with data</h1>
    <p>B/E Number: {{$email_data['be_number'] }}</p>
    <p>B/E Date: {{$email_data['be_date'] }}</p>
    <p>{{$email_data['ie_type']}}: {{$email_data['ie_name']}}</p>
    <p>Manifest No: {{$email_data['manifest_no']}}</p>
    <p>Manifest Date: {{$email_data['manifest_date']}}</p>
</body>
</html>
