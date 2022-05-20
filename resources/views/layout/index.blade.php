
   
@extends('layout.blog')

@section('content')


<div class="jumbotron container">

    <h1 class="display-4">Hello</h1>
    <p class="lead"> That's My Product(CRUD). </p>
    <hr class="my-4">
    <a class="btn btn-primary"  href="{{ route('products.create')}}" role="button">Create</a>

  </div>


  <div class="container">
      @if ($message = Session::get('success'))
      <div class="alert alert-primary" role="alert">
        {{$message}}
        </div>
      @endif

  </div>


  <div class="container">
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product name</th>
            <th scope="col">Product price</th>
            <th scope="col" style="width: 400px">Actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($product as $item)
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }} $  </td>
                <td>

                    <div class="row">
                        <div class="col-sm">
                            <a  class="btn btn-success" href="{{ route('products.edit',$item->id)}}"> Edit </a>

                        </div>
                        <div class="col-sm">
                            <a  class="btn btn-primary" href="{{ route('products.show',$item->id)}}"> Show</a>

                        </div>

                        
                        <div class="col-sm">
                            <form action="{{ route('products.destroy',$item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"> Delete</button>
                                </form>
                        </div> 
                      </div>


                </td>
              </tr>
            @endforeach

        </tbody>
      </table>

     {!! $product->links() !!}
  </div>

@endsection