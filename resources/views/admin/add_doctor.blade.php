
<!DOCTYPE html>
<html lang="en">
<head>
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
    <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="padding: 15px">
            <label for="name">Doctor Name</label>
            <input type="text" style="color: black" name="name" placeholder="write the name">

        </div>
        <div style="padding: 15px">
            <label for="phone">phone</label>
            <input type="number" style="color: black" name="phone" placeholder="write the number">

        </div>
        <div style="padding: 15px">
            <label for="name">Speciality</label>
            <select name="speciality" id="" style="width:200px">
                <option value="">select</option>
                <option value="skin">skin</option>
                <option value="dentist">dentist</option>
                <option value="eyes">eyes</option>
                <option value="general">general</option>
                <option value="heart">heart</option>
                <option value="bone">bone</option>
                <option value="ear">ear</option>


            </select>
        </div>
        <div style="padding: 15px">
            <label for="roomno">Room No</label>
            <input type="text" style="color: black" name="roomno" placeholder="write the room number">

        </div>
        <div style="padding: 15px">
            <label for="name">Doctor Image </label>
            <input type="file"  name="file" >

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
