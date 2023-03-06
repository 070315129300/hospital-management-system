
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
                    <th style="padding: 30px">Patient Name</th>
                    <th style="padding: 30px">Email</th>
                    <th style="padding: 20px">Phone</th>
                    <th style="padding: 20px">Doctor Name</th>
                    <th style="padding: 20px">Date</th>
                    <th style="padding: 20px">Message</th>
                    <th style="padding: 20px">Status</th>
                    <th style="padding: 20px">Approved</th>
                    <th style="padding: 20px">Canceled</th>
                    <th style="padding: 20px">send Mail</th>
                </tr>

               @foreach($data as $appoint)
               <tr align="center" >
                   <td>{{$appoint -> name}}</td>
                   <td>{{$appoint->email}}</td>
                   <td>{{$appoint->phone}}</td>
                   <td>{{$appoint->doctor}}</td>
                   <td>{{$appoint->date}}</td>
                   <td>{{$appoint->message}}</td>
                   <td>{{$appoint->status}}</td>
                   <td>
                       <a class="btn btn-success" href="{{url('approved', $appoint->id)}}">Approved</a>
                   </td>
                   <td>
                       <a class="btn btn-danger" href="{{url('canceled', $appoint->id)}}"> Canceled</a>
                   </td>
                   <td>
                       <a class="btn btn-secondary" href="{{url('sendmail', $appoint->id)}}"> Send mail</a>
                   </td>

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

