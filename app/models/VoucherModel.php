<?php

class VoucherModel extends BaseModel
{
    const VOUCHERS_TABLE = "vouchers";

    public function createNewVoucher($voucherData) {
        return $this->insert(table: self::VOUCHERS_TABLE,data: [
            "voucher_id" => $voucherData["voucher_id"],
            "voucher_discount" => $voucherData["voucher_discount"],
            "voucher_desc" => $voucherData["voucher_desc"],
            "valid_from" => $voucherData["valid_from"],
            "valid_to" => $voucherData["valid_to"],
            "max_uses" => $voucherData["max_uses"],
            "remaining_uses" => $voucherData["max_uses"],
            "type" => $voucherData["type"],
        ]);
    }

    public function getAllVoucher() {
        return $this->getAll(table: self::VOUCHERS_TABLE);
    }

    public function updateVouchersInfo($modifyData, $voucherId)
    {
        return $this->update(table: self::VOUCHERS_TABLE, data: [
            "voucher_discount" => $modifyData["voucher_discount"],
            "voucher_desc" => $modifyData["voucher_desc"],
            "valid_to" => $modifyData["valid_to"],
            "max_uses" => $modifyData["max_uses"],
        ], conditions: [
            "voucher_id" => $voucherId,
        ]);
    }

    public function getVoucherInfo($voucherId) {
        return $this->getOne(table: self::VOUCHERS_TABLE,conditions: [
            "voucher_id" => $voucherId,
        ]);
    }
}