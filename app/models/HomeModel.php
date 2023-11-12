<?php

class HomeModel extends BaseModel
{
    const TABLE = "users";

    public function getAllUser()
    {
        return $this->getAll(table: self::TABLE);
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
            "score" => $score,
        ]);
    }

    public function getUserById($id)
    {
        print_r($this->getOne(table: self::TABLE, conditions: [
            "user_id" => $id,
        ]));
    }

    public function updateUser()
    {
        $id = 3;
        $dataUpdate = [
            "fullname" => "Vu Quoc Hao",
            "score" => 10,
        ];

        $this->update(table: self::TABLE, data: $dataUpdate, conditions: [
            "user_id" => $id,
        ]);
    }

    public function deleteUser($id)
    {
        $this->delete(table: self::TABLE, conditions: [
            "user_id" => $id
        ]);
    }


}