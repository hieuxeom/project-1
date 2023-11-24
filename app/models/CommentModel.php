<?php

class CommentModel extends BaseModel
{
    const PROD_TABLE = "products";
    const PROD_CMT = "product_comments";

    public function createComment($productId, $userId, $commentData) {
        $commentStatus = $this->insert(table: self::PROD_CMT,data: [
            "prod_id" => $productId,
            "user_id" => $userId,
            "comment_text" => $commentData['comment_text'],
        ]);
    }
}