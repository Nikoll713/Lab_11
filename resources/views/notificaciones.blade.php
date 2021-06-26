@extends('layouts.app')

@section('content')
 <table class="table table-bordered">
  <thead class="thead-light">
    <tr>
      <th scope="col">Fecha</th>
      <th scope="col">Usuario</th>
      <th scope="col">Mensaje</th>
    </tr>
  </thead>
  <tbody>
    @foreach($notificaciones as $notificacion)
    <tr>
      <td>{{$notificacion -> created_at}}</td>
      <th>{{$notificacion -> data['user']}}</th>
      <th>{{$notificacion -> data['title']}}</th>
    </tr>
    @php
    $notificacion->markAsRead();
    @endphp
  @endforeach
  </tbody>
</table>

@endsection