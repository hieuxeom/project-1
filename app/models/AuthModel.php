<?php

class AuthModel extends BaseModel
{
    const USER_TABLE = "users";

    public function createAccount($accountData)
    {
        try {
            // Email check
            $email = $accountData["email"];
            if ($this->isEmpty($email)) {
                return 0;
            }

            // Username check
            $username = $accountData["username"];
            if ($this->isEmpty($username)) {
                return 0;
            }

            // Fullname check
            $fullname = $accountData["fullname"];
            if ($this->isEmpty($fullname)) {
                return 0;
            }

            // Password check
            $prePassword = $accountData["password"];
            if ($this->isEmpty($prePassword)) {
                return false;
            }

            $password = $this->createHashPassword($prePassword);



            if ($this->isExistEmail($email)) {
                return 2;
            }

            if ($this->isExistUsername($username)) {
                return 3;
            }

            $this->insert(table: self::USER_TABLE, data: [
                "email" => $email,
                "username" => $username,
                "fullname" => $fullname,
                "password" => $password,
            ]);
            return 1;
        } catch (Exception $e) {
            return 0;
        }


    }

    public function checkLogin($accountData)
    {
        $username = $accountData["username"];
        $password = $accountData["password"];
        $accountId = null;

        $accountId = $this->getOne(table: self::USER_TABLE, conditions: [
            "username" => $username,
        ], arraySelect: ["user_id"])["user_id"] ?? null;

        if ($accountId == null) {
            $accountId = $this->getOne(table: self::USER_TABLE, conditions: [
                "email" => $username,
            ], arraySelect: ["user_id"])["user_id"] ?? null;
        }

        if ($accountId == null) {
            return 2;
        }

        if ($this->verifyPassword($password, $accountId)) {
            $this->createSessionData($accountId);
            return 1;
        } else {
            return 0;
        }
    }

    private function createSessionData($userId)
    {
        $_SESSION['is_login'] = true;
        $_SESSION['user_id'] = $userId;
        $_SESSION['role'] = $this->getOne(self::USER_TABLE, conditions: [
            "user_id" => $userId,
        ], arraySelect: [
            "role"
        ])["role"];
    }

    public function removeSessionData()
    {
        $_SESSION['is_login'] = false;
        unset($_SESSION['user_id']);
        unset($_SESSION['role']);
    }

    private function isExistEmail($email)
    {
        $rsQuery = $this->getOne(table: self::USER_TABLE, conditions: [
            "email" => $email,
        ]);
        if (sizeof($rsQuery) > 0) {
            return true;
        } else {
            return false;
        }
    }

    private function isExistUsername($username)
    {
        $rsQuery = $this->getOne(table: self::USER_TABLE, conditions: [
            "username" => $username,
        ]);
        if (sizeof($rsQuery) > 0) {
            return true;
        } else {
            return false;
        }
    }

    private function verifyPassword($password, $accountId)
    {
        $hash_pwd = $this->getOne(table: self::USER_TABLE, conditions: [
            'user_id' => $accountId,
        ], arraySelect: ["password"])["password"];

        return password_verify($password, $hash_pwd);
    }

    private function createHashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    private function isEmpty($dataCheck)
    {
        if ($dataCheck == "") {
            return true;
        } else {
            return false;
        }
    }
}