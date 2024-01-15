@extends('layouts.app')


@section('content')




    <p>
        <a title="Add New Department" href="<?= url('/System/Innovations/Create') ?>" class="btn btn-sm btn-info"><span
                class="fa fa-plus"><span>New Innovation</a>

        <a href="<?= url('/System/Innovations/Index') ?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List of
                    Innovations</a>



        <a href="<?= url('/System/Innovations/Import') ?>" class="btn btn-sm btn-danger"><span
                class="fa fa-bars"><span>Import</a>






    </p>


    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i>Create New Innovation</h4>
                    <div class="toolbar no-padding">
                        <div class="btn-group">
                            <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                        </div>
                    </div>
                </div>
                <div class="widget-content">

                    <form action="{{ $url }}" method="post" enctype="multipart/form-data">

                        <?= csrf_field() ?>


                        <div class="col-md-12">
                            <div class="row">


                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>Innovation Name </label>
                                            <input type="text" name="inno_name" class="form-control" required
                                                value="{{ old('inno_name') }}">
                                            </span>
                                        </div>






                                    </div>

                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label>Type of Innovation</label>

                                            {{ Form::select('innovation_type', [null => '--Select Type--'] + $categories, $model->innovation_type, ['class' => 'form-control', 'required' => 'required', 'id' => 'Node', 'style' => 'width:100%']) }}



                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>County Name</label>

                                            {{ Form::select('county_id', [null => '--Select County--'] + $counties, $model->county_id, ['class' => 'form-control', 'required' => 'required', 'id' => 'County', 'style' => 'width:100%']) }}



                                        </div>





                                    </div>

                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label>Sub County</label>

                                            {{ Form::select('subcounty', [null => '--Select Sub County--'] + $sub_counties, $model->innovation_type, ['class' => 'form-controls', 'required' => 'required', 'id' => 'SubCounty', 'style' => 'width:100%']) }}



                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Ward</label>
                                            <input type="text" name="wardname" class="form-control" required
                                                value="{{ old('wardname') }}">





                                        </div>




                                        <div class="form-group col-md-6">
                                            <label>Physical Location</label>
                                            <input type="text" name="inno_location" class="form-control"
                                                value="{{ old('inno_location') }}">

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Longitude (+)</label>
                                            <input type="text" name="inno_longitude" class="form-control" required
                                                id="lon" value="{{ old('inno_longitude') }}">

                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Latitude(-)</label>
                                            <input type="text" id="lat" name="inno_latitude" class="form-control"
                                                required value="{{ old('inno_latitude') }}">

                                        </div>

                                    </div>


                                    <div class="row">




                                        <div class="form-group col-md-6">
                                            <label>Node</label>
                                            {{ Form::select('node_id', [null => '--Select Node--'] + $nodes, $model->node_id, ['class' => 'form-control', 'required' => 'required', 'id' => 'Node', 'style' => 'width:100%']) }}
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Value Chain</label>
                                            {{ Form::select('value_chain', [null => '--Select Value--'] + $valuechains, $model->category, ['class' => 'form-control', 'required' => 'required', 'id' => 'ValueChain', 'style' => 'width:100%']) }}
                                        </div>






                                    </div>



                                    <div class="row">

                                        <div class="form-group col-md-12">
                                            <label>VCO/Group Name </label>
                                            <input type="text" name="org_id" class="form-control"
                                                value="{{ old('org_id') }}" required>


                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Innovation Source</label>
                                            {{ Form::select('inno_sources', [null => '--Select Source--'] + ['Government Institutions' => 'Government Institutions', 'County ASDSP II offices' => 'County ASDSP II offices'], $model->inno_sources, ['class' => 'form-control', 'required' => false, 'id' => 'LibrarSy', 'style' => 'width:100%']) }}
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Status </label>
                                            {{ Form::select('innovation_status', [null => '--Select status--'] + $status, $model->innovation_status, ['class' => 'form-control', 'required' => 'required', 'id' => 'status', 'style' => 'width:100%']) }}

                                        </div>






                                    </div>



                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label>Total Adult Male Beneficiaries </label>
                                            <input type="text" name="inno_male_adultvca" class="form-control" required
                                                value="{{ old('inno_male_adultvca') }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Total Adult Female Beneficiaries </label>
                                            <input type="text" name="inno_female_adultvca" class="form-control" required
                                                value="{{ old('inno_female_adultvca') }}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Total Youths Male Beneficiaries </label>
                                            <input type="text" name="inno_youth_malevca" class="form-control" required
                                                value="{{ old('inno_youth_malevca') }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Total Youths Female Beneficiaries </label>
                                            <input type="text" name="inno_youth_femalevca" class="form-control" required
                                                value="{{ old('inno_youth_femalevca') }}">
                                        </div>
                                        <input type="hidden" name="inno_cost" value="0">
                                        <input type="hidden" name="innovation_output" value="0">

                                    </div>


                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label>Contact Person </label>
                                            <input type="text" name="inno_contactname" class="form-control" required
                                                value="{{ old('inno_contactname') }}">
                                        </div>



                                        <div class="form-group col-md-6">
                                            <label>Contact Telephone </label>
                                            <input type="text" name="inno_contacttel" class="form-control" required
                                                value="{{ old('inno_contacttel') }}">
                                        </div>



                                    </div>








                                </div>



                                <div class="col-md-4">
                                    <label>Cover Image</label>
                                    <div>
                                        <img name="images" width="220" height="350" id="image_array1"
                                            value="" src="{{ asset('placeholder.png') }}"
                                            style="width: 100%;height: 250px;" />
                                        <!--<div id="image_array1"   ></div> Use This if You want to display Multiple Images-->
                                        <input type="hidden" class="form-control validate" name="primary_image"
                                            value="" id="img_id_cover" required  accept="image/png, image/jpeg, image/gif">
                                        <br />
                                        <a href="#modal-message" class="uploadmodalwidget btn btn-default btn-sm"
                                            data-toggle="modal" id="uploadmodal" data-inputid="img_id_cover"
                                            data-mode="single" data-divid="image_array1"
                                            style="position: absolute;z-index: 1;">Upload Image</a>
                                        <!-- Change Data Mode to Multiple if you want to be able to select Multiple Images -->

                                    </div>

                                </div>

                            </div>



                            <div class="row" style=",margin-top: 5%;">


                                <div class="form-group col-md-12">
                                    <label>Innovation Backgound Infomation</label>
                                    <textarea rows="4" name="inno_background" class="form-control" id="Background" required>{{ old('inno_background') }}</textarea>
                                </div>


                                <div class="form-group col-md-12">
                                    <label>Innovation Description</label>
                                    <textarea rows="4" name="inno_description" class="form-control" id="Description" required>{{ old('inno_description') }}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Innovation Objectives</label>
                                    <textarea rows="4" id="Objectives" name="inno_objective" class="form-control" required>{{ old('inno_objective') }}</textarea>
                                </div>


                            </div>



                            <div class="row" style=",margin-top: 5%;">

                                <div class="form-group col-md-12">
                                    <label>Practical utility of Innovation</label>
                                    <textarea rows="4" name="inno_vca_benefit" class="form-control" id="PracticalUtility" required>{{ old('inno_vca_benefit') }}</textarea>
                                </div>


                                <div class="form-group col-md-12">
                                    <label>Results and Impacts:</label>
                                    <textarea rows="4" id="Impact" name="inno_lesson_challenges" class="form-control" required>{{ old('inno_lesson_challenges') }}</textarea>
                                </div>
                            </div>







                            <div class="row">
                                <div class="col-md-12">
                                    <legend>Innovation Images</legend>
                                    <h5>Hint:max of 3 images</h5>



                                    <div class="row">
                                        <div id="image_array11"></div>
                                    </div>


                                    <input type="hidden" class="form-control validate" name="primary_images[]"
                                        id="img_ids1" required>
                                    <br />
                                    <a href="#modal-message" class="uploadmodalwidget btn btn-default btn-sm"
                                        data-toggle="modal" id="uploadmodal" data-inputid="img_ids1"
                                        data-mode="multiple" data-divid="image_array11"
                                        style="position: absolute;z-index: 1;">Upload Image</a>
                                    <!-- Change Data Mode to Multiple if you want to be able to select Multiple Images -->



                                </div>


                            </div>

                        </div>




















                        <div class="form-group col-md-12" style="margin-top:5%;">
                            <div class="row">
                                <button class="btn btn-success">Create</button>
                            </div>

                        </div>





                </div>



                </form>

            </div>
        </div>
    </div>
    </div>





    @include('partials.upload_widget')


@stop
@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>


    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckeditor/samples/js/sample.js') }}"></script>


    <script type="text/javascript">
        $("body").on("change", "#County", function(e) {
            e.preventDefault();
            var id = $(this).val();

            if (id.length > 0) {
                var url = "<?= url('/System/Entities/GetValueChains') ?>/" + id;
                $.get(url, function(data) {
                    $("#ValueChain").html(data);
                });
            }

        });


        $("#County").on("change", function(e) {
            e.preventDefault();
            var id = $(this).val();
            if (id.length > 0) {
                var url = "<?= url('/System/Entities/GetSubCounties') ?>/" + id;
                $.get(url, function(data) {
                    $("#SubCounty").html(data);
                });
            }

        });
    </script>

    <script type="text/javascript">
        CKEDITOR.pasteFromWordRemoveFontStyles = false;

        CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
        CKEDITOR.config.scayt_autoStartup = true;


        CKEDITOR.replace('Description', {
            height: 200,
            font_defaultLabel: 'Arial',
            fontSize_defaultLabel: '12pts',
            pasteFromWordRemoveFontStyles: false,

        });
        CKEDITOR.replace('PracticalUtility', {
            height: 200,

            font_defaultLabel: 'Arial',
            fontSize_defaultLabel: '12pts',
            pasteFromWordRemoveFontStyles: false,


        });
        CKEDITOR.replace('Objectives', {
            height: 100,
            font_defaultLabel: 'Arial',
            fontSize_defaultLabel: '12pts',
            pasteFromWordRemoveFontStyles: false,
        });


        CKEDITOR.replace('Background', {
            height: 100,
            font_defaultLabel: 'Arial',
            fontSize_defaultLabel: '12pts',
            pasteFromWordRemoveFontStyles: false,
        });



        CKEDITOR.replace('Impact', {
            height: 200,
            font_defaultLabel: 'Arial',
            fontSize_defaultLabel: '12pts',
            pasteFromWordRemoveFontStyles: false,

        });
    </script>
    <script>
        $("#SubCounty").select2();

        $("#SubCounty").on("change", function(e) {
            e.preventDefault();
            var id = $(this).val();
            var url = "<?= url('/System/Innovations/getWards') ?>";
            $.get(url, {
                'name': id
            }, function(data) {
                $("#wardname").html(data);

            });


        });

        $("#wardname").on("change", function(e) {
            e.preventDefault();
            var id = $(this).val();
            var url = "<?= url('/System/Innovations/Coordinates') ?>";
            $.get(url, {
                'name': id
            }, function(data) {
                $("#lon").val(data.lon);
                $("#lat").val(data.lat);
            });


        });
        $("#VCOName").select2();


        $("#datePicker")
            .datepicker({
                defaultDate: "+0w",
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1
            });
    </script>
@endpush
