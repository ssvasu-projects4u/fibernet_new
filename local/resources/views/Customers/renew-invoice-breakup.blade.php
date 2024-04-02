<div>
    <div class="card mb-4">
        <div class="card-header py-2">
            <div class="float-left">Invoice Breakup</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                    <tbody>
                        <tr>
                            <td><span>Package Price (+)</span></td>
                            <td><span id="invoice-package-price">{{ $package_amount }}</span></td>
                        </tr>

                        <tr class="additional-charges-class">
                            <td><span>Additional charge(+)</span></td>
                            <td><span id="invoice-additional-price">{{ $additional_charge }}</span></td>
                        </tr>

                        {{--  <tr>
                            <td><span>CGST ( <span id="invoice-cgst"></span> %) (+)</span></td>
                            <td><span id="invoice-cgst-amount">{{ $cgstAmount }}</span></td>
                        </tr>

                        <tr>
                            <td><span>SGST ( <span id="invoice-sgst"></span> %) (+)</span></td>
                            <td><span id="invoice-sgst-amount">{{ $sgstAmount }}</span></td>
                        </tr>  --}}

                        <tr class="discount-class">
                            <td><span>Discount(-)</span></td>
                            <td><span id="invoice-discount-price">{{ $discount }}</span></td>
                        </tr>

                        <tr>
                            <td><span>Invoice Amount(=)</span></td>
                            <td><span id="invoice-amount">{{ $invoiceAmount }}</span></td>
                        </tr>

                        <tr>
                            <td><span>Final Payable (=)</span></td>
                            <td><span id="invoice-final-payable">{{ $final_payable }}</span></td>
                        </tr>
                    </tbody>
                </table>                
                </div>
            </div>
        </div>
    </div>
</div>
<div>
<div class="card mb-4">
    <div class="card-header py-2">
        <div class="float-left">Last Invoice Information</div>
    </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <table class="table mbn tc-med-1 tc-bold-last tc-fs13-last">
                        <tbody>
                            <tr>
                                <td><span>Invoice No</span></td>
                                <td>{{ $invoice != null ? $invoice->invoice_number : "" }}</td>
                            </tr>
                            <tr>
                                <td><span>Invoice Status</span></td>
                                <td> {{ $invoice != null ?  $invoice->paid == 0 ? 'Unpaid': 'Paid' : "" }}</td>
                            </tr>
                            <tr>
                                <td><span>Renew Date</span></td>
                                <td>{{ $invoice != null ? $invoice->renew_date : "" }} </td>
                            </tr>
                            <tr>
                                <td><span>Invoice From Date</span></td>
                                <td>{{ $invoice != null ? $invoice->from_date : ""}}</td>
                            </tr>
                            <tr>
                                <td><span>Invoice End Date</span></td>
                                <td>{{ $invoice != null ? $invoice->end_date : ""}}</td>
                            </tr>
                            <tr>
                                <td><span>Invoice Amount</span></td>
                                <td>{{ $invoice != null ? $invoice->total_amount : "" }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>