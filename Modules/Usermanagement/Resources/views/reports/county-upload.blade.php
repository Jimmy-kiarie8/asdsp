@extends('layouts.app')

<style>
    .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        padding: 20px;
        width: 700px;
        margin: 0 auto;
    }

    /* Add a style for the form itself to ensure proper spacing and alignment */
    form {
        display: flex;
        flex-direction: column;
        max-width: 300px;
        /* or any width you prefer */
        margin: auto;
        /* to center the form in the page */
        gap: 10px;
        /* adds space between form elements */
    }

    /* Style for each input field and select box */
    input,
    select {
        padding: 8px;
        margin: 5px 0;
        /* adds space above and below the input */
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Style for the submit button */
    input[type="submit"] {
        padding: 10px;
        background-color: #4CAF50;
        /* green background */
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
        /* slightly darker green on hover */
    }

    /* Aligning the table cells and headers */
    table {
        width: 100%;
        /* makes the table use the full width of its container */
        border-collapse: collapse;
        /* removes space between borders */
    }

    th,
    td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
        /* adds a border to the bottom of each cell */
    }

    th {
        background-color: #f2f2f2;
        /* adds a background color to the header cells */
    }

    /* Hover effect for rows */
    tr:hover {
        background-color: #f5f5f5;
    }
</style>
@section('content')
    <div class="card" style="width: 78rem;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (isset($successMessage))
            <div class="alert alert-success">
                {{ $successMessage }}
            </div>
        @endif
        <div class="card-body">
            <form class="container" method="POST" action="{{ $url }}" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Title</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Title" name="title">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">County/National</label>
                        <select class="form-control form-control-sm" name="type" required>
                            <option value="">Select</option>
                            <option value="County">County</option>
                            <option value="National">National</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">County</label>
                        <select class="form-control form-control-sm" name="county">
                            <option value="">Select</option>
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
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>

    <br>
    <br>
    <br>
    <div class="card" style="width: 78rem;">
        <form class="container" method="get" action="{{ $url }}">
            <?= csrf_field() ?>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request()->search }}">
                </div>
                <div class="form-group col-md-2">
                <button type="submit" class="btn btn-success">Search</button>
                {{-- <input type="button" class="btn btn-success" id="inputEmail4" value="Search"> --}}
                </div>
            </div>
        </form>
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
        <div>
            {{ $reports->links() }}
        </div>
    </div>
@endsection
