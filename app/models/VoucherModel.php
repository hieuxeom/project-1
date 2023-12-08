<?php

class VoucherModel extends BaseModel
{
    const VOUCHERS_TABLE = "vouchers";
    const CARTS_TABLE = "carts";

    public function createNewVoucher($voucherData)
    {
        return $this->insert(table: self::VOUCHERS_TABLE, data: [
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

    public function getAllVoucher()
    {
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

    public function getVoucherByCartId($cartId)
    {
        return $this->getOne(table: self::CARTS_TABLE, conditions: [
            "cart_id" => $cartId,
        ])["voucher_id"];
    }

    public function getVoucherInfo($voucherId)
    {
        return $this->getOne(table: self::VOUCHERS_TABLE, conditions: [
            "voucher_id" => $voucherId,
        ]);
    }

    public function decreaseRemainingUseVoucher($voucherId)
    {
        if ($this->canUseVoucher($voucherId)) {
            return $this->update(table: self::VOUCHERS_TABLE, data: [
                "remaining_uses" => $this->getRemainingUses($voucherId) - 1,
            ], conditions: [
                "voucher_id" => $voucherId,
            ]);
        }

    }

    public function getRemainingUses($voucherId)
    {
        $vc = $this->getOne(table: self::VOUCHERS_TABLE, conditions: [
            "voucher_id" => $voucherId,
        ])["remaining_uses"];
        return $this->getOne(table: self::VOUCHERS_TABLE, conditions: [
            "voucher_id" => $voucherId,
        ])["remaining_uses"];

    }

    public function canUseVoucher($voucherId)
    {
        if ($voucherId == "") {
            return true;
        }
        if ($this->checkExistVoucher($voucherId)) {
            if ($this->getRemainingUses($voucherId) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function checkExistVoucher($voucherId)
    {
        $check = $this->getOne(table: self::VOUCHERS_TABLE, conditions: [
            "voucher_id" => $voucherId,
        ]);

        if (sizeof($check) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function removeUsingVoucher($voucherId)
    {
        return $this->update(table: self::CARTS_TABLE, data: [
            "voucher_id" => null,
        ], conditions: [
            "voucher_id" => $voucherId,
            "status" => "active",
        ]);

    }
}