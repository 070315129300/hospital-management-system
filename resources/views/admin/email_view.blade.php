
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <style type="text/css">
        label{
            display: inline-block;
            width: 200px
        }
    </style>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">

    <!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
<!-- partial -->
    @include('admin.navbar')
    <div class="container-fluid page-body-wrapper">


        <div class="container" align="center" style="padding-top: 100px;">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        x
                    </button>

                    {{session()->get('message')}}
                </div>
            @endif
            <form action="{{url('sendemail',$data->id )}}" method="POST" >
                @csrf
                <div style="padding: 15px">
                    <label for="greeting">Greeting</label>
                    <input type="text" style="color: black" name="greeting" >

                </div>
                <div style="padding: 15px">
                    <label for="body">Body</label>
                    <input type="text" style="color: black" name="body" >

                </div>

                <div style="padding: 15px">
                    <label for="actiontext">Action Text</label>
                    <input type="text" style="color: black" name="actiontext" >

                </div>

                <div style="padding: 15px">
                    <label for="actionurl">Action Url</label>
                    <input type="text" style="color: black" name="actiontext" >

                </div>

                <div style="padding: 15px">
                    <label for="endpart">End Part</label>
                    <input type="text" style="color: black" name="endpart" >

                </div>

                <div style="padding: 15px">
                    <input type="submit" class="btn btn-primary" >

                </div>

            </form>
        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
<!-- End custom js for this page -->
</body>
</html>
