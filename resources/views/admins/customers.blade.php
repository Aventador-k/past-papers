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
                    Paper Name
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
                    Maina Kageni
                  </td>
                  <td>
                    Mathematics PP1(G5)
                  </td>
                  <td>
                    mainakageni@gamil.com
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

