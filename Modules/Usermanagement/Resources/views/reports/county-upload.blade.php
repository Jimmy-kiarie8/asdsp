@extends('layouts.app')


@section('content')

    <div class="card" style="width: 78rem;">
        <div class="card-body">
            <form class="container" method="POST" action="{{ $url }}" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Title</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Title" name="title">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">County</label>
                        <select class="form-control form-control-sm" name="county">

                            @foreach ($counties as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">File</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <br>
    <br>
    <br>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">County</th>
                <th scope="col">File</th>
                <th scope="col">Uploaded on </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $index => $item)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->county }}</td>
                    <td><a href="{{ $item->path }}" target="_blank">Download</a></td>
                    <td>{{ $item->created_at->format('D d M Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
