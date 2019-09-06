<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title> Guardar usuario </title>
 </head>
 <body>
    <h1> Guardar usuario </h1>
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action='{{ url ("users/{$user->id}") }}' method="post">
      @csrf
      <label for="name">Nombre</label>
      <br />
      <input type="text" name="name" id="name" value="{{ $user->name }}">
      <br />
      <label for="email">Email</label>
      <br />
      <input type="text" name="email" id="email" value="{{ $user->email }}">
      <br />
      @if($user->id)
        <input type="hidden" name="_method" value="PUT">
      @else
        <label for="password">Contraseña</label>
        <br />
        <input type="password" name="password" id="password" value="">
        <br />
      @endif
      <label for="level">Nivel</label>
      <br />
      <select id="level" name="level">
        @for ($i = 1; $i <= 5; $i++)
          <option value="{{ $i }}" {{ $user->level == $i ? "selected":"" }}>{{ $i }}</option>
        @endfor
      </select>
      <br />
      <p>
        <input type="submit" value="Guardar usuario">
      </p>
    </form>

    <p><a href="{{ url ('users') }}">Cancelar</a></p>
 </body>
</html>
