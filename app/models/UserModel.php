<?php

class UserModel extends BaseModel
{
    const USER_TABLE = "users";
    const VIOLATE_TABLE = "violates";

    public function getAllUser()
    {
        return $this->getAll(self::USER_TABLE);
    }

    public function getUserInfo($userId)
    {
        return $this->getOne(table: self::USER_TABLE, conditions: [
            "user_id" => $userId,
        ]);
    }

    public function updateUserInfo($modifyData, $userId)
    {
        return $this->update(table: self::USER_TABLE, data: [
            "email" => $modifyData["email"],
            "fullname" => $modifyData["fullname"],
            "username" => $modifyData["username"],
            "address" => $modifyData["address"],
            "role" => $modifyData["role"],
        ], conditions: [
            "user_id" => $userId,
        ]);
    }

    public function deleteUser($userId)
    {
        return $this->update(table: self::USER_TABLE, data: [
            "is_active" => "delete",
        ],
            conditions: [
                "user_id" => $userId
            ]);
    }

    public function blockUser($userId, $reasonData)
    {

        $this->update(table: self::USER_TABLE, data: [
            "is_active" => "disable",
        ],
            conditions: [
                "user_id" => $userId
            ]);

        $this->delete(table: self::VIOLATE_TABLE, conditions: [
            "user_id" => $userId,
        ]);

        return $this->insert(table: self::VIOLATE_TABLE, data: [
            "user_id" => $userId,
            "violate_reason" => $reasonData["reason"],
        ]);
    }

    public function updateUserAddress($userId, $newAddress)
    {
        return $this->update(table: self::USER_TABLE, data: [
            "address" => $newAddress
        ], conditions: [
            "user_id" => $userId,
        ]);
    }

    public function isBanned($userId)
    {
        $status = $this->getOne(table: self::USER_TABLE, conditions: [
            "user_id" => $userId,
        ])["is_active"];

        if ($status == "active") {
            return 0;
        } else if ($status == "disable") {
            return 1;
        } else {
            return 2;
        }
    }

    public function unBlockUser(mixed $userId)
    {
        $this->delete(table: self::VIOLATE_TABLE, conditions: [
            "user_id" => $userId,
        ]);

        $this->update(table: self::USER_TABLE, data: [
            "is_active" => "active",
        ],
            conditions: [
                "user_id" => $userId
            ]);

    }
}