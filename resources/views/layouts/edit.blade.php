@extends('layouts.app')
@section('sidebar')
    @parent

    <h2 style="color: white; margin-left:auto">Modify This Porter Details </h2>
@endsection

@section('content')
    <div class="colonna">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Attention!</strong> Mandatory fields are missing<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" id="form"
            class="form-contatto" style="margin-top:10px;">
            @csrf
            @method('PUT')
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <h3>Porter Registration Form</h3>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:5px;">
                    <div class="col-xs-6 col-sm-6 col-md-6" style="width: 49%; margin-right:5px; float: left;">
                        <div class="form-group">
                            <label for="photo"><img id="output" src="{{ asset('storage/' . $post->photo) }}"
                                    height="200px" class="rounded float-left">
                            </label>
                            <input type="file" name="photo" id="photo" onchange="loadFile(event)" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6" style="float: right;">
                        <div class="form-group">
                            <strong>Porter Name:</strong>
                            <input type="text" name="name" value="{{ $post->name }}" class="form-control"
                                placeholder="Name" required>
                            <strong>Designation:</strong>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->title }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <strong>Father's Name:</strong>
                            <input type="text" name="father" value="{{ $post->father }}" class="form-control"
                                placeholder="Father's Name" required>
                            <strong>Mother's Name:</strong>
                            <input type="text" name="mother" value="{{ $post->mother }}" class="form-control"
                                placeholder="Mother's Name" required>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top:5px;">
                    <div class="col-xs-6 col-sm-6 col-md-6" style="float: left;">
                        <strong class="address">Present Address:</strong>
                        <hr style="color: red; margin-top: 3px; margin-bottom: 3px">
                        <div class="form-group">
                            <strong>Village:</strong>
                            <input type="text" name="village" value="{{ $post->village }}" id="village"
                                class="form-control" placeholder="Village's Name" required>
                            <strong>Post:</strong>
                            <input type="text" name="post" value="{{ $post->post }}" id="post" class="form-control"
                                placeholder="Post" required>
                            <strong>Divsion Name:</strong>
                            <input type="text" name="division" class="form-control" id="divisionname" style="display:none"
                                placeholder="Division">
                            <select class="form-control" id="division" required>
                                <option selected>{{ $post->division }}</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}">{{ $division->bn_name }}</option>
                                @endforeach
                            </select>
                            <strong>District Name:</strong>
                            <input type="text" name="district" class="form-control" id="districtname"
                                placeholder="District" style="display:none">
                            <select class="form-control" id="district" required>
                                <option selected>{{ $post->district }}</option>
                            </select>
                            <strong>Thana:</strong>
                            <input type="text" name="thana" class="form-control" placeholder="Thana" id="thananame"
                                style="display:none">
                            <select class="form-control" id="thana" required>
                                <option selected>{{ $post->thana }}</option>
                            </select>
                            <strong>Union:</strong>
                            <input type="text" name="union" class="form-control" placeholder="Union" id="unionname"
                                style="display:none">
                            <select class="form-control" id="union" required>
                                <option selected>{{ $post->union }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-" style="float: right;">
                        <strong id="paddress">Permanent Address:</strong>
                        <hr style="color: red; margin-top: 3px; margin-bottom: 3px">
                        <div class="form-group" style=" display: flex; flex-wrap: wrap; align-content:right;">
                            <strong class="hide">Village:</strong>
                            <input type="text" name="pvillage" value="{{ $post->pvillage }}" id="pvillage"
                                class="form-control" placeholder="Village's Name" required>
                            <strong class="hide">Post:</strong>
                            <input type="text" name="ppost" value="{{ $post->ppost }}" id="ppost" class="form-control"
                                placeholder="Post" required>
                            <strong class="hide">Divsion Name:</strong>
                            <input type="text" name="pdivision" class="form-control" id="pdivisionname"
                                style="display:none" placeholder="Division" required>
                            <select class="form-control" id="pdivision" required>
                                <option selected>{{ $post->pdivision }}</option>
                                @foreach ($divisions as $pdivision)
                                    <option value="{{ $pdivision->id }}">{{ $pdivision->bn_name }}</option>
                                @endforeach
                            </select>
                            <strong class="hide">District Name:</strong>
                            <input type="text" name="pdistrict" class="form-control" id="pdistrictname"
                                placeholder="District" style="display:none">
                            <select class="form-control" id="pdistrict" required>
                                <option selected>{{ $post->pdistrict }}</option>
                            </select>
                            <strong class="hide">Thana:</strong>
                            <input type="text" name="pthana" class="form-control" placeholder="Thana" id="pthananame"
                                style="display:none">
                            <select class="form-control" id="pthana" required>
                                <option selected>{{ $post->pthana }}</option>
                            </select>
                            <strong class="hide">Union:</strong>
                            <input type="text" name="punion" class="form-control" placeholder="Union" id="punionname"
                                style="display:none">
                            <select class="form-control" id="punion" required>
                                <option selected>{{ $post->punion }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <input type="checkbox" id="filladdress" onclick="fillAddress()" style="display:none;" /><strong
                        id="address" style="display:none; color:red"> (NB: Tick if Present Address Same as Parmanent
                        address.)</strong>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <div class="col-xs-6 col-sm-6 col-md-6" style="float: left;">
                            <strong> National ID Number:</strong>
                            <input type="text" name="nid" value="{{ $post->nid }}" class="form-control"
                                placeholder="National ID Number" required>
                            <strong> Mobile Number:</strong>
                            <input type="text" name="mobile" value="{{ $post->mobile }}" class="form-control"
                                placeholder="Mobile Number" required>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6" style="float: right;">
                            <strong>Emergency Contact Number:</strong>
                            <input type="text" name="emergency_contact" value="{{ $post->emergency_contact }}"
                                class="form-control" placeholder="Emergency Contact" required>
                            <strong>Relation:</strong>
                            <input type="text" name="relation" value="{{ $post->relation }}" class="form-control"
                                placeholder="Relation" required>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary d-print-none">Apply changes</button>
                    <a class="btn btn-info d-print-none" href="{{ route('posts.show', $post->id) }}"> Show ID card</a>
                </div>
            </div>

        </form>
    </div>
    <script type="text/javascript">
        $('#divisionname').val($("#division option:selected").text());
        $('#districtname').val($("#district option:selected").text());
        $('#thananame').val($("#thana option:selected").text());
        $('#unionname').val($("#union option:selected").text());
        $('#pdivisionname').val($("#pdivision option:selected").text());
        $('#pdistrictname').val($("#pdistrict option:selected").text());
        $('#pthananame').val($("#pthana option:selected").text());
        $('#punionname').val($("#punion option:selected").text());
        $(document).ready(function() {
            $('#division').on('change', function() {
                var divisionId = this.value;
                $('#district').html('');
                $.ajax({
                    url: '{{ route('getDistricts') }}?division_id=' + divisionId,
                    type: 'get',
                    success: function(res) {
                        $('#district').html('<option value="">Select district</option>');
                        $.each(res, function(key, value) {
                            $('#district').append('<option value="' + value
                                .id + '">' + value.bn_name + '</option>');
                        });
                        $('#thana').html('<option value="">Select thana</option>');
                        $('#divisionname').val($("#division option:selected").text());


                    }
                });
            });
            $('#district').on('change', function() {
                var districtId = this.value;
                $('#thana').html('');
                $.ajax({
                    url: '{{ route('getThanas') }}?district_id=' + districtId,
                    type: 'get',
                    success: function(res) {
                        $('#thana').html('<option value="">Select thana</option>');
                        $.each(res, function(key, value) {
                            $('#thana').append('<option value="' + value
                                .id + '">' + value.bn_name + '</option>');
                        });
                        $('#districtname').val($("#district option:selected").text());

                    }
                });
            });

            $('#thana').on('change', function() {
                var thanaId = this.value;
                $('#union').html('');
                $.ajax({
                    url: '{{ route('getUnions') }}?thana_id=' + thanaId,
                    type: 'get',
                    success: function(res) {
                        $('#union').html('<option value="">Select union</option>');
                        $.each(res, function(key, value) {
                            $('#union').append('<option value="' + value
                                .id + '">' + value.bn_name + '</option>');
                        });
                        $('#thananame').val($("#thana option:selected").text());

                    }
                });
            });
            $('#union').on('change', function() {

                $('#unionname').val($("#union option:selected").text());
                $("#filladdress").show();
                $("#address").show();
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pdivision').on('change', function() {
                var divisionId = this.value;
                $('#pdistrict').html('');
                $.ajax({
                    url: '{{ route('getDistricts') }}?division_id=' + divisionId,
                    type: 'get',
                    success: function(res) {
                        $('#pdistrict').html('<option value="">Select district</option>');
                        $.each(res, function(key, value) {
                            $('#pdistrict').append('<option value="' + value
                                .id + '">' + value.bn_name + '</option>');
                        });
                        $('#pthana').html('<option value="">Select thana</option>');
                        $('#pdivisionname').val($("#pdivision option:selected").text());

                    }
                });
            });
            $('#pdistrict').on('change', function() {
                var districtId = this.value;
                $('#pthana').html('');
                $.ajax({
                    url: '{{ route('getThanas') }}?district_id=' + districtId,
                    type: 'get',
                    success: function(res) {
                        $('#pthana').html('<option value="">Select thana</option>');
                        $.each(res, function(key, value) {
                            $('#pthana').append('<option value="' + value
                                .id + '">' + value.bn_name + '</option>');
                        });
                        $('#pdistrictname').val($("#pdistrict option:selected").text());

                    }
                });
            });
            $('#pthana').on('change', function() {
                var thanaId = this.value;
                $('#punion').html('');
                $.ajax({
                    url: '{{ route('getUnions') }}?thana_id=' + thanaId,
                    type: 'get',
                    success: function(res) {
                        $('#punion').html('<option value="">Select union</option>');
                        $.each(res, function(key, value) {
                            $('#punion').append('<option value="' + value
                                .id + '">' + value.bn_name + '</option>');
                        });
                        $('#pthananame').val($("#pthana option:selected").text());

                    }
                });
            });
            $('#punion').on('change', function() {

                $('#punionname').val($("#punion option:selected").text());

            });
        });

        $(document).ready(function() {
            $("#filladdress").on("click", function() {
                if (this.checked) {
                    $("#pvillage").val($("#village").val());
                    $("#pvillage").css("display", "none");
                    $("#ppost").val($("#post").val());
                    $("#ppost").css("display", "none");
                    $("#punionname").val($("#union option:selected").text());
                    $("#pthananame").val($("#thananame").val());
                    $("#pdistrictname").val($("#districtname").val());
                    $("#pdivisionname").val($("#divisionname").val());
                    $("#pdivision").attr('required', false);
                    $("#pdivision").css("display", "none");
                    $("#pdistrict").attr('required', false);
                    $("#pdistrict").css("display", "none");
                    $("#pthana").attr('required', false);
                    $("#pthana").css("display", "none");
                    $("#punion").attr('required', false);
                    $("#punion").css("display", "none");
                    $(".hide").css("display", "none");
                    $(".address").text('Present & Permanent Address Both Same');
                    $("#paddress").hide();

                } else {
                    $("#pvillage").val('');
                    $("#pvillage").show();
                    $("#ppost").val('');
                    $("#ppost").show();
                    $("#punion").val('');
                    $("#punion").show();
                    $("#pthana").val('');
                    $("#pthana").show();
                    $("#pdistrict").val('');
                    $("#pdistrict").show();
                    $("#pdivision").val('');
                    $("#pdivision").show();
                    $(".hide").show();
                    $(".address").text('Present Address:');
                    $("#filladdress").hide();
                    $("#address").hide();
                    $("#paddress").show();

                }
            });
        });
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
        };

        $("#form").on("dblclick", function() {
            $("#showform").toggle();
            $("#navbarmenu").toggle();
            $(".py-1").toggle();


        });
    </script>

@endsection
