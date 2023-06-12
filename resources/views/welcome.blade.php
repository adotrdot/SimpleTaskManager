<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Task Manager</title>

        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
    </head>
    <body class="mx-auto my-4 w-75">
        <h1 class="text-center">Simple Task Manager</h1>
        <h4 class="text-center">Simply manage your tasks!</h4>
        <div class="my-4 w-100 mx-auto">
            <a class="btn btn-primary w-100" href="{{ route('tasks.index') }}" role="button">Next</a>
        </div>
    </body>
</html>
