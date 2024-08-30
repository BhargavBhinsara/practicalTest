@extends('admin.layout.app')
@section('contant')
    <div class="main d-flex justify-content-center">

        <div class="card mt-5 col-md-8">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <b>FORMS LIST</b>
                    </div>
                    <div class="col">
                        <a href="{{ route('form.create') }}" class="btn btn-success"> + CREATE</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($forms->isEmpty())
                    <h3>Forms not found!</h3>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 5%">#</th>
                                <th scope="col">form</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($forms as $form)
                                <tr>
                                    <td>{{ $form->id }}</td>
                                    <td>{{ $form->title }}</td>
                                    <td>
                                        <a href="">Edit</a>
                                        <form action="" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                        <a href="">Share</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
