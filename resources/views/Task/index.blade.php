<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Simple Task Manager</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
        <!-- datatable -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
        <script src="https://kit.fontawesome.com/abe7da9dbb.js" crossorigin="anonymous"></script>
    </head>
    <body class="mx-auto my-4 w-75">
        <h1 class="text-center">Tasks List</h1>
        <a class="btn btn-secondary my-2" href="{{ route('home') }}" role="button">Kembali</a>
        <a class="btn btn-warning my-2" href="{{ route('tasks.create') }}" role="button">Tambah Task</a>
        </br>
        <a class="btn btn-link my-2 @if (Route::is('tasks.incomplete')) disabled @endif" href="{{ route('tasks.incomplete') }}" role="button">Lihat Task Incomplete</a>
        <a class="btn btn-link my-2 @if (Route::is('tasks.completed')) disabled @endif" href="{{ route('tasks.completed') }}" role="button">Lihat Task Completed</a>
        <a class="btn btn-link my-2 @if (Route::is('tasks.index')) disabled @endif" href="{{ route('tasks.index') }}" role="button">Lihat Semua Task</a>
        <table id="tabelTask" class="table table-striped">
            <thead>
                <th>No.</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th class="col-2">Aksi</th>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $i++}}</td>
                        <td style="white-space: pre-wrap;">{{ $task->judul }}</td>
                        <td style="white-space: pre-wrap;">{{ $task->deskripsi }}</td>
                        <td>@if ($task->status) Selesai @else Belum selesai @endif</td>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('tasks.edit', ['task' => $task->id]) }}" role="button">
                                <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                            </a>
                            <form style="display: inline;" action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash" style="color: #ffffff;"></i>
                                </submit>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
    <!-- jquery & datatable -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function($) {
            $('#tabelTask').DataTable(); // Memulai datatable
        });
</script>
</html>
