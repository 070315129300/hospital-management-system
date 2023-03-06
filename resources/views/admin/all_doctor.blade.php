
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

                <table>

                    <tr>
                        <th style="padding: 20px">Image</th>
                        <th style="padding: 30px">Doctor Name</th>
                        <th style="padding: 20px">Phone</th>
                        <th style="padding: 20px">Speciality</th>
                        <th style="padding: 20px">Room</th>
                        <th style="padding: 20px">Edit</th>
                        <th style="padding: 20px">Delete</th>


                    </tr>

                    @foreach($data as $appoint)
                        <tr align="center" >
                            <td><img height="100" width="100" src="doctorimage/{{$appoint->image}}"></td>
                            <td>{{$appoint -> name}}</td>
                            <td>{{$appoint->phone}}</td>
                            <td>{{$appoint->speciality}}</td>
                            <td>{{$appoint->roomno}}</td>
                            <td><a class="btn btn-primary"  href="{{url('edit_doctor', $appoint->id)}}">Edit</a></td>
                            <td><a class="btn btn-danger" onclick="return confirm('are you sure you want to delete this appointment')" href="{{url('delete', $appoint->id)}}">Delete</a></td>

                        </tr>
                    @endforeach

                </table>

        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
@include('admin.script')
<!-- End custom js for this page -->
</body>
</html>
