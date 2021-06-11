@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a task</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('todolist.update', $todolist->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="tarea">TAREA:</label>
                <input type="text" class="form-control" name="tarea" value={{ $todolist->tarea }} />
            </div>

            <div class="form-group">
                <label for="descripcion">DESCRIPCION:</label>
                <input type="text" class="form-control" name="descripcion" value={{ $todolist->descripcion }} />
            </div>

            <div class="form-group">
                <label for="fecha_vencimiento">FECHA DE VENCIMIENTO:</label>
                <input type="date" class="form-control" name="fecha_vencimiento" value={{ $todolist->fecha_vencimiento }} />
            </div>

            <div class="form-group">
                <label for="estado">ESTADO:</label>
                <input type="text" class="form-control" name="estado" value={{ $todolist->estado }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
