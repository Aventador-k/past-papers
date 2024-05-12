{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Welcome {{ Auth::user()->email }}</h1>
<p>Succesfull Logged In</p>
</body>
</html> --}}

@extends('layout.master')

@section('title')
    Dashboard ,Admin
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"> Customers Table</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                 Customers Name
                </th>
                <th>
                 E-mail
                </th>
                <th>
                  Phone No
                </th>
                <th class="text-right">
                  Amount
                </th>
              </thead>
              <tbody>
                <tr>
                  <td>
                    Patricia Wambui
                  </td>
                  <td>
                    patriciawambui@gamil.com
                  </td>
                  <td>
                    01111222
                  </td>
                  <td class="text-right">
                    Ksh 3500
                  </td>
                </tr>

              </tbody>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')

@endsection

