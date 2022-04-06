@extends('layouts.master')
@section('title','home')
@section('content')

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Customer Details</h5>
    </div>
    <div class="modal-body">
    <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Name" />
        </div>
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="text" name="email" id="email" class="form-control" placeholder="email" />
        </div>
        <div class="mb-3">
          <label class="form-label">Phone</label>
          <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" />
        </div>
        <div class="text-end mt-3">
          <button type="button" id="submit" class="btn btn-lg btn-primary">Add New Customer</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container">
  <table class="table table-bordered">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th width="280px">Action</th>
    </tr>
    @foreach ($data as $product)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $product->name }}</td>
      <td>{{ $product->email }}</td>
      <td>{{ $product->phone }}</td>
      <td>
        <button type="button" class="btn btn-primary" onclick="editUser({{$product['id']}})" name="id" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
        <button type="button" class="btn btn-primary" onclick="deleteUser({{$product['id']}})" name="id-delete" data-bs-toggle="modal" data-bs-target="#exampleModal1">Delete</button>

      </td>
    </tr>
    @endforeach
  </table>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Customer Details</h5>
        </div>
        <div class="modal-body">
          <form id="" method="POST">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text"  name="name" id="name1" class="form-control" name="name" placeholder="Name" />
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="text" name="email" id="email1"  class="form-control" name="email" placeholder="email" />
            </div>
            <div class="mb-3">
              <label class="form-label">Phone</label>
              <input type="tel"  class="form-control" name="phone"  id="phone1" name="phone" placeholder="Phone" />
            </div>
            <div class="text-end mt-3">
              <button type="button" id="add" class="btn btn-lg btn-primary" data-bs-target="#exampleModal">Update Customer Detail</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <form id="" method="POST">
            <h5 class="modal-title" id="exampleModalLabel">Delete Customer Detail</h5>
        </div>
        <div class="modal-body">
          <p class="mb-0">If you Want to Delete User Detail click ok.</p>
        </div>
        <div class="text-right">
          <a href="home" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
        </div>
        <div class="text-end">
          <button type="button" id="delete" class="btn btn-default" data-bs-target="#exampleModal">Ok</button>
        </div>
        <div class="modal-footer">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@section('scripts')
<script>
  $("#submit").click(function(e) {
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var url = "{{ url('/')}}/customeradd";
    if (name == "" && email == "" && phone == "") {
      $("#name").css("border-color", 'red');
      $("#email").css("border-color", 'red');
      $("#phone").css("border-color", 'red');
      e.preventDefault();
    } else {
      $("#name").css("border-color", 'unset');
      $("#email").css("border-color", 'unset');
      $("#phone").css("border-color", 'unset');
    }
    if (name == null || name == "") {
      $("#name").css("border-color", 'red');
      e.preventDefault();
    } else {
      $("#name").css("border-color", 'unset');
    }

    if (email == null || email == "") {
      $("#email").css("border-color", 'red');
      e.preventDefault();
    } else {
      $("#email").css("border-color", 'unset');
    }
    if (phone == null || phone == "") {
      $("#phone").css("border-color", 'red');
      e.preventDefault();
    } else {
      $("#phone").css("border-color", 'unset');
    }
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
    $.ajax({
      url: url,
      type: 'POST',
      data: {
        name: name,
        email: email,
        phone: phone
      },

      success: function(response) {
        window.location = "{{ url('/')}}/home";
      },
    });
  });

  function editUser(id) 
  {
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })
      $.ajax({
        url: "{{ url('/')}}/find",
        type: 'POST',
        data: {
          id: id
        },
          
        success: function(response) {
          alert(Success);
        },
        error: function(error) {
          alert("failed");
        },

      });

    $("#add").click(function(e) {
      var name = $("#name1").val();
      var email = $("#email1").val();
      var phone = $("#phone1").val();
      var url = "{{ url('/')}}/customerupdate";
      if (name == "" && email == "" && phone == "") {
        $("#name1").css("border-color", 'red');
        $("#email1").css("border-color", 'red');
        $("#phone1").css("border-color", 'red');
        e.preventDefault();
      } else {
        $("#name1").css("border-color", 'unset');
        $("#email1").css("border-color", 'unset');
        $("#phone1").css("border-color", 'unset');
      }
      if (name == null || name == "") {
        $("#name1").css("border-color", 'red');
        e.preventDefault();
      } else {
        $("#name1").css("border-color", 'unset');
      }

      if (email == null || email == "") {
        $("#email1").css("border-color", 'red');
        e.preventDefault();
      } else {
        $("#email1").css("border-color", 'unset');
      }
      if (phone == null || phone == "") {
        $("#phone1").css("border-color", 'red');
        e.preventDefault();
      } else {
        $("#phone1").css("border-color", 'unset');
      }
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })
      $.ajax({
        url: url,
        type: 'POST',
        data: {
          id: id,
          name: name,
          email: email,
          phone: phone
        },

        success: function(response) {
          window.location = "{{ url('/')}}/home";
        },
      });
    });
  }

  function deleteUser(id) {
    $("#delete").click(function() {
      var url = "{{ url('/')}}/customerdelete";

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })
      $.ajax({
        url: url,
        type: 'POST',
        data: {
          id: id
        },

        success: function(response) {
          window.location = "{{ url('/')}}/home";
        },
        error: function(error) {
          alert("Delte Customer details failed");
        },

      });
    });

  }
</script>
@endsection