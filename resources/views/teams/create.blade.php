@extends('_layout.default')

@section('content')

    <div class="container">
        <h1 class="text-center">Yeni Takım Ekle</h1>
        <div class="row">
            <form action="{{ route('footballTeams.store', $id) }}" method="POST">
                @csrf

                <div class="form-group mx-sm-3 mb-2">
                    <label for="name" class="sr-only">Takım Adı</label>
                    <input type="text" class="form-control" name="name" placeholder="Takım Adı">
                </div>

                <x-button :name="'Takım Ekle'" :color="'danger'" />
            </form>
        </div>

    </div>
@endsection
