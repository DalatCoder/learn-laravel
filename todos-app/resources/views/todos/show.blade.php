<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Todos</title>
</head>
<body>
<div class="container">
    @if($todo == null)
        TODO NOT FOUND
    @else
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center my-5">{{ $todo->name }}</h1>

                <div class="card">
                    <div class="card-header">Detail</div>
                    <div class="card-body">
                        {{ $todo->description }}
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
</body>
</html>
