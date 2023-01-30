@extends('layouts.admin')

@section('content')
   <h1>lista progetti</h1>
   <a href="{{route('admin.projects.create')}}" class="btn btn-success">Crea Progetto</a>
   <table class="table">
      <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col">nome</th>
            <th scope="col">customer</th>
            <th scope="col">azioni</th>
         </tr>
      </thead>
      <tbody>
            @foreach ($projects as $project)
               <tr>
                  <td>{{$project->id}}</td>
                  <td>{{$project->name}}</td>
                  <td>{{$project->customer}}</td>
                  <td>
                     <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-success">
                        <i class="fa-regular fa-eye"></i>
                     </a>
                     <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i>
                     </a>
                     <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                           <i class="fa-solid fa-trash-can"></i>
                        </button>
                     </form>
                  </td>
               </tr>
            @endforeach
      </tbody>
   </table>
@endsection