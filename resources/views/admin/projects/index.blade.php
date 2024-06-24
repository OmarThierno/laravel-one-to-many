@extends('layouts.my-admin')

@section('content')
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h1>Project</h1>
      <a href="{{route('admin.projects.create')}}" class="btn btn-primary">Created</a>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">name</th>
          <th scope="col">description</th>
          <th scope="col">programming_languages</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)
          <tr>
            <th scope="row">{{$project->id}}</th>
            <td>{{$project->name}}</td>
            <td>{{$project->description}}</td>
            <td>{{$project->programming_languages}}</td>
            <td>
              <a href="{{route('admin.projects.show', ['project' => $project->slug])}}" class="btn btn-success">SHOW</a>
              <a href="{{route('admin.projects.edit', ['project' => $project->slug])}}" class="btn btn-warning">Modify</a>
              <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
            
        @endforeach

      </tbody>
    </table>
  </div>


@endsection