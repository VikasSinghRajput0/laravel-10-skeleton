@extends('layouts.main')
@section('title', 'User || Master')
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
                <h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Users List</h1>
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
                        Export Users
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_user">Add User</button>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="user_data_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-50px pe-2">
                            Sr NO.
                        </th>
                        <th class="min-w-125px text-center">User Name</th>
                        <th class="min-w-125px text-center"> User Email</th>
                        <th class="min-w-125px text-center">Phone Number</th>
                        <th class="min-w-125px text-center">Status</th>
                        <th class="text-center min-w-70px">Actions</th>
                    </tr>
                </thead>

                <tbody class="fw-semibold text-gray-600">
                    @foreach ($user as $key => $users)
                    <tr class="text-uppercase">
                        <td>
                            {{$key+1}}
                        </td>
                        <td class="text-center">{{$users->name}} </td>
                        <td class="text-center">{{$users->email}} </td>
                        <td class="text-center">{{$users->phone_number}} </td>
                        <td class="text-center">
                            @if ($users->active == 1)
                            <span class="badge badge-light-success">Active</span>
                            @else
                            <span class="badge badge-light-danger">InActive </span>
                            @endif
                        </td>
                        <td class="text-center ">

                            @if ($users->active == 1)
                            <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="ki-outline ki-pencil fs-2"></i><input type="hidden" class="id" value="{{ $users->id }}">
                            </a>
                            <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm changeStatus">
                                <input type="hidden" class="id" value="{{ $users->id }}">
                                <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                    <input class="form-check-input erpCheckbox" type="checkbox" value="" checked id="kt_flexSwitchCustomDefault_1_1" />
                                </div>
                            </button>

                            @else
                            <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <i class="ki-outline ki-pencil fs-2"></i><input type="hidden" class="id" value="{{ $users->id }}">
                            </a>
                            <button class="btn btn-icon btn-bg-light btn-active-color-success btn-sm  changeStatus ">
                                <input type="hidden" class="id" value="{{ $users->id }}">
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
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        var table = $('#user_data_table').DataTable();
        $('.regionData').select2({
            minimumResultsForSearch: Infinity,
        });
        // Add export buttons to DataTable
        const documentTitle = 'Users Data';
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

    });
</script>

@endsection