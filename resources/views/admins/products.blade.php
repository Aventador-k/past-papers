@extends('layout.master')

@section('title')
    Dashboard ,Admin
@endsection

@section('content')
<div >
   <style>
    table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    box-shadow: 0 2px 15px rgba(64, 64, 64, .7);
    border-radius: 12px 12px 0 0;
    margin-bottom: 50px;
  }

  td,
  th {
    padding: 10px 16px;
    text-align: center;
  }

  th {
    background-color: #584e46;
    color: #fafafa;
    font-family: 'Open Sans', Sans-serif;
    font-weight: bold;
  }

  tr {
    width: 100%;
    background-color: #fafafa;
    font-family: 'Montserrat', sans-serif;
  }

  tr:nth-child(even) {
    background-color: #eeeeee;
  }


   </style>
   <br><br>
    <h2>Product/Papers Items</h2>
    <table class="table ">
      <thead>
        <tr>
          <th class="text-center">S.N.</th>
          <th class="text-center">Prouct/Paper Name</th>
          <th class="text-center">Product/Paper Description</th>
          <th class="text-center">Category Name</th>
          <th class="text-center">Unit Price</th>
          <th class="text-center" colspan="2">Action</th>
        </tr>
      </thead>
      @endsection

      @section('scripts')

      @endsection


