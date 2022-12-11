<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <h3 style="margin-top: 30px;">Dashboard</h3>
            <div class="col-md-5">
                {{-- laravel alert start --}}
                {{-- @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif --}}
                {{-- laravel alert end --}}

                {{-- script alert start --}}
                @if (Session::get('success'))
                    <script>
                        alert('{{ Session::get('success') }}')
                    </script>
                @endif
                {{-- script alert end --}}

                <table class="table table-response">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ Auth::guard('admin')->user()->name }}</td>
                            <td>{{ Auth::guard('admin')->user()->email }}</td>
                            <td><a href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
