@extends('layouts.base')

@section('title','Lista de empleados')

@section('content')
<h1>Index de la pagina</h1>
<a href="{{route('employee.create')}}">Registrar un nuevo usuario</a>
<table class="table table-dark">
    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $employee)
        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->middle_name}}</td>
            <td>{{$employee->email}}</td>
            <td>
                <form action="{{route('employee.destroy', $employee->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" onclick="return confirm ('¿Desea realmente borrar estas credenciales?')"
                        value="Borrar">
                </form>
            </td>
            <td>
                <a href="{{route('employee.edit', $employee->id)}}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
