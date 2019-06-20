<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View notify</title>
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('6c3775f766196d272451', {
            cluster: 'ap1',
            forceTLS: true
        });

        var channel = pusher.subscribe('user-{{Auth::user()->id}}');
        channel.bind('my-event', function(data) {
            console.log(JSON.stringify(data));
        });
        var channel2=  pusher.subscribe('group_class');
        channel2.bind('my-event', function(data) {
            console.log(JSON.stringify(data));
        });
    </script>
</head>
<body>

</body>
</html>