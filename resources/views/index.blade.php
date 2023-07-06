<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body style="background-color:lightslategray;" id="form">
    <h1>STUDENT DETAILS</h1>
    <!-- header div -->
    <header class=header>
        <a href="#">#</a>
        <button class="btn btn-info" style="width:400px;">
            <a href="create" style="text-decoration: none; color: black;">Add Students</a></button>
        <form class="form-inline" action="{{route('students.query',$query ?? '')}}">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="query">
            <input class="btn btn-secondary" value="search" type="submit">
        </form>
        <a href="#">#</a>
    </header>
    <!--  -->
    <!-- table -->
    <table class="table table-hover" style="border: 0px solid;">
        <thead style="background-color:darkolivegreen;color: white;">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Password</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">City</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody style="background-color: wheat;">
            @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->password}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->phonenumber}}</td>
                <td>{{$student->city}}</td>
                <td>
                    <!-- delete button -->
                    <form action="{{route('students.delete',$student->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="deleteOnclick()">Delete</button>
                    </form>
                    <!--delete button-->
                </td>
                <!-- update button -->
                <td>
                    <form action="{{route('students.update',$student->id)}}" method="post">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </td>
                <!-- update button -->

            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- table -->

</body>

<style>
    #add {
        display: flex;
        text-align: center;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 100px;
    }

    .header:hover{
        background-color:lightgreen;
    }
</style>


<script>
    function deleteOnclick() {
        alert("Are you sure you want to delete this Student");
        alert("click ok delete");
    }
</script>

</html>