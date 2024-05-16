@extends('layout.master')

@section('title')
    Dashboard ,Admin
@endsection

@section('content')
<div >
    <br><br>
    <h3>Category Items</h3>
    <table class="table ">
      <thead>
        <tr>
          <th class="text-center">S.N.</th>
          <th class="text-center">Category Name</th>
          <th class="text-center" colspan="2">Action</th>
        </tr>
      </thead>
      <tr>
        <td>Math(54)</td>
        <td>Mats</td>
        <td>Paper
        </td>
      </tr>
    </table>
 <!-- Trigger the modal with a button -->
 <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Category
  </button>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Category Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="./controller/addCatController.php" method="POST">
            <div class="form-group">
              <label for="c_name">Category Name:</label>
              <input type="text" class="form-control" name="c_name" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Add Category</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>

    </div>
  </div>


</div>
@endsection

@section('scripts')

@endsection

