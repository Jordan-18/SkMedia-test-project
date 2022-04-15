<!DOCTYPE html>
<html>
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" 
     content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
    <link rel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  
    <title>Aligning Buttons</title>
  
    <style type="text/css">
        html,
        body {
            height: 200px;
        }
    </style>
</head>
  
<body>
    <h1 style="color:green;text-align:center;">Hey Driver! Let's Approve the Job</h1>
    @if (session()->has('success'))
        <div class="alert alert-success text-center" role="alert" id="success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container h-100">
        <div class="d-flex h-100">
            <div class="align-self-center mx-auto">
                <form action="{{route('action-approve',$order->id)}}" method="POST">
                    @csrf
                    <button type="submit" name="Approve-action" value="approve2" class="btn btn-primary">
                      Click Me!
                    </button>
                </form>
            </div>
        </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>
</body>
  
</html>