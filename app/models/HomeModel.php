<?php

class HomeModel extends BaseModel
{
    const TABLE = "users";

    public function getAllUser()
    {
        return $this->getAll(table: self::TABLE, arraySelect: ["birthday", "score"]);
    }


    public function getOneUser($userId)
    {
        return $this->getOne(table: self::TABLE, conditions: [
            "user_id" => $userId,
        ]);
    }

    public function addNewUser($fullName, $birthDay, $score)
    {
        return $this->insert(table: self::TABLE, data: [
            "fullname" => $fullName,
            "birthday" => $birthDay,
            "score" => $score
        ]);
    }

    public function updateUser($userId, $dataUpdate)
    {
        return $this->update(table: self::TABLE,conditions: [
            "user_id" => $userId,
        ],data: $dataUpdate);
    }

    public function deleteUser($userId) {
        return $this->delete(table: self::TABLE,conditions: [
            "user_id" => $userId,
        ]);
    }


}