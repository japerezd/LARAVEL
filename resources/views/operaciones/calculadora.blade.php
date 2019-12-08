@extends("layouts.app2")
@section("title","Calculadora")

@section("content")
<h1>Calculadora Laravel</h1>

  
            <form action="{{ route('calculadora.index') }}" method="POST">
              @csrf
            <fieldset>
            
           <legend>Calculadora</legend>
                <label for="num1" >Número 1</label>  <input type="text" name="num1"> <br>
                <label for="num2">Número 2</label> <input type="text" name="num2"> <br>
                <label for="operaciones">Operación</label> 
                <select name="operaciones" id="">
                    <option value="sumar">Sumar</option>
                    <option value="restar">Restar</option>
                    <option value="dividir">Dividir</option>
                    <option value="multiplicar">Multiplicar</option>
                </select>
               <button type="submit">Enviar</button>
                </fieldset>
            </form>
@endsection
