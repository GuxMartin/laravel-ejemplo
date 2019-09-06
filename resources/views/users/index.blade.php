<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title> Usuarios </title>
 </head>
 <body>
    <h1> Usuarios </h1>
    @if(Session::has('notice'))
       <p> <strong> {{ Session::get('notice') }} </strong> </p>
    @endif
    <p><a href="{{ url ('users/create') }}">Crear nuevo usuario</a></p>
    @if($users->count())
       <table style="border: solid 1px #000;">
          <thead>
          <tr>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Nombre real </th>
             <th style="width: 200px; border-bottom: solid 1px #000;"> Email </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> Nivel </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> Estado </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> </th>
             <th style="width: 50px; border-bottom: solid 1px #000;"> </th>
          </tr>
          </thead>
          <tbody>
          @foreach($users as $item)
             <tr>
                <td style="text-align: center;"> {{ $item->name }} </td>
                <td style="text-align: center;"> {{ $item->email }} </td>
                <td style="text-align: center;"> {{ $item->level }} </td>
                <td style="text-align: center;"> {{ ($item->active) ? 'Sí' : 'No' }} </td>
                <td style="text-align: center;"> <a href='{{ url("users/{$item->id}") }}'>Ver</a> </td>
                <td style="text-align: center;"> <a href='{{ url("users/{$item->id}/edit") }}'>Editar</a></td>
                <td style="text-align: center;">
                  <form action="{{ url('users', [$item->id]) }}" method="POST">
                    {{ method_field('DELETE') }}
                    @csrf
                    <input type="submit" value="Eliminar">
                  </form>
                </td>
             </tr>
          @endforeach
          </tbody>
       </table>
    @else
       <p> No se han encontrado usuarios </p>
    @endif
 </body>
</html>
