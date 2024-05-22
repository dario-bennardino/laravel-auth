@extends('layouts.admin')

@section('content')
    <h2>Projects</h2>

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="my-4">
        <form action="{{ route('admin.projects.store') }}" method="POST" class="d-flex">
            @csrf
            <input class="form-control me-2" type="search" placeholder="New Project" name="title">
            <input class="form-control me-2" type="search" placeholder="Description" name="description">
            <input class="form-control me-2" type="search" placeholder="Date" name="creation_date">
            <button class="btn btn-outline-success" type="submit">Send</button>
        </form>

    </div>

    <table class="table crud-table">
        <thead>
            <tr>
                <th scope="col">Projects</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $item)
                <tr>
                    <td>
                        <input type="text" value="{{ $item->title }}">
                    </td>
                    <td>
                        <input type="text" value="{{ $item->description }}">
                    </td>
                    <td>
                        <input type="text" value="{{ $item->creation_date }}">
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm"><i class="fa-solid fa-pencil"></i></button>
                        <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></i></button>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
