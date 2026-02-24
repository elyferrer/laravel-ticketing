<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket Assignment</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div>
        <div class="grid place-items-center bg-blue-500 h-24 text-center text-white">
            <h1 class="text-2xl font-bold">Hello World!</h1>
        </div>

        <div class="p-4">
            <h1 class="text-lg">Greetings, {{ $name }}</h1>

            <p class="text-md my-5">Ticket <strong>{{ $code }}</strong> was assigned to you</p>

            <a href="{{ $link }}" target="_blank" class="mt-6 bg-blue-600 text-white rounded px-4 py-1">View Ticket</a>
        </div>
    </div>
    
</body>
</html>