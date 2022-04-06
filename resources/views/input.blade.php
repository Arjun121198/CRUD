@extends('layouts.master')
@section('title','input')
@section('content')
<div Class="container">
    <p>Name: <input id='in' type="text" name="user"></p>
    <button id="button">Sumbit</button>
    <h4 id="int"></h4>
</div>
<div Class="container">
    <p>Name: <input id='num' type="text"></p>
    <button id="button1">Sumbit</button>
    <p id="int1"></p>
</div>
<div Class="container">
    <p>Name: <input id='num2' type="tel"></p>
    <button id="button2">Find</button>
    <p id="int2"></p>

</div>
@endsection
@section('scripts')
<script>
    $("#button").click(function() {
        $("#in").val(function() {
            $("#int").append("<br/>" + this.value.toUpperCase());
        });
    });
    $(document).ready(function() {

        var arr = [];
        $("#button1").click(function() {
            $("#num").val(function() {
                if ($("#num").val() == "") {
                    return;
                } else {
                    $("#int1").append(this.value + ',');
                     arr.push(this.value);
                  console.log(arr)
                }
            });
            $("#button2").click(function() {
                var int = $("#num2").val();
               var a = (arr.indexOf(int)>-1);
               alert(a)
            });
        });

    });
</script>
@endsection