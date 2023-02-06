@extends('layouts.backend')
@section('title', 'Order Details')

@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                    </ol>
                </nav>
                <h1 class="m-0">Order Details</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid page__container">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-between">
                            <div>
                                <p><strong>Order By: </strong>{{ $order->user->name }} |
                                    {{ $order->user->email }} |
                                    <strong
                                        class="{{ $order->status == 1 ? 'bg-info' : ($order->status == 2 ? 'bg-warning' : 'bg-success') }} badge text-white">{{ $order->status == 1 ? 'Running Order' : ($order->status == 2 ? 'Deactive Order' : 'Compleated Order') }}</strong>
                                </p>

                            </div>

                            <div>
                                @if (Auth::user()->role === 'admin')
                                    @if ($order->status == 1 || $order->status == 2)
                                        <a href="{{ route('dashboard.order.status.running.done', $order->id) }}"
                                            class="btn btn-success">Make Done</a>
                                    @elseif($order->status == 3)
                                        <a href="{{ route('dashboard.order.status.running.done', $order->id) }}"
                                            class="btn btn-success">Make Running</a>
                                    @endif
                                @endif

                                <a href="{{ route('dashboard.order.download', $order->id) }}"
                                    class="btn btn-primary">Download</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td width="25%"><strong>Art# & PO#</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->art_po }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>PO Recv date</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->po_recv_date ? $order->po_recv_date->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Color</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->color }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Style</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->style }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Quantity</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->quantity }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Fabrication</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->fabrication }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>SC, SO, FR Status</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->sc_so_fr_status }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Bom Create</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->bom_create }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Fabric Sourcing Country</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->fabric_sourcing_country }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>YARN Booking Date</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->yarn_booking_date ? $order->yarn_booking_date->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>YARN Received date</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->yarn_receive_date ? $order->yarn_receive_date->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Dying Start Date </strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->dying_start_date ? $order->dying_start_date->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Dying Finishing Date </strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->dying_finishing_date ? $order->dying_finishing_date->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Fabric Booking Date</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->fabric_booking_date ? $order->fabric_booking_date->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>PP Submite Date</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->pp_submite_date ? $order->pp_submite_date->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>PP Approval Status </strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->pp_approval_status }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Lab Test Sent</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->lab_test_sent }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Lab test Aprvd</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->color_continuity }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Color Continuity</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->its_sgs }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>ITS/SGS </strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->its_sgs }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Fabric Etd</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->fabric_etd ? $order->fabric_etd->isoFormat('MMM - DD - YYYY') : '--' }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Fabric Eta</strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->fabric_eta ? $order->fabric_eta->isoFormat('MMM - DD - YYYY') : '--' }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Main Label,Size label Tax Tab Booking Date
                                    </strong></td>
                                <td width="5%">:</td>
                                <td>{{ $order->label_tab_booking ? $order->label_tab_booking->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Main Label,Size label Tax Tab In-housed</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->label_tab_in_house ? $order->label_tab_in_house->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Care Label Booking </strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->care_booking ? $order->care_booking->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Care Label In-housed Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->care_in_house ? $order->care_in_house->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Approved layout of care label</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>
                                    @if ($order->approved_layout)
                                        <img src="{{ asset('storage/order/' . $order->approved_layout) }}" width="100"
                                            alt="">
                                        <a href="{{ route('dashboard.order.approved.layout.download', $order->id) }}"
                                            class="btn btn-sm btn-primary ml-3">Download</a>
                                    @else
                                        --
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Button Booking Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->button_booking ? $order->button_booking->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Button In-Housed Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->button_in_house ? $order->button_in_house->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Sewing Thread Booking Date </strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->sewing_booking ? $order->sewing_booking->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Sewing Thread In-housed Date </strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->sewing_in_house ? $order->sewing_in_house->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Neck tape Booking Date </strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->neck_booking ? $order->neck_booking->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Neck tape In-housed Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->neck_in_house ? $order->neck_in_house->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Metal items Booking Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->metal_booking ? $order->metal_booking->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Metal items In-housed Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->metal_in_house ? $order->metal_in_house->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Zipper Booking Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->zipper_booking ? $order->zipper_booking->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Zipper In-housed Date </strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->zipper_in_house ? $order->zipper_in_house->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Stickers Booking Date </strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->sticker_booking ? $order->sticker_booking->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Stickers In-housed Date </strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->sticker_in_house ? $order->sticker_in_house->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Poly Booking Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->poly_booking ? $order->poly_booking->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Poly In-housed Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->poly_in_house ? $order->poly_in_house->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Carton Booking Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->carton_booking ? $order->carton_booking->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Carton In-housed Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->carton_in_house ? $order->carton_in_house->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Others</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{!! $order->other_accessories !!}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Othprint Str. Off Submit Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->print_str ? $order->print_str->isoFormat('MMM - DD - YYYY') : '--' }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Print Str. Off Approved Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->print_str_approved ? $order->print_str_approved->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Embr Str. Off Submit Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->embr_str ? $order->embr_str->isoFormat('MMM - DD - YYYY') : '--' }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Embr Str. Off Approved Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->embr_str_approved ? $order->embr_str_approved->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Accessories All in-Housed </strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->accessories_in_house ? $order->accessories_in_house->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Accessories Inventory Report</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>
                                    @if ($order->accessories_report)
                                        <img src="{{ asset('storage/order/' . $order->accessories_report) }}"
                                            width="100" alt="">
                                        <a href="{{ route('dashboard.order.accessories.report.download', $order->id) }}"
                                            class="btn btn-primary ml-2">Download</a>
                                    @else
                                        --
                                    @endif

                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Fabric</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->fabric ? $order->fabric->isoFormat('MMM - DD - YYYY') : '--' }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Red Seal Sample</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->red_seal_sample }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>PP Meeting</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->pp_meeting ? $order->pp_meeting->isoFormat('MMM - DD - YYYY') : '--' }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Input date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->input_date ? $order->input_date->isoFormat('MMM - DD - YYYY') : '--' }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Production Update </strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->production_update ? $order->production_update->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Ins Date</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->ins_date ? $order->ins_date->isoFormat('MMM - DD - YYYY') : '--' }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Remarks</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->remarks }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Black Seal Sample</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->black_seal_sample ? $order->black_seal_sample->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Wash App</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->wash_app ? $order->wash_app->isoFormat('MMM - DD - YYYY') : '--' }}</td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Shipping Sample Sen</strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->shipping_sample_sent ? $order->shipping_sample_sent->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                            <tr>
                                <td width="25%"><strong>Black Seal Approved </strong>
                                </td>
                                <td width="5%">:</td>
                                <td>{{ $order->black_seal_approved ? $order->black_seal_approved->isoFormat('MMM - DD - YYYY') : '--' }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
