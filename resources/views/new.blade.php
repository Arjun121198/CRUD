@extends('layouts.master')
@section('title','new')
@section('content')
    <div class="container">
        <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter your Data</label>
    <input type="tel" class="form-control" name="number" id="input">
 <br>
</div>
  <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<br>
<div class="container">
  <table class="table table-bordered">
    @foreach ($data as $product)
      <tr><b>{{ $product->number }},</b></tr>
    @endforeach
  </table>
</div>

<div class="container">
    <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Find your Data</label>
    <input type="tel" class="form-control" name="number" id="input1">
 <br>
 <p id="result"></p>
</div>
  <button type="button" id="find" class="btn btn-primary">Find</button>
</form>

</div>
@endsection
@section('scripts')
<script>
  $("#submit").click(function(e) {
    var number = $("#input").val();
    var url = "{{ url('/')}}/addnew";
    if(number=="")
    {
      $("#input").css("border-color", 'red');
      e.preventDefault();
      return;
    }
    else
    {
        $("#input").css("border-color", 'unset');
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
        number: number
      },

      success: function(response) {
        window.location = "{{ url('/')}}/new";
      },
    });
  });



  $("#find").click(function(e) {
    var number = $("#input1").val();
    var url = "{{ url('/')}}/show";
    if(number ==""|| number == null)
    {
      $("#input1").css("border-color", 'red');
      e.preventDefault();
      return;
    }
    else
    {
        $("#input1").css("border-color", 'unset');
    }
        
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })
    $.ajax({
      url: url,
      type:'POST',
      data: {
        number: number
      },

      success: function(response) {
          console.log(response)
          $("#result").html(response);
      },

    });
  });
 </script>   
@endsection