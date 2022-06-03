@extends('layouts.global')

@section('title') Detail order @endsection 

@section('content')

<div class="row">
  <div class="col-md-8">
    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif

    <form
      class="shadow-sm bg-white p-3"
      action="{{route('orders.update', [$order->id])}}"
      method="POST"
    >

    @csrf

    <input type="hidden" name="_method" value="PUT">

    <label for="invoice_number">Invoice number</label><br>
    <input type="text" class="form-control" value="{{$order->invoice_number}}" disabled>
    <br>

    <label for="">Buyer</label><br>
    <input disabled class="form-control" type="text" value="{{$order->user->name}}">
    <br>

    <label for="created_at">Order date</label><br>
    <input type="text" class="form-control" value="{{$order->created_at}}" disabled >
    <br>

    <label for="">Product ({{$order->totalQuantity}}) </label><br>
    <ul>
    @foreach($order->books as $book)
      <li>{{$book->title}} <b>({{$book->pivot->quantity}})</b></li>
    @endforeach
    </ul>

    <label for="">Total price</label><br>
    <input class="form-control" type="text" value="{{number_format($order->total_price)}}" disabled>
    <br>

    </form>
  </div>
</div>

@endsection 
