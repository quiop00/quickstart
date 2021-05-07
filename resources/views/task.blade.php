<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Task</title>
    <style>
        .delete-btn{
            width: 30px;
            overflow: hidden;
            display: inline-block;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    
    <section style="padding-top: 60px;">
    
        <div class="container">
         <div class="row">
            <div class="col-md-6 offset-md-3">
                    <div class="card ">
                        <div class="card-header bg-primary text-white">
                              New task
                        </div>
                    <div class="card-body">
                        <form action="/" method="POST">
                            @csrf
                            <div class="form-group">
                            
                                <label for="content">Task</label>
                                <input type="text" name="content" class="form-control" placeholder="">
                            </div>
                            <input type="submit" value="+ Add Task" class="btn btn-primary">
                        </form>
                    </div>
                    </div>
                    
             </div>
            </div>
        </div>
        <br/>
        <div class="container">
         <div class="row">
            <div class="col-md-6 offset-md-3">
                    @include('common.error')
                    <div class="card ">
                        <div class="card-header bg-primary text-white">
                              Current task
                        </div>
                    
                    <div class="card-body">
                        <table style="width:100%">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th></th>
                                </tr>
                                
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{$task->content}}</td>
                                        <td id="delete-btn">
                                        <form width="100%" action="{{url('delete/'.$task->id)}}" method="POST" 
                                            onsubmit="return confirm('Do you really want to delete this task?');">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
             </div>
            </div>
        </div>
    
    </section>

</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>