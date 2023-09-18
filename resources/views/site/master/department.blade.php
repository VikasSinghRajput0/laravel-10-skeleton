@extends('layouts.main')
@section('title', 'Department || Master')
@section('content')
<style>
    .dt-buttons.btn-group.flex-wrap {
        display: none !important;
    }
</style>

<div class="toolbar py-2" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
        <div class="flex-grow-1 flex-shrink-0 me-5">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Department List</h1>
                <span class="h-20px border-gray-200 border-start mx-3"></span>
            </div>
        </div>
        <div class="d-flex align-items-center flex-wrap">

            <div class="d-flex align-items-center">

            </div>
        </div>
    </div>
</div>
<div id="kt_content_container">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                    <input type="text" data-kt-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Country" />
                </div>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-exit-down fs-2"><span class="path1"></span><span class="path2"></span></i>
                        Export Departmentes
                    </button>
                    <!--begin::Menu-->
                    <div id="country_export_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-200px py-4" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-export="copy">
                                Copy to clipboard
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-export="excel">
                                Export as Excel
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-export="csv">
                                Export as CSV
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3" data-kt-export="pdf">
                                Export as PDF
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_Department">Add Department</button>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="Department_data_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-50px pe-2">
                            Sr NO.
                        </th>
                        <th class="min-w-125px text-center">Department Name</th>
                        <th class="min-w-125px text-center"> Created BY</th>
                        <th class="min-w-125px text-center">Status</th>
                        <th class="text-center min-w-70px">Actions</th>
                    </tr>
                </thead>

                <tbody class="fw-semibold text-gray-600">
                    @foreach ($Department as $key => $Departmentes)
                    <tr class="text-uppercase">
                        <td>
                            {{$key+1}}
                        </td>
                        <td class="text-center">{{$Departmentes->name}} </td>
                        <td class="text-center">{{$Departmentes->created_by}} </td>
                        <td class="text-center">
                            @if ($Departmentes->active == 1)
                            <span class="badge badge-light-success">Active</span>
                            @else
                            <span class="badge badge-light-danger">InActive </span>
                            @endif
                        </td>
                        <td class="text-center ">

                            @if ($Departmentes->active == 1)
                            <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 editDepartment">
                                <i class="ki-outline ki-pencil fs-2"></i><input type="hidden" class="id" value="{{ $Departmentes->id }}">
                            </a>
                            <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm changeStatus">
                                <input type="hidden" class="id" value="{{ $Departmentes->id }}">
                                <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                    <input class="form-check-input erpCheckbox" type="checkbox" value="" checked id="kt_flexSwitchCustomDefault_1_1" />
                                </div>
                            </button>

                            @else
                            <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 editDepartment">
                                <i class="ki-outline ki-pencil fs-2"></i><input type="hidden" class="id" value="{{ $Departmentes->id }}">
                            </a>
                            <button class="btn btn-icon btn-bg-light btn-active-color-success btn-sm  changeStatus ">
                                <input type="hidden" class="id" value="{{ $Departmentes->id }}">
                                <div class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="" id="flexSwitchDefault" />
                                </div>
                            </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>


            </table>
        </div>
    </div>
</div>

{{-- ADD Department MODAL --}}
<div class="modal fade" id="modal_add_Department" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" id="DepartmentForm" data-kt-redirect="">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header" id="modal_add_Department_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Add a Department</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="modal_add_Department_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#modal_add_Department_header" data-kt-scroll-wrappers="#modal_add_Department_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold mb-2">Department Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid DepartmentName" placeholder="Department Name" name="name" required />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold mb-2">Created By</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid DepartmentCode"  name="created_by" value="{{Auth::user()->name}}" required readonly />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold mb-2">Department Status</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select" name="status" data-control="select2">
                                <option value="1">Active</option>
                                <option value="0">De-Active</option>
                            </select>
                            <!--end::Input-->
                        </div>
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="modal_add_Department_cancel" class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-primary submit">
                        Submit
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>

{{-- UPDATE Department MODAL --}}
<div class="modal fade" id="modal_edit_Department" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" id="editDepartmentForm" data-kt-redirect="">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header" id="modal_edit_Department_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Update a Department</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="modal_edit_Department_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#modal_edit_Department_header" data-kt-scroll-wrappers="#modal_edit_Department_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold mb-2">Department Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid DepartmentName" placeholder="Department Name" name="name" required />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold mb-2">CREATED BY</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid DepartmentCode" placeholder="CREATED BY" name="created_by" value="{{Auth::user()->name}}" required readonly />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        var table = $('#Department_data_table').DataTable();
        $('.regionData').select2({
            minimumResultsForSearch: Infinity,
        });
        // Add export buttons to DataTable
        const documentTitle = 'Departments Data';
        var buttons = new $.fn.dataTable.Buttons(table, {
            buttons: [{
                    extend: 'copyHtml5',
                    title: documentTitle
                },
                {
                    extend: 'excelHtml5',
                    title: documentTitle
                },
                {
                    extend: 'csvHtml5',
                    title: documentTitle
                },
                {
                    extend: 'pdfHtml5',
                    title: documentTitle
                }
            ]
        }).container().appendTo($('#country_export_menu'));

        // Handle export button clicks
        $('#country_export_menu [data-kt-export]').on('click', function(e) {
            e.preventDefault();

            // Get the export value
            const exportValue = $(this).data('kt-export');

            // Find the corresponding DataTable export button and trigger its click event
            const target = $('.dt-buttons .buttons-' + exportValue);

            if (target.length > 0) {
                target[0].click();
            } else {
                console.error("Target element not found:", exportValue);
            }
        });

        // Add search functionality
        $('[data-kt-filter="search"]').on('keyup', function() {
            table.search(this.value).draw();
        });

        $('#DepartmentForm').submit(function(e) {
            e.preventDefault();
            var name = $('input[name="name"]').val();
            var created_by = $('input[name="created_by"]').val();
            var status = $('select[name="status"] option:selected').val();
            console.log(name,created_by,status);
            $.ajax({
                type: 'POST',
                url: '/add-department',
                data: {
                        name,
                        created_by,
                        status,
                        _token: "{{ csrf_token() }}",
                    },
                success: function(response) {

                    Swal.fire({
                        text: response.message,
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false,
                    });
                    $('#modal_add_Department').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Request failed:', error);
                },
            });
        });
    });

    function changeDepartmentStatus(id, url) {
        Swal.fire({
            text: "Do you want to change the status of the Department?",
            icon: "success",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-danger",
            },
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    method: "POST",
                    url: url,
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(response) {
                        Swal.fire({
                            text: response.message,
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false,
                        });
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            text: error,
                            icon: "error",
                            timer: 1500,
                            showConfirmButton: false,
                        });
                    },
                });
            } else {

            }
        });
    }

    $('.changeStatus').on('click', function() {
        var id = $(this).find('.id').val();
        url = "/change_department_status/{id}"
        changeDepartmentStatus(id, url);
    });

    $(`.editDepartment`).on('click', function() {
        var id = $(this).find('.id').val();
        $.ajax({
            type: "POST",
            url: "/edit_department_data",
            data: {
                'id': id,
                _token: "{{ csrf_token() }}",
            },
            success: function(result) {
                if (result.success) {
                    $('#modal_edit_Department').modal('show');
                    $('#modal_edit_Department').find('input[name="name"]').val(result.Department.name);
                }
            }
        });
        $('#editDepartmentForm').submit(function(e) {
            e.preventDefault();
            var name = $('#modal_edit_Department').find('input[name="name"]').val();
            var created_by = $('#modal_edit_Department').find('input[name="created_by"]').val();
            $.ajax({
                type: 'POST',
                url: '/edit-department',
                data: {
                    'name': name,
                    'created_by' : created_by,
                    'id': id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    Swal.fire({
                        text: response.message,
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false,
                    });
                    $('#modal_edit_Department').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Request failed:', error);
                },
            });
        });
    });
</script>

@endsection