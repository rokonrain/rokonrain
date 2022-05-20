@extends('layouts.app')
@section('sidebar')
    @parent

    <h2 style="color: white; margin-left:auto">BLPA Passenger Terminal Porter Compact List </h2>
@endsection

@section('content')
    <div class="contenitore">
        <div class="row justify-content-center">

            <div class="card">
                <div class="card-header">{!! auth()->user()->isAdmin == 1 ? 'Admin' : 'User' !!} - Dashboard</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-12" id="head">
                            <div class="pull-left">
                                <h2>Benapole Land Port Passenger Terminal Porter List </h2>
                            </div>
                            <div>
                                <div class="mx-auto pull-right">
                                    <div class="">
                                        <form action="{{ route('posts.index') }}" method="GET" role="search">

                                            <div class="input-group">
                                                <input type="text" class="form-control mr-2 mt-2" name="term"
                                                    placeholder="Search Porter's Name" id="term">
                                                <a href="{{ route('posts.index') }}" class=" mt-1">
                                                    <span class="input-group-btn mr-1 mt-1">
                                                        <button class="btn btn-info" type="submit"
                                                            title="Search Porter's Name">
                                                            <span class="fas fa-search"></span>
                                                        </button>
                                                    </span>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-danger" type="button" title="Refresh page">
                                                            <span class="fas fa-sync-alt"></span>
                                                        </button>
                                                    </span>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right mr-5 mt-1">
                                <a class="btn btn-success" href="{{ route('posts.create') }}"> <i class="fas fa-plus">
                                    </i> Create
                                    new Porter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('danger'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <table class="table table-striped table-light table-hover table-responsive" id="head"
                style='font-family:"Nunito", sans-serif, monospace; font-size:80%'>
                <tr>
                    <th>ID</th>
                    <th class="justify-content-center">Photo</th>
                    <th width="200px">Porter Name</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Present Village</th>
                    <th>Present Post</th>
                    <th>Present Union</th>
                    <th>Present Thana</th>
                    <th>Present District</th>
                    <th>Present Division</th>
                    <th>NID</th>
                    <th>Mobile</th>
                    <th>Designation</th>
                    <th>Emergency Contact</th>
                    <th>Relation</th>
                    <th class="justify-content-center" width="160px">Actions</th>
                </tr>
                <tr>
                    @foreach ($posts as $post)
                        <td>{{ $post->id }}</td>
                        <td><a href="{{ route('posts.show', $post->id) }}"><img
                                    src="{{ asset('storage/' . $post->photo) }}" height="100px"></a></td>
                        <td><a style="text-decoration: none; color:black;"
                                href="{{ route('posts.edit', $post->id) }}">{{ $post->name }}</a></td>
                        <td>{{ $post->father }}</td>
                        <td>{{ $post->mother }}</td>
                        <td>{{ $post->village }}</td>
                        <td>{{ $post->post }}</td>
                        <td>{{ $post->union }}</td>
                        <td>{{ $post->thana }}</td>
                        <td>{{ $post->district }}</td>
                        <td>{{ $post->division }}</td>
                        <td>{{ $post->nid }}</td>
                        <td>{{ $post->mobile }}</td>
                        <td>{{ $post->category_id }}</td>
                        <td>{{ $post->emergency_contact }}</td>
                        <td>{{ $post->relation }}</td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                <a class="btn btn-info" href="{{ route('posts.show', $post->id) }}"><i
                                        class="fas fa-eye"></i></a>
                                <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}"><i
                                        class="fas fa-edit"></i></a>
                                @csrf
                                @if (auth()->user()->isAdmin == 1)
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                @endif
                            </form>
                        </td>
                </tr>
                @endforeach
            </table>
        </div>
        <script type="text/javascript">
            $("#head").on("dblclick", function() {
                $("#showform").toggle();
                $("#navbarmenu").toggle();
                $(".py-1").toggle();
            });


            $("#second").attr("class", "nav-link active");
        </script>
    </div>
@endsection
