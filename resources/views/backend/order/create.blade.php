@extends('layouts.backend')
@section('title', 'Create Order')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Order</li>
                    </ol>
                </nav>
                <h1 class="m-0">Create Order</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">
        <form action="{{ route('dashboard.order.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-header">
                            <h3>Create Order</h3>
                        </div>

                        <div class="card-body">

                            <div class="form-group">
                                <label for="" class="form-label">Art# & PO#: <sup
                                        class="text-danger">*</sup></label>
                                <input type="text" name="art_po"
                                    class="form-control mb-2 @error('art_po') is-invalid @enderror"
                                    placeholder="Unique Art & PO" value="{{ old('art_po') }}">
                                @error('art_po')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">PO Recv date:</label>
                                <input type="date" name="po_recv_date"
                                    class="form-control mb-2 @error('po_recv_date') is-invalid @enderror"
                                    placeholder="PO Recv date" value="{{ old('po_recv_date') }}">
                                @error('po_recv_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Color:</label>
                                <input type="text" name="color"
                                    class="form-control mb-2 @error('color') is-invalid @enderror" placeholder="Color"
                                    value="{{ old('color') }}">
                                @error('color')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Style:</label>
                                <input type="text" name="style"
                                    class="form-control mb-2 @error('style') is-invalid @enderror" placeholder="Style"
                                    value="{{ old('style') }}">
                                @error('style')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Quantity:<sup class="text-danger">*</sup></label>
                                <input type="number" name="quantity"
                                    class="form-control mb-2 @error('quantity') is-invalid @enderror" placeholder="Quantity"
                                    value="{{ old('quantity') }}">
                                @error('quantity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Fabrication:</label>
                                <input type="text" name="fabrication"
                                    class="form-control mb-2 @error('fabrication') is-invalid @enderror"
                                    placeholder="Fabrication" value="{{ old('fabrication') }}">
                                @error('fabrication')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="" class="form-label">Select Client: <sup
                                        class="text-danger">*</sup></label>
                                <select name="client" class="form-control  select2 @error('client') is-invalid @enderror">
                                    <option selected disabled>Select Client</option>
                                    @foreach ($users as $users)
                                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                                    @endforeach
                                </select>
                                @error('client')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3>Create Accessories</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">Main Label,Size label Tax Tab Booking Date
                                    :</label>
                                <input type="date" name="label_tab_booking"
                                    class="form-control mb-2 @error('label_tab_booking') is-invalid @enderror"
                                    value="{{ old('label_tab_booking') }}">
                                @error('label_tab_booking')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Main Label,Size label
                                    Tax Tab In-housed :</label>
                                <input type="date" name="label_tab_in_house"
                                    class="form-control mb-2 @error('label_tab_in_house') is-invalid @enderror"
                                    value="{{ old('label_tab_in_house') }}">
                                @error('label_tab_in_house')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Care Label Booking :</label>
                                <input type="date" name="care_booking"
                                    class="form-control mb-2 @error('care_booking') is-invalid @enderror"
                                    value="{{ old('care_booking') }}">
                                @error('care_booking')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Care Label
                                    In-housed Date :</label>
                                <input type="date" name="care_in_house"
                                    class="form-control mb-2 @error('care_in_house') is-invalid @enderror"
                                    value="{{ old('care_in_house') }}">
                                @error('care_in_house')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Approved layout of care label :</label>
                                <input type="file" name="approved_layout"
                                    class="form-control mb-2 @error('approved_layout') is-invalid @enderror"
                                    value="{{ old('approved_layout') }}">
                                @error('approved_layout')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Button Booking Date:</label>
                                <input type="date" name="button_booking"
                                    class="form-control mb-2 @error('button_booking') is-invalid @enderror"
                                    value="{{ old('button_booking') }}">
                                @error('button_booking')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Button In-Housed Date:</label>
                                <input type="date" name="button_in_house"
                                    class="form-control mb-2 @error('button_in_house') is-invalid @enderror"
                                    value="{{ old('button_in_house') }}">
                                @error('button_in_house')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Sewing Thread
                                    Booking Date :</label>
                                <input type="date" name="sewing_booking"
                                    class="form-control mb-2 @error('sewing_booking') is-invalid @enderror"
                                    value="{{ old('sewing_booking') }}">
                                @error('sewing_booking')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Sewing Thread
                                    In-housed Date :</label>
                                <input type="date" name="sewing_in_house"
                                    class="form-control mb-2 @error('sewing_in_house') is-invalid @enderror"
                                    value="{{ old('sewing_in_house') }}">
                                @error('sewing_in_house')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Neck tape Booking Date:</label>
                                <input type="date" name="neck_booking"
                                    class="form-control mb-2 @error('neck_booking') is-invalid @enderror"
                                    value="{{ old('neck_booking') }}">
                                @error('neck_booking')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Neck tape In-housed Date:</label>
                                <input type="date" name="neck_in_house"
                                    class="form-control mb-2 @error('neck_in_house') is-invalid @enderror"
                                    value="{{ old('neck_in_house') }}">
                                @error('neck_in_house')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Metal items Booking Date:</label>
                                <input type="date" name="metal_booking"
                                    class="form-control mb-2 @error('metal_booking') is-invalid @enderror"
                                    value="{{ old('metal_booking') }}">
                                @error('metal_booking')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Metal items In-housed Date:</label>
                                <input type="date" name="metal_in_house"
                                    class="form-control mb-2 @error('metal_in_house') is-invalid @enderror"
                                    value="{{ old('metal_in_house') }}">
                                @error('metal_in_house')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Zipper Booking Date:</label>
                                <input type="date" name="zipper_booking"
                                    class="form-control mb-2 @error('zipper_booking') is-invalid @enderror"
                                    value="{{ old('zipper_booking') }}">
                                @error('zipper_booking')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Zipper
                                    In-housed
                                    Date:</label>
                                <input type="date" name="zipper_in_house"
                                    class="form-control mb-2 @error('zipper_in_house') is-invalid @enderror"
                                    value="{{ old('zipper_in_house') }}">
                                @error('zipper_in_house')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Stickers Booking Date:</label>
                                <input type="date" name="sticker_booking"
                                    class="form-control mb-2 @error('sticker_booking') is-invalid @enderror"
                                    value="{{ old('sticker_booking') }}">
                                @error('sticker_booking')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Stickers In-housed Date :</label>
                                <input type="date" name="sticker_in_house"
                                    class="form-control mb-2 @error('sticker_in_house') is-invalid @enderror"
                                    value="{{ old('sticker_in_house') }}">
                                @error('sticker_in_house')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Poly Booking Date:</label>
                                <input type="date" name="poly_booking"
                                    class="form-control mb-2 @error('poly_booking') is-invalid @enderror"
                                    value="{{ old('poly_booking') }}">
                                @error('poly_booking')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Poly In-housed Date:</label>
                                <input type="date" name="poly_in_house"
                                    class="form-control mb-2 @error('poly_in_house') is-invalid @enderror"
                                    value="{{ old('poly_in_house') }}">
                                @error('poly_in_house')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Carton Booking Date:</label>
                                <input type="date" name="carton_booking"
                                    class="form-control mb-2 @error('carton_booking') is-invalid @enderror"
                                    value="{{ old('carton_booking') }}">
                                @error('carton_booking')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Carton In-housed Date:</label>
                                <input type="date" name="carton_in_house"
                                    class="form-control mb-2 @error('carton_in_house') is-invalid @enderror"
                                    value="{{ old('carton_in_house') }}">
                                @error('carton_in_house')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Other Accessories:</label>
                                <textarea name="other_accessories" row="8" id="other"
                                    class="form-control mb-2 @error('other_accessories') is-invalid @enderror">{{ old('other_accessories') }}</textarea>
                                @error('other_accessories')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3>Create Fabric</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">SC, SO, FR Status:</label>
                                <input type="text" name="sc_so_fr_status"
                                    class="form-control mb-2 @error('sc_so_fr_status') is-invalid @enderror"
                                    placeholder="SC, SO, FR Status" value="{{ old('sc_so_fr_status') }}">
                                @error('sc_so_fr_status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">BOM CREATE:</label>
                                <input type="text" name="bom_create"
                                    class="form-control mb-2 @error('bom_create') is-invalid @enderror"
                                    placeholder="BOM CREATE" value="{{ old('bom_create') }}">
                                @error('bom_create')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Fabric Sourcing
                                    Country :</label>
                                <input type="text" name="fabric_sourcing_country"
                                    class="form-control mb-2 @error('fabric_sourcing_country') is-invalid @enderror"
                                    placeholder="Fabric Sourcing Country " value="{{ old('fabric_sourcing_country') }}">
                                @error('fabric_sourcing_country')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">YARN Booking date:</label>
                                <input type="date" name="yarn_booking_date"
                                    class="form-control mb-2 @error('yarn_booking_date') is-invalid @enderror"
                                    value="{{ old('yarn_booking_date') }}">
                                @error('yarn_booking_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">YARN Received date:</label>
                                <input type="date" name="yarn_receive_date"
                                    class="form-control mb-2 @error('yarn_receive_date') is-invalid @enderror"
                                    value="{{ old('yarn_receive_date') }}">
                                @error('yarn_receive_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Dying Start Date:</label>
                                <input type="date" name="dying_start_date"
                                    class="form-control mb-2 @error('dying_start_date') is-invalid @enderror"
                                    value="{{ old('dying_start_date') }}">
                                @error('dying_start_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Dying Finishing Date:</label>
                                <input type="date" name="dying_finishing_date"
                                    class="form-control mb-2 @error('dying_finishing_date') is-invalid @enderror"
                                    value="{{ old('dying_finishing_date') }}">
                                @error('dying_finishing_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Fabric Booking date:</label>
                                <input type="date" name="fabric_booking_date"
                                    class="form-control mb-2 @error('fabric_booking_date') is-invalid @enderror"
                                    value="{{ old('fabric_booking_date') }}">
                                @error('fabric_booking_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">PP Submite Date :</label>
                                <input type="date" name="pp_submite_date"
                                    class="form-control mb-2 @error('pp_submite_date') is-invalid @enderror"
                                    value="{{ old('pp_submite_date') }}">
                                @error('pp_submite_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">PP Approval
                                    Status :</label>
                                <input type="text" placeholder="PP Approval Status " name="pp_approval_status"
                                    class="form-control mb-2 @error('pp_approval_status') is-invalid @enderror"
                                    value="{{ old('pp_approval_status') }}">
                                @error('pp_approval_status')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Lab test sent:</label>
                                <input type="text" placeholder="Lab test sent" name="lab_test_sent"
                                    class="form-control mb-2 @error('lab_test_sent') is-invalid @enderror"
                                    value="{{ old('lab_test_sent') }}">
                                @error('lab_test_sent')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Lab test Approved:</label>
                                <input type="text" placeholder="Lab test Aprvd" name="lab_test_aprvd"
                                    class="form-control mb-2 @error('lab_test_aprvd') is-invalid @enderror"
                                    value="{{ old('lab_test_aprvd') }}">
                                @error('lab_test_aprvd')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Color Continuity:</label>
                                <input type="text" placeholder="Color Continuity" name="color_continuity"
                                    class="form-control mb-2 @error('color_continuity') is-invalid @enderror"
                                    value="{{ old('color_continuity') }}">
                                @error('color_continuity')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">ITS/SGS :</label>
                                <input type="text" placeholder="ITS/SGS " name="its_sgs"
                                    class="form-control mb-2 @error('its_sgs') is-invalid @enderror"
                                    value="{{ old('its_sgs') }}">
                                @error('its_sgs')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">FABRIC ETD :</label>
                                <input type="date" name="fabric_etd"
                                    class="form-control mb-2 @error('fabric_etd') is-invalid @enderror"
                                    value="{{ old('fabric_etd') }}">
                                @error('fabric_etd')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">FABRIC ETA:</label>
                                <input type="date" name="fabric_eta"
                                    class="form-control mb-2 @error('fabric_eta') is-invalid @enderror"
                                    value="{{ old('fabric_eta') }}">
                                @error('fabric_eta')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3>Create Production</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="" class="form-label">PRINT STR. OFF SUBMIT DATE:</label>
                                <input type="date" name="print_str"
                                    class="form-control mb-2 @error('print_str') is-invalid @enderror"
                                    value="{{ old('print_str') }}">
                                @error('print_str')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">PRINT STR. OFF APPROVED DATE:</label>
                                <input type="date" name="print_str_approved"
                                    class="form-control mb-2 @error('print_str_approved') is-invalid @enderror"
                                    value="{{ old('print_str_approved') }}">
                                @error('print_str_approved')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">EMBR STR. OFF SUBMIT DATE:</label>
                                <input type="date" name="embr_str"
                                    class="form-control mb-2 @error('embr_str') is-invalid @enderror"
                                    value="{{ old('embr_str') }}">
                                @error('embr_str')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">EMBR STR. OFF APPROVED DATE:</label>
                                <input type="date" name="embr_str_approved"
                                    class="form-control mb-2 @error('embr_str_approved') is-invalid @enderror"
                                    value="{{ old('embr_str_approved') }}">
                                @error('embr_str_approved')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Accessories All in-Housed :</label>
                                <input type="date" name="accessories_in_house"
                                    class="form-control mb-2 @error('accessories_in_house') is-invalid @enderror"
                                    value="{{ old('accessories_in_house') }}">
                                @error('accessories_in_house')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Accessories Inventory Report :</label>
                                <input type="file" name="accessories_report"
                                    class="form-control mb-2 @error('accessories_report') is-invalid @enderror"
                                    value="{{ old('accessories_report') }}">
                                @error('accessories_report')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Fabric:</label>
                                <input type="date" name="fabric"
                                    class="form-control mb-2 @error('fabric') is-invalid @enderror"
                                    value="{{ old('fabric') }}">
                                @error('fabric')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Red Seal Sample:</label>
                                <input type="date" name="red_seal_sample"
                                    class="form-control mb-2 @error('red_seal_sample') is-invalid @enderror"
                                    value="{{ old('red_seal_sample') }}">
                                @error('red_seal_sample')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">PP Meeting:</label>
                                <input type="date" name="pp_meeting"
                                    class="form-control mb-2 @error('pp_meeting') is-invalid @enderror"
                                    value="{{ old('pp_meeting') }}">
                                @error('pp_meeting')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Input date:</label>
                                <input type="date" name="input_date"
                                    class="form-control mb-2 @error('input_date') is-invalid @enderror"
                                    value="{{ old('input_date') }}">
                                @error('input_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Production Update:</label>
                                <input type="date" name="production_update"
                                    class="form-control mb-2 @error('production_update') is-invalid @enderror"
                                    value="{{ old('production_update') }}">
                                @error('production_update')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Ins Date:</label>
                                <input type="date" name="ins_date"
                                    class="form-control mb-2 @error('ins_date') is-invalid @enderror"
                                    value="{{ old('ins_date') }}">
                                @error('ins_date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Remarks:</label>
                                <textarea name="" name="remarks" placeholder="Remarks"
                                    class="form-control mb-2 @error('remarks') is-invalid @enderror" rows="4">{{ old('remarks') }}</textarea>

                                @error('remarks')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Black Seal Sample:</label>
                                <input type="date" name="black_seal_sample"
                                    class="form-control mb-2 @error('black_seal_sample') is-invalid @enderror"
                                    value="{{ old('black_seal_sample') }}">
                                @error('black_seal_sample')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Wash app:</label>
                                <input type="date" name="wash_app"
                                    class="form-control mb-2 @error('wash_app') is-invalid @enderror"
                                    value="{{ old('wash_app') }}">
                                @error('wash_app')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Shipping Sample Sent:</label>
                                <input type="date" name="shipping_sample_sent"
                                    class="form-control mb-2 @error('shipping_sample_sent') is-invalid @enderror"
                                    value="{{ old('shipping_sample_sent') }}">
                                @error('shipping_sample_sent')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Black Seal Approved :</label>
                                <input type="date" name="black_seal_approved"
                                    class="form-control mb-2 @error('black_seal_approved') is-invalid @enderror"
                                    value="{{ old('black_seal_approved') }}">
                                @error('black_seal_approved')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="submit" class=" btn  btn-primary" value="Submit">
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
        .ck-editor__editable {
            min-height: 320px;
        }
    </style>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    <script>
        //editor
        ClassicEditor
            .create(document.querySelector('#other'), {
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        '|',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'insertTable',
                        '|',
                        'undo',
                        'redo'
                    ]
                }

            })
            .catch(error => {
                console.error(error);
            });

        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

@endsection
