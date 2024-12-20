<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Thêm vấn đề</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <form action="{{route('issues.store')}}" method="POST">
                @csrf
                <h2 class="modal-title text-center mt-2">Thêm vấn đề</h2>
                <div class="form-group">
                    <label>Tên máy tính</label>
                    <select id="computer_name" class="form-control" name="computer_name" required>
                        @foreach ($computers as $computer)
                        <option value="{{$computer->computer_name}}">
                            {{$computer->computer_name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Người báo cáo</label>
                    <input class="form-control" name="reported_by" required></input>
                </div>
                <div class="form-group">
                    <label>Thời gian báo cáo</label>
                    <input type="datetime-local" class="form-control" name="reported_date" required>
                </div>	
                <div class="form-group">
                    <label for="priority">Mức độ</label>
                    <select id="priority" class="form-control" name="urgency" required>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="priority">Trạng thái</label>
                    <select id="priority" class="form-control" name="status" required>
                        <option value="Open">Open</option>
                        <option value="In progress">In progress</option>
                        <option value="Resolved">Resolved</option>
                    </select>
                </div>
					
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" value="Thêm">
            </form>
        </div>
    </body>

</html>
