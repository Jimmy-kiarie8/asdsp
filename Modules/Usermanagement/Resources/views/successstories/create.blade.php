@extends('layouts.app')


@section('content')




    <p>
        <a title="Add Success Story" href="<?= url('/System/SuccessStories/Create') ?>" class="btn btn-sm btn-info"><span
                class="fa fa-plus"><span>New Success Story</a>

        <a href="<?= url('/System/SuccessStories/Index') ?>" class="btn btn-sm btn-success"><span class="fa fa-bars"><span>List
                    of Success Stories</a>






    </p>


    <div class="row">
        <div class="col-md-12">
            <div class="widget box">
                <div class="widget-header">
                    <h4><i class="icon-reorder"></i>Create New Success Stories</h4>
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

                                        <div class="col-md-12">
                                            <div class="row">



                                                <div class="form-group col-md-6">
                                                    <label>County Name</label>
                                                    {{ Form::select('county_id', [null => '--Select Sub County--'] + $counties, $model->county_id, ['class' => 'form-controls', 'required' => 'required', 'id' => 'County', 'style' => 'width:100%']) }}
                                                    </span>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Location</label>
                                                    <input type="text" name="location" class="form-control" required>
                                                    </span>
                                                </div>
                                            </div>



                                        </div>







                                        <div class="form-group col-md-12">
                                            <label>Group Name</label>
                                            <input type="text" name="group_name" class="form-control" required>
                                            </span>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Description </label>
                                            {{-- {{ Form::select('innovation_id',([null=>'--Select Node--'] + $innovations), $model->innovation_id, ['class'=>'form-control','required'=>false,'id'=>'Node','style'=>'width:100%']) }} --}}
                                            <textarea rows="4" name="strory_description" class="form-control" id="Description">{{ $model->strory_description }}</textarea>
                                            </span>
                                        </div>



                                        <div class="form-group col-md-12">
                                            <label>Story Title </label>
                                            <input type="text" name="story_title" class="form-control" required
                                                value="{{ old('story_title') }}">
                                            </span>
                                        </div>






                                    </div>






                                    <div class="row">




                                        <div class="form-group col-md-6">
                                            <label>Node</label>
                                            {{ Form::select('node_id', [null => '--Select Node--'] + $nodes, $model->node_id, ['class' => 'form-control', 'required' => 'required', 'id' => 'Node', 'style' => 'width:100%']) }}
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label>Value Chain</label>
                                            {{ Form::select('value_chain', [null => '--Select Value--'] + $valuechains, $model->category, ['class' => 'form-control', 'required' => 'required', 'id' => 'LibrarSy', 'style' => 'width:100%']) }}
                                        </div>






                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <label>Cover Image</label>
                                    <div>
                                        <img name="images" width="200" height="320" id="image_array1" value=""
                                            src="{{ asset('placeholder.png') }}" style="width: 100%;height: 200px;" />
                                        <!--<div id="image_array1"   ></div> Use This if You want to display Multiple Images-->
                                        <input type="hidden" class="form-control validate" name="primary_image"
                                            value="" id="img_id_cover" required>
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
                                    <label>Story Description</label>
                                    <textarea rows="10" name="inno_description" class="form-control" required id="Description">{{ old('inno_description') }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <legend>Other/Related Images</legend>
                                    <h5>Hint:max of 7 images</h5>



                                    <div class="row">
                                        <div id="image_array11"></div>
                                    </div>


                                    <input type="hidden" class="form-control validate" name="primary_images[]"
                                        id="img_ids1" required>
                                    <br />
                                    <a href="#modal-message" class="uploadmodalwidget btn btn-default btn-sm"
                                        data-toggle="modal" id="uploadmodal" data-inputid="img_ids1" data-mode="multiple"
                                        data-divid="image_array11" style="position: absolute;z-index: 1;">Upload Image</a>
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
    <script src="{{ asset('http://cdn.ckeditor.com/4.5.7/standard/ckeditor.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
        CKEDITOR.replace('Description', {
            height: 500
        });


        $("#datePicker")
            .datepicker({
                defaultDate: "+0w",
                changeMonth: true,
                changeYear: true,
                numberOfMonths: 1
            });
    </script>
@endpush
