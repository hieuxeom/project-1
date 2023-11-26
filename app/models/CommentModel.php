<?php

class CommentModel extends BaseModel
{
    const PROD_TABLE = "products";
    const PRODUCT_COMMENTS_TABLE = "product_comments";
    const USER_TABLE = "users";

    public function createComment($productId, $userId, $commentData)
    {
        return $this->insert(table: self::PRODUCT_COMMENTS_TABLE, data: [
            "prod_id" => $productId,
            "user_id" => $userId,
            "comment_text" => $commentData['comment_text'],
        ]);
    }

    public function getAllComment()
    {
        $a1 = $this->getTwoTable(table1: self::PRODUCT_COMMENTS_TABLE, table2: self::PROD_TABLE, joinColumn: "prod_id", table1Select: [
            "comment_id",
            "comment_text",
            "comment_time",
        ], table2Select: [
            "prod_id",
            "prod_name"
        ]);

        $a2 = $this->getTwoTable(table1: self::PRODUCT_COMMENTS_TABLE, table2: self::USER_TABLE, joinColumn: "user_id", table1Select: [
            "comment_id",
        ], table2Select: [
            "username"
        ]);

        return array_merge($a1, $a2);
    }

    public function deleteComment($commentId) {
        return $this->delete(table: self::PRODUCT_COMMENTS_TABLE, conditions: [
            "comment_id" => $commentId,
        ]);
    }

}