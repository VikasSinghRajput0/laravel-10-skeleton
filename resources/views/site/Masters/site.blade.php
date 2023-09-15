@extends('layouts.main')
@section('title', 'ERP|Site')
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
                <h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">Sites List</h1>
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
                        Export Sites
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_site">Add Site</button>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="site_data_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-50px pe-2">
                            Sr NO.
                        </th>
                        <th class="min-w-125px text-center">Site Name</th>
                        <th class="min-w-125px text-center"> Site Code</th>
                        <th class="min-w-125px text-center">Region</th>
                        <th class="min-w-125px text-center">Country</th>
                        <th class="min-w-125px text-center">Status</th>
                        <th class="text-center min-w-70px">Actions</th>
                    </tr>
                </thead>

                <tbody class="fw-semibold text-gray-600">
                    @foreach ($site as $key => $sites)
                    <tr class="text-uppercase">
                        <td>
                            {{$key+1}}
                        </td>
                        <td class="text-center">{{$sites->name}} </td>
                        <td class="text-center">{{$sites->code}} </td>
                        <td class="text-center">{{$sites->region}} </td>
                        <td class="text-center"> {{$sites->country}}</td>
                        <td class="text-center">
                            @if ($sites->active == 1)
                            <span class="badge badge-light-success">Active</span>
                            @else
                            <span class="badge badge-light-danger">InActive </span>
                            @endif
                        </td>
                        <td class="text-center ">

                            @if ($sites->active == 1)
                            <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 editSite">
                                <i class="ki-outline ki-pencil fs-2"></i><input type="hidden" class="id" value="{{ $sites->id }}">
                            </a>
                            <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm changeStatus">
                                <input type="hidden" class="id" value="{{ $sites->id }}">
                                <div class="form-check form-switch form-check-custom form-check-success form-check-solid">
                                    <input class="form-check-input erpCheckbox" type="checkbox" value="" checked id="kt_flexSwitchCustomDefault_1_1" />
                                </div>
                            </button>

                            @else
                            <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1 editSite">
                                <i class="ki-outline ki-pencil fs-2"></i><input type="hidden" class="id" value="{{ $sites->id }}">
                            </a>
                            <button class="btn btn-icon btn-bg-light btn-active-color-success btn-sm  changeStatus ">
                                <input type="hidden" class="id" value="{{ $sites->id }}">
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

{{-- ADD SITE MODAL --}}
<div class="modal fade" id="modal_add_site" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" id="siteForm" data-kt-redirect="">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header" id="modal_add_site_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Add a Site</h2>
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
                    <div class="scroll-y me-n7 pe-7" id="modal_add_site_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#modal_add_site_header" data-kt-scroll-wrappers="#modal_add_site_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold mb-2">Region</label>
                            <!--end::Label-->
                            <!--begin::Select 2-->
                            <select class="form-select form-select-solid regionData siteRegion" id="data-change" data-control="select2" name="region" aria-label="Select example">
                                <option>{{ __('Choose Region') }}</option>
                                @foreach ($region as $key => $regions)
                                <option value="{{ $regions->name }}">{{ $regions->name }}</option>
                                @endforeach
                            </select>
                            <!--end::Select 2-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold mb-2">Country</label>
                            <!--end::Label-->
                            <!--begin::Select 2-->
                            <select class="form-select form-select-solid countryData siteCountry" name="country" data-control="select2" aria-label="Select example">
                                <option> Choose Country </option>

                            </select>
                            <!--end::Select 2-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold mb-2">Site Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid siteName" placeholder="Site Name" name="name" required />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold mb-2">Site Code</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid siteCode" placeholder="Site Code" name="code" required readonly />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold mb-2">Site Status</label>
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
                    <button type="reset" id="modal_add_site_cancel" class="btn btn-light me-3">Discard</button>
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

{{-- UPDATE SITE MODAL --}}
<div class="modal fade" id="modal_edit_site" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" id="editSiteForm" data-kt-redirect="">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header" id="modal_edit_site_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bold">Update a Site</h2>
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
                    <div class="scroll-y me-n7 pe-7" id="modal_edit_site_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#modal_edit_site_header" data-kt-scroll-wrappers="#modal_edit_site_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold mb-2">Region</label>
                            <!--end::Label-->
                            <!--begin::input-->
                            <input type="text" class="form-control form-control-solid siteRegion" placeholder="" name="region" readonly />

                            <!--end::input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold mb-2">Country</label>
                            <!--end::Label-->
                            <!--begin::Select 2-->
                            <input type="text" class="form-control form-control-solid siteCountry" placeholder="" name="country" readonly />
                            <!--end::Select 2-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold mb-2">Site Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid siteName" placeholder="Site Name" name="name" required />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold mb-2">Site Code</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid siteCode" placeholder="Site Code" name="code" required readonly />
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
        var table = $('#site_data_table').DataTable();
        $('.regionData').select2({
            minimumResultsForSearch: Infinity,
        });
        // Add export buttons to DataTable
        const documentTitle = 'Sites Data';
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

        $('#siteForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: '/add-site',
                data: formData,
                success: function(response) {

                    Swal.fire({
                        text: response.message,
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false,
                    });
                    $('#modal_add_site').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Request failed:', error);
                },
            });
        });
    });
    $('#data-change').on('change', function() {
        let countryName = $(`.regionData option:selected`).val();
        $.ajax({
            type: "GET",
            url: "/get_country_data",
            data: {
                'countryName': countryName,
            },
            success: function(result) {
                $(`.countryData`).empty();
                if (result.success) {
                    var countryList = result.country;
                    $(`.countryData`).append($("<option>").text('Choose Country'));
                    $.each(countryList, function(index, country) {
                        $(`.countryData`).append(`<option value="${country}"> ${country} </option> `);
                    });
                    $('.countryData').select2({
                        minimumResultsForSearch: Infinity,
                    });
                } else {
                    $(`.countryData`).append($("<option>").text('country Not Found'));
                }
            }
        });
    });

    function changeSiteStatus(id, url) {
        Swal.fire({
            text: "Do you want to change the status of the Site?",
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
        url = "/change_site_status/{id}"
        changeSiteStatus(id, url);
    });

    $(`.editSite`).on('click', function() {
        var id = $(this).find('.id').val();
        $.ajax({
            type: "POST",
            url: "/edit_site_data",
            data: {
                'id': id,
                _token: "{{ csrf_token() }}",
            },
            success: function(result) {
                if (result.success) {
                    $('#modal_edit_site').modal('show');
                    $('#modal_edit_site').find('input[name="name"]').val(result.site.name);
                    $('#modal_edit_site').find('input[name="code"]').val(result.site.code);
                    $('#modal_edit_site').find('input[name="region"]').val(result.site.region);
                    $('#modal_edit_site').find('input[name="country"]').val(result.site.country);
                    $('#modal_edit_site').find('select[name="status"]').val(result.site.active).trigger('change');

                }
            }
        });
        $('#editSiteForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            var name = $('#modal_edit_site').find('input[name="name"]').val();
            var code = $('#modal_edit_site').find('input[name="code"]').val();
            $.ajax({
                type: 'POST',
                url: '/edit-site',
                data: {
                    'name': name,
                    'id': id,
                    'code': code,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    Swal.fire({
                        text: response.message,
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false,
                    });
                    $('#modal_edit_site').modal('hide');
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Request failed:', error);
                },
            });
        });
    });

    $('.siteName').on('input', function() {
        let siteRegion = $(`.siteRegion`).val();
        let siteCountry = $(`.siteCountry`).val();
        let siteName = $(`.siteName`).val();
        let regionCode = siteRegion.substring(0, 2);
        let countryCode = siteCountry.substring(0, 2);
        let nameCode = siteName.substring(0, 2);
        let uniqueNum = Math.floor(Math.random() * 99) + 100
        console.log(uniqueNum);
        let siteCode = regionCode + countryCode + nameCode + uniqueNum;
        $(`.siteCode`).val(siteCode);
    })
</script>

@endsection