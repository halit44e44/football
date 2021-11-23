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
    <h1 class="text-center">Yeni Lig Ekle</h1>
    <div class="row">
        <form action="{{ route('leagues.store') }}" method="POST">
            @csrf

            <div class="form-group mx-sm-3 mb-2">
                <label for="name" class="sr-only">Password</label>
                <input type="text" class="form-control" name="name" placeholder="Lig Adı">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <label for="season" class="sr-only">Password</label>
                <input type="text" class="form-control" name="season" placeholder="Sezonu">
            </div>
            <button type="submit" class="btn btn-danger">Lig Ekle</button>
        </form>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>