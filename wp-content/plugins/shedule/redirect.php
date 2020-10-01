<!DOCTYPE html>
<html>

<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">
    <style>
        html,
        body {
            height: 100%;
        }

        .btn-success.focus, .btn-success {
            background-color: #329a93 !important;
        }

        .btn-success.focus, .btn-success:focus {
            box-shadow: 0 0 0 0.2rem #329a935c !important;
        }

        .container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <title>Выбор расписания</title>
</head>

<body>
    <div class="container">
        <div>
            <button type="button" class="btn btn-success btn-block" onclick="window.location='/wp-content/plugins/shedule/mainPageStudent.php'">Расписание для студента</button>
            <button type="button" class="btn btn-success btn-block"  onclick="window.location='/wp-content/plugins/shedule/mainPageTeacher.php'">Расписание для преподавателя</button>
        </div>
    </div>
</body>

</html>