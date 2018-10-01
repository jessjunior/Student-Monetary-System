<?php

class DepositObserver {
    public function creating($model) {
        // I would prefer to change from static to public method.
        $deposit->reference_no = $this->generateReferenceNo(Config::get('referenceNo.depositPrefix'));
        
        DB::table('deposit_status')->where('name', '=', 'Pending')->increment('record_count');
    }
}