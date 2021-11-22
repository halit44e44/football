<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container">
        <h1 class="text-center">Welcome to League</h1>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Lig</th>
                        <th scope="col">Takım</th>
                        <th scope="col">T.Puan</th>
                        <th scope="col">T.Maç</th>
                        <th scope="col">Galibiyet</th>
                        <th scope="col">Beraber</th>
                        <th scope="col">Mağlubiyet</th>
                        <th scope="col">A.Gol</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $item)
                        <tr>
                            <th scope="row">{{ $item->id}}</th>
                            <td>{{ $item->leagues->name }}</td>
                            <td>{{ $item->teams->name }}</td>
                            <td>{{ $item->point }}</td>
                            <td>5</td>
                            <td>{{ $item->winPoint }}</td>
                            <td>{{ $item->draw }}</td>
                            <td>{{ $item->losePoint }}</td>
                            <td>{{ $item->point }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
