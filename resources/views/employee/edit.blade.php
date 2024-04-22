@extends('layouts.base')

@section('title','Editar credenciales')

@section('content')
<h1>formulario de edicion de empleado</h1>

<form action="{{route('employee.update', $employees->id)}}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nombre</label>
    <br>
    <input type="text" name="name" value="{{$employees->name}}" id="name">
    <br>
    @error('name')
    <span>*{{$message}}</span>
    @enderror

    <label for="middle_name">Apellido</label>
    <br>
    <input type="text" name="middle_name" value="{{$employees->middle_name}}" id="middle_name">
    <br>
    @error('middle_name')
    <span>*{{$message}}</span>
    @enderror

    <label for="email">Correo Electronico</label>
    <br>
    <input type="text" name="email" value="{{$employees->email}}" id="email">
    <br>
    @error('email')
    <span>*{{$message}}</span>
    @enderror

    <label for="password">contraseña</label>
    <br>
    <input type="password" name="password" value="{{$employees->password}}" id="password">
    <br>
    @error('password')
    <span>*{{$message}}</span>
    @enderror
    <br>

    <input type="submit" value="Guardar">
</form>

@endsection
