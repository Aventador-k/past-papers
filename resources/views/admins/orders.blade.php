@extends('layout.master')

@section('title')
    Dashboard ,Admin
@endsection

@section('content')
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
<div id="ordersBtn" >
    <br><br>
    <h2>Order Details</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>O.N.</th>
          <th>Customer</th>
          <th>Contact</th>
          <th>OrderDate</th>
          <th>Payment Method</th>
          <th>Order Status</th>
          <th>Payment Status</th>
          <th>More Details</th>
       </tr>
      </thead>
    </table>

@endsection

@section('scripts')

@endsection

