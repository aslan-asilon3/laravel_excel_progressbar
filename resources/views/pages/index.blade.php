@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

@include('sweetalert::alert')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<style>
    .progress
    {
        position: relative;
        width: 50%;
        text-align: center;
        background-color: #c9cfc9;
        height: 20px;
    }
    .bar{
        background-color: #00ff00;
        width: 0%;
        text-align: center;
        height: 20px;
    }
    .percent{
        position: absolute;
        display: inline-block;
        text-align: center;
        left: 50%;
        color: #040608;
        margin-top: 7px;
    }
</style>

<h1>File Upload</h1>
<br>
<form action="{{url('/store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" require>
    <div class="progress" id="progressBar">
        <div class="bar"></div>
        <div class="percent">0%</div>
    </div>
    
    
    <br>
    <br>
    <br>
    <input type="submit" id="progress" value="Upload"><br>

</form>


<script type="text/javascript">

    $(document).ready(function(){
    $(#progress).click(function(){
        $(#progressBar).show();
    });
    });

    $(document).ready(function(){
        var bar = $(".bar");
        var percent = $(".percent");

        $('form').ajaxForm({
            
            beforeSend:function(){
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            uploadProgress:function(event, position, total, percentComplete){
                var percentVal = percentComplete+'%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            complete:function(res){
                console.log(res);
                alert("File has been uploaded");
            }

        });
    });
</script>



@stop