<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Simple Task Manager</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" />
    </head>
    <body class="mx-auto my-4 w-75">
        <h1 class="text-center">Form Departemen</h1>
        <a class="btn btn-secondary my-2" href="{{ route('tasks.index') }}" role="button">Kembali</a>
        <div class="card mt-1 mb-4">
        <form action=@isset($task->id) "{{ route('tasks.update', ['task' => $task->id]) }}" @else "{{ route('tasks.store') }}" @endisset class="card-body" method=POST>
            @csrf
            @isset($task->id) @method('PUT') @endisset
            <div class="row my-2">
                <div class="col">
                    <label for="formInputTask" class="form-label">Judul Task</label>
                    <input name="judul" type="text" class="form-control" id="formInputTask" @isset($task->judul) value="{{ $task->judul }}" @endisset placeholder="Masukkan judul task" required>
                </div>
            </div>
            <div class="row my-2">
                <div class="col my-2">
                    <label for="formDeskripsi" class="form-label">Deskripsi Task</label>
                    <textarea class="form-control" name="deskripsi" id="formDeskripsi" rows="3" required>@isset($task->deskripsi) {{ $task->deskripsi }} @endisset</textarea>
                </div>
            </div>
            <div class="row my-2">
                <div class="col">
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="formStatus0" value=0 @isset($task->status) @if (!$task->status) checked @endif @else checked @endisset>
                    <label class="form-check-label" for="formStatus0">
                        Belum selesai
                    </label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="formStatus1" value=1 @isset($task->status) @if ($task->status) checked @endif @endisset>
                    <label class="form-check-label" for="formStatus1">
                        Selesai
                    </label>
                    </div>
                </div>
            </div>
            <div class="mt-4 mb-2 text-center">
                <button type="submit" class="btn btn-warning w-50">Simpan</button>
            </div>
        </form>
        </div>
    </body>
</html>
