<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body style="background-color:lightyellow;">
    <!-- update student form -->
    @if($students ?? '')
    <!-- form action-->
    <form action="{{route('students.updated',$students->id)}}" method="post">
        @csrf
        </div>
        <!-- student name -->
        <h1>{{$students->name}}'s Update Form</h1>
        <!-- form -->
        <div class="was-validated">
            <!-- name -->
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control" placeholder="Name" value="{{$students->name}}" name="name" required>
                <div class="php"><?php echo $errors->first('name'); ?> </div>
            </div>
            <!-- password -->
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control" placeholder="Password" value="{{$students->password}}" name="password" required>
                <div class="php"><?php echo $errors->first('password'); ?> </div>
            </div>
            <!-- email -->
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control" placeholder="email" value=" {{$students->email}}" name="email" required>
                <div class="php"><?php echo $errors->first('email'); ?> </div>
            </div>
            <!-- phonenumber -->
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control" placeholder="Phonenumber" value="{{$students->phonenumber}}" name="phonenumber" required>
                <div class="php"><?php echo $errors->first('phonenumber'); ?> </div>
            </div>
            <!-- city -->
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control" placeholder="City" value="{{$students->city}}" name="city" required>
                <div class="php"><?php echo $errors->first('city'); ?> </div>
            </div>
            <!-- button -->
            <button type="submit" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
                Submit
            </button>

        </div>
        <!-- form -->
    </form>
    <!--  -->
    @else
    <!-- add student form -->
    <h1 style="color:black; ">Student Form Submit</h1>
    <form action="/index" method="post">
        @csrf
        <!-- form -->
        <div class="was-validated">
            <div class="col-md-4 mb-3">
                <!-- name -->
                <input type="text" class="form-control" placeholder="Name" name="name" required>
                <div class="php"><?php echo $errors->first('name'); ?> </div>
            </div>
            <!-- password -->
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Password" name="password" required>
                <div class="php"><?php echo $errors->first('password'); ?> </div>
            </div>
            <!-- email -->
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control" placeholder="email" name="email" required>
                <div class="php"><?php echo $errors->first('email'); ?> </div>
            </div>
            <!-- phonenumber -->
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control" placeholder="Phonenumber" name="phonenumber" required>
                <div class="php"><?php echo $errors->first('phonenumber'); ?> </div>
            </div>
            <!-- city -->
            <div class="col-md-4 mb-3">
                <input type="text" class="form-control" placeholder="City" name="city" required>
                <div class="php"><?php echo $errors->first('city'); ?> </div>
            </div>
            <!-- submit -->
            <button type="submit" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
                Submit
            </button>
        </div>
        <!-- form -->
    </form>
    <!--  -->
    @endif
</body>
<!--  -->
<!--  -->
<style>
    .php {
        color: red;
        font-size: larger;
        font-weight: bolder;
    }

    #form {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>
<!--   -->

</html>