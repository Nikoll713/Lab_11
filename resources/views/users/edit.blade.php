@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Usuario</div>

                <div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <h6>Por favor corrige los errores debajo:</h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
        @foreach($posts as $user)
        
    <form action="{{ url('/users',$user) }}" method="post"  enctype="multipart/form-data">
    @csrf
            
        {{ csrf_field() }}
        <div class="form-group row" >
        <label for="name" class="col-md-4 col-form-label text-md-right">Nombre:</label>
        <div class="col-md-6">
        <input type="text" name="name" id="name" placeholder="Nikoll Bonilla" value="{{ old('name', $user->name) }}">
        </div>
        </div>
        
        <div class="form-group row" >
        <label for="email" class="col-md-4 col-form-label text-md-right">Correo electrónico:</label>
        <div class="col-md-6">
        <input type="email" name="email" id="email" placeholder="nikoll@gmail.com" value="{{ old('email', $user->email) }}">
        </div>
        </div>

        <div class="form-group row" >
        <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña:</label>
        <div class="col-md-6">
        <input type="password" name="password" id="password" placeholder="Mayor a 8 caracteres">
        </div>
        </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Editar
                    </button>
                </div>
            </div>        
        @endforeach
        
    </form>
    
    <form action="{{route('user.delete',$user->id)}}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('delete')
             <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Eliminar
                    </button>
                </div>
            </div>
                
             
    </form> 
    
</div>
</div>
</div>
</div>
</div> 
@endsection