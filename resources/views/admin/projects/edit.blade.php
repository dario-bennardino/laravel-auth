@extends('layouts.admin')

@section('content')
    <h1>Edit Project</h1>


    <form action="{{ route('admin.projects.update', $project) }}" method="POST" id="form-edit-{{ $project->id }}">
        @csrf
        @method('PUT')
        <td>
            <input type="text" value="{{ $project->title }}" name="title">
        </td>
        <td>
            <input type="text" value="{{ $project->description }}" name="description">
        </td>
        <td>
            <input type="date" value="{{ $project->creation_date }}" name="creation_date">
        </td>
        <td>
            <button class="btn btn-warning btn-sm me-1" onclick="submitForm( {{ $project->id }} )"><i
                    class="fa-solid fa-pencil"></i>
            </button>
        </td>
    </form>
@endsection
