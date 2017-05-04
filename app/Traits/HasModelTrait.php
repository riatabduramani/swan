<?php
namespace App\Traits;
use Carbon\Carbon;
use Auth;

trait HasModelTrait
{
    public function showStatusOf($record)
    {
        switch ($record) {
            case $record->status == 1:
                return '<span class="label label-success" aria-hidden="true">Active</span>';
                break;
            case $record->status == 2:
                return '<span class="label label-danger" aria-hidden="true">Disabled</span>';
                break;
            default:
                return '<span class="label label-danger" aria-hidden="true">Disabled</span>';
        }
    }

    public function showConfirmedOf($record)
    {
        switch ($record) {
            case $record->confirmed == 1:
                return '<label class="label label-success" aria-hidden="true">Confirmed</label>';
                break;
            case $record->confirmed == 0:
                return '<label class="label label-warning" aria-hidden="true">Pending</label>';
                break;
            default:
                return '<label class="label label-warning" aria-hidden="true">Pending</label>';
        }
    }

    public function showPaidStatus($record) {
        switch ($record) {
            case $record->payment_status == 1:
                return '<label class="label label-success" aria-hidden="true">Paid</label>';
                break;
             case $record->payment_status == 2:
                return '<label class="label label-danger" aria-hidden="true">Unpaid</label>';
                break;
            case $record->payment_status == 3:
                return '<label class="label label-warning" aria-hidden="true">Declined</label>';
                break;
            default:
               return '<label class="label label-danger" aria-hidden="true">Unpaid</label>';
        }
    }

    public function showPaidMethod($record) {
        switch ($record) {
            case $record->payment_method == null:
                return " - ";
                break;
            case $record->payment_method == 1:
                return '<label class="label label-success" aria-hidden="true">Cash</label>';
                break;
             case $record->payment_method == 2:
                return '<label class="label label-success" aria-hidden="true">Online</label>';
                break;
            case $record->payment_method == 3:
                return '<label class="label label-success" aria-hidden="true">Bank</label>';
                break;
            case $record->payment_method == 4:
                return '<label class="label label-success" aria-hidden="true">Applied Credit</label>';
                break;
            case $record->payment_method == NULL:
                return ' - ';
                break;
            default:
               return ' - ';
        }
    }

    public function showInvoiceType($record) {
        switch ($record) {
            case $record->invoice_type == 1:
                return 'Packet';
                break;
             case $record->invoice_type == 2:
                return 'Custom';
                break;
        }
    }

}