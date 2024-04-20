@extends('layouts.base')

@section('title','Creación de Credenciales')

@section('content')
<h1>Crear credenciales de empleado</h1>

<form action="{{route('employee.store')}}" method="POST">
    @csrf
    <label for="name">Nombre</label>
    <br>
    <input type="text" name="name" value="{{old('name')}}" id="name">
    <br>
    @error('name')
    <span>*{{$message}}</span>
    @enderror

    <label for="middle_name">Apellido</label>
    <br>
    <input type="text" name="middle_name" value="{{old('middle_name')}}" id="middle_name">
    <br>
    @error('middle_name')
    <span>*{{$message}}</span>
    @enderror

    <label for="email">Correo Electronico</label>
    <br>
    <input type="text" name="email" value="{{old('email')}}" id="email">
    <br>
    @error('email')
    <span>*{{$message}}</span>
    @enderror

    <label for="password">contraseña</label>
    <br>
    <input type="password" name="password" value="{{old('password')}}" id="password">
    <br>
    @error('password')
    <span>*{{$message}}</span>
    @enderror
    <br>

    <input type="submit" value="Save data">
</form>

@endsection
