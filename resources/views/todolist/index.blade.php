@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">

    <div class="col-sm-12">

    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div>
    @endif
    </div>

    <h1 class="display-3">Task</h1>  

    <div>
    <a style="margin: 19px;" href="{{ route('todolist.create')}}" class="btn btn-primary">New task</a>
    </div>  

  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>TAREA</td>
          <td>DESCRIPCION</td>
          <td>FECHA VENCIMIENTO</td>
          <td>ESTADO</td>
          <td>FECHA DE CREACION</td>
          <td>FECHA ACTUALIZACION</td>
        </tr>
    </thead>
    <tbody>
        @foreach($todolist as $todolist)
        <tr>
            <td>{{$todolist->id}}</td>
            <td>{{$todolist->tarea}}</td>
            <td>{{$todolist->descripcion}}</td>
            <td>{{$todolist->fecha_vencimiento}}</td>
            <td>{{$todolist->estado}}</td>
            <td>{{$todolist->created_at}}</td>
            <td>{{$todolist->updated_at}}</td>
            <td>
                <a href="{{ route('todolist.show',$todolist->id)}}" class="btn btn-primary">Details</a>
            </td>
            <td>
                <a href="{{ route('todolist.edit',$todolist->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('todolist.destroy', $todolist->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
