<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromQuery, WithHeadings, WithMapping {

    use Exportable;
    protected $order;

    public function __construct( int $order ) {
        $this->order = $order;

    }

    public function headings(): array{

        return [
            'Art# & PO#',
            'PO Recv date',
            'Color',
            'Style',
            'Quantity',
            'Fabrication',
            'SC, SO, FR Status',
            'BOM CREATE',
            'Fabric Sourcing Country',
            'YARN Booking date',
            'YARN Received date',
            'Dying Start Date',
            'Dying Finishing Date',
            'Fabric Booking date',
            'PP Submite Date',
            'PP Approval Status',
            'Lab test sent',
            'Lab test Aprvd',
            'Color Continuity',
            'ITS/SGS',
            'FABRIC ETD',
            'FABRIC ETA',
            'Main Label,Size label Tax Tab Booking Date',
            'Main Label,Size label Tax Tab In-housed ',
            'Care Label Booking',
            'Care Label In-housed Date',
            'Button Booking Date',
            'Button In-Housed Date',
            'Sewing Thread Booking Date',
            'Sewing Thread In-housed Date',
            'Neck tape Booking Date',
            'Neck tape In-housed Date',
            'Metal items Booking Date',
            'Metal items In-housed Date',
            'Zipper Booking Date',
            'Zipper In-housed Date',
            'Stickers Booking Date',
            'Stickers In-housed Date',
            'Poly Booking Date',
            'Poly In-housed Date',
            'Carton Booking Date',
            'Carton In-housed Date',
            'Other Accessories',
            'PRINT STR. OFF SUBMIT DATE',
            'PRINT STR. OFF APPROVED DATE',
            'EMBR STR. OFF SUBMIT DATE',
            'EMBR STR. OFF APPROVED DATE',
            'Accessories All in-Housed',
            'Fabric',
            'Red Seal Sample',
            'PP Meeting',
            'Input date',
            'Production Update',
            'Ins Date',
            'Remarks',
            'Black Seal Sample',
            'Wash app',
            'Shipping Sample Sent',
            'Black Seal Approved',
            'order Status',
        ];

    }

    public function map( $order ): array
    {
        return [
            $order->art_po,
            $order->po_recv_date,
            $order->color,
            $order->style,
            $order->quantity,
            $order->fabrication,
            $order->sc_so_fr_status,
            $order->bom_create,
            $order->fabric_sourcing_country,
            $order->yarn_booking_date,
            $order->yarn_receive_date,
            $order->dying_start_date,
            $order->dying_finishing_date,
            $order->fabric_booking_date,
            $order->pp_submite_date,
            $order->pp_approval_status,
            $order->lab_test_sent,
            $order->lab_test_aprvd,
            $order->color_continuity,
            $order->its_sgs,
            $order->fabric_etd,
            $order->fabric_eta,
            $order->label_tab_booking,
            $order->label_tab_in_house,
            $order->care_booking,
            $order->care_in_house,
            $order->button_booking,
            $order->button_in_house,
            $order->sewing_booking,
            $order->sewing_in_house,
            $order->neck_booking,
            $order->neck_in_house,
            $order->metal_booking,
            $order->metal_in_house,
            $order->zipper_booking,
            $order->zipper_in_house,
            $order->sticker_booking,
            $order->sticker_in_house,
            $order->poly_booking,
            $order->poly_in_house,
            $order->carton_booking,
            $order->carton_in_house,
            strip_tags( $order->other_accessories ),
            $order->print_str,
            $order->print_str_approved,
            $order->embr_str,
            $order->embr_str_approved,
            $order->accessories_in_house,
            $order->fabric,
            $order->red_seal_sample,
            $order->pp_meeting,
            $order->input_date,
            $order->production_update,
            $order->ins_date,
            $order->remarks,
            $order->black_seal_sample,
            $order->wash_app,
            $order->shipping_sample_sent,
            $order->black_seal_approved,
            $order->status == 1 ? 'Running Order' : ( $order->status == 2 ? 'Deactive Order' : 'Compleated Order' ),
        ];
    }

    public function query() {
        return Order::query()->where( 'id', $this->order );
    }

}