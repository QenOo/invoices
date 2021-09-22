@extends('layouts.master')
@section('title')
    المنتجات
@endsection
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

    <!-- Internal Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <style>
        .select2 {
            display: block;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 font-weight-bold my-auto">الإعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المنتجات</span>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <div class="pr-1 mb-3 mb-xl-0">
                <a class="btn ripple btn-primary modal-effect" data-effect="effect-scale" data-target="#modaldemo8" data-toggle="modal" href="">  <i class="typcn typcn-document-add ml-1"></i> اضافة منتج  </a>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">



        <!--div-->
        <div class="col-xl-12">

            @if ($errors->any())
                @foreach ($errors->all() as $error)

                    <div class="alert alert-danger fade show mb-1" role="alert">
                        <span class="alert-inner--icon"><i class="fe fe-slash"></i></span>
                        <span class="alert-inner--text"><strong class="ml-2">خطأ!</strong> {{ $error }} </span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>

                @endforeach
            @endif


            @if(session()->has('add'))
            <!-- Alert -->
                <div class="alert alert-success fade show mb-1" role="alert">
                    <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
                    <span class="alert-inner--text"><strong>نجاح!</strong> {{ session()->get('add') }} </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- Alert -->
            @endif

            @if(session()->has('edit'))
            <!-- Alert -->
                <div class="alert alert-success fade show mb-1" role="alert">
                    <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
                    <span class="alert-inner--text"><strong>نجاح!</strong> {{ session()->get('edit') }} </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- Alert -->
            @endif

            @if(session()->has('deleted'))
            <!-- Alert -->
                <div class="alert alert-success fade show mb-1" role="alert">
                    <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
                    <span class="alert-inner--text"><strong>نجاح!</strong> {{ session()->get('deleted') }} </span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- Alert -->
            @endif

            <div class="card mg-b-20">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap" data-page-lengith="10">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">اسم المنتج</th>
                                <th class="border-bottom-0">اسم القسم</th>
                                <th class="border-bottom-0">الوصف</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->section->section_name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <div class="d-block">
                                            <a
                                                class="btn btn-primary-gradient btn-inline-block modal-effect"
                                                data-id="{{$product->id}}"
                                                data-section="{{ $product->section->section_name }}"
                                                data-name="{{$product->product_name}}" data-note="{{ $product->description }}"
                                                data-effect="effect-scale" data-target="#edit" data-toggle="modal"
                                                data-keyboard="true"
                                                title="تعديل"
                                                href=""
                                            >
                                                <i class="las la-pen"></i> تعديل
                                            </a>
                                            <a
                                                class="btn btn-danger-gradient btn-inline-block modal-effect"
                                                data-id="{{$product->id}}"
                                                data-section="{{ $product->section->section_name }}"
                                                data-name="{{$product->product_name}}"
                                                data-effect="effect-scale"
                                                data-target="#delete"
                                                data-toggle="modal"
                                                data-keyboard="true" title="حذف" href="">  <i class="la la-trash"></i> حذف  </a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- row closed -->

    <!-- Modal add -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"><i class="typcn typcn-document-add ml-2"></i> إضافة منتج </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="add-product" action="{{ route('products.store') }}" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">إسم المنتج</label>
                            <input type="text" name="product_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="id_section"> القسم</label>
                            <select class="form-control select2 d-block" id="section_id" name="section_id">
                                @foreach($sections as $section)
                                <option value="{{ $section->id }}">
                                    {{ $section->section_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">ملاحظات</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-success" type="submit" form="add-product">حفظ التغييرات</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal add-->

    <!-- Modal edit -->
    <div class="modal" id="edit">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"><i class="las la-cog"></i> تعديل المنتج </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="edit-section" action="products/update" method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" id="id" name="id">

                            <label for="exampleInputEmail1">إسم المنتج</label>
                            <input type="text" id="name" name="product_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="p_section_id"> القسم</label>
                            <select class="form-control select2 d-block" id="p_section_id" name="section_id">
                                @foreach($sections as $section)
                                    <option>
                                        {{ $section->section_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">ملاحظات</label>
                            <textarea id="note" name="description" class="form-control" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-success" type="submit" form="edit-section">حفظ التغييرات</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal add-->

    <!-- Modal delete -->
    <div class="modal" id="delete" tabindex='-1'>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title"><i class="las la-trash"></i> حذف قسم </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="delete-section" action="products/destroy" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" id="id" name="id">

                            <label for="name">هل انت متاكد من انك تريد حذف قسم</label>
                            <input type="text" readonly id="name" name="products_name" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-success" type="submit" form="delete-section">حفظ التغييرات</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal delete-->

    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>



    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('assets/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('assets/js/form-elements.js')}}"></script>



    <script>
        $('#edit').on('show.bs.modal', function (e) {
            var button          = $(e.relatedTarget);
            var id              = button.data('id');
            var section         = button.data('section');
            var name            = button.data('name');
            var note            = button.data('note');
            var modal           = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #section_id').val(section);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #note').val(note);
            console.log(section)
            $("#p_section_id").select2({
                width: '100%',
                placeholder: "إختار القسم",
                allowClear: true
            });


        });


        $('#delete').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        });
    </script>
@endsection
