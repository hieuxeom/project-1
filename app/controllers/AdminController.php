<?php

class AdminController extends BaseController
{
    private $adminModel;
    private $userModel;
    private $productModel;
    private $commentModel;
    private $rateModel;
    private $cartModel;
    private $voucherModel;

    private array $analyticsArray = [];

    public function __construct()
    {
        if ($this->checkAdminPermission()) {
            $this->loadModel("AdminModel");
            $this->adminModel = new AdminModel();

            $this->loadModel("UserModel");
            $this->userModel = new UserModel();

            $this->loadModel("ProductModel");
            $this->productModel = new ProductModel();

            $this->loadModel("CommentModel");
            $this->commentModel = new CommentModel();

            $this->loadModel("RateModel");
            $this->rateModel = new RateModel();

            $this->loadModel("CartModel");
            $this->cartModel = new CartModel();

            $this->loadModel("VoucherModel");
            $this->voucherModel = new VoucherModel();

            $totalOrders =
            $this->analyticsArray = [
                "totalOrders" => $this->adminModel->getTotalOrders(),
                "totalUsers" => $this->adminModel->getTotalUsers(),
                "totalRevenue" => $this->adminModel->getTotalRevenue(),
            ];
        } else {
            return header("Location: " . BASEPATH . "/home");
        }
    }

    private function checkAdminPermission()
    {
        if ($_SESSION['role'] == "admin") {
            return true;
        }
        return false;
    }

    public function index()
    {
        return header("Location: " . BASEPATH . "/admin/users");
    }

    public function users()
    {
        $action = $_REQUEST['pr1'] ?? "default";
        $userId = $_REQUEST['userId'] ?? null;


        switch ($action) {
            case "edit":
                if (isset($userId)) {
                    $userInfo = $this->userModel->getUserInfo($userId);
                    return $this->view(viewPath: "users.index", params: [
                        "userInfo" => $userInfo ?? null,
                    ]);
                }
                return header("Location: " . BASEPATH . "/admin/users");

            case "delete":
                if (isset($userId)) {
                    $this->userModel->deleteUser($userId);
                };
                return header("Location: " . BASEPATH . "/admin/users");

            case "banned":
                if (isset($userId)) {
                    if ($_SERVER["REQUEST_METHOD"] == "GET") {
                        $isBanned = $this->userModel->isBanned($userId);
                        if ($isBanned == 0) {
                            return $this->view(viewPath: "admin.userBlock");
                        } else if ($isBanned == 1) {
                            $reasonBanned = $this->adminModel->getReasonBan($userId);
                            return $this->view(viewPath: "admin.userBlock", params: [
                                "reasonBanned" => $reasonBanned,
                            ]);
                        }
                    } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST["btn-unlock"])) {
                            $this->userModel->unBlockUser(userId: $userId);
                        } else if (isset($_POST["btn-lock"])) {
                            $this->userModel->blockUser(userId: $userId, reasonData: $_POST);
                        }
                    }
                };
                return header("Location: " . BASEPATH . "/admin/users");

            default:
                $listUsers = $this->userModel->getAllUser();

                return $this->view(viewPath: "admin.userViews", params: [
                    "listUsers" => $listUsers,
                    "analyticsArray" => $this->analyticsArray,
                ]);
        }
    }

    public function products()
    {
        $action = $_REQUEST['pr1'] ?? "default";
        $productId = $_REQUEST['productId'] ?? null;

        switch ($action) {
            case "edit":
                if (isset($productId)) {
                    $modifyData = $this->productModel->getProductDetails($productId);
                    $listCategories = $this->productModel->getListCategories();
                    return $this->view(viewPath: "admin.productModify", params: [
                        "listCategories" => $listCategories,
                        "modifyData" => $modifyData[0],
                    ]);
                }
                return header("Location: " . BASEPATH . "/admin/products");

            case "delete":
                if (isset($productId)) {
                    $this->productModel->deleteProduct($productId);
                };
                return header("Location: " . BASEPATH . "/admin/products");

            case "add":
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    $listCategories = $this->productModel->getListCategories();
                    return $this->view(viewPath: "admin.productAdd", params: [
                        "listCategories" => $listCategories,
                    ]);
                } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $this->productModel->addNewProduct(insertData: $_POST);
                }
                return header("Location: " . BASEPATH . "/admin/products");

            default:
                $listProducts = $this->productModel->getListProduct();
                return $this->view(viewPath: "admin.productViews", params: [
                    "listProducts" => $listProducts,
                    "analyticsArray" => $this->analyticsArray,
                ]);
        }
    }

    public function categories()
    {
        $action = $_REQUEST['pr1'] ?? "default";
        $categoryId = $_REQUEST['categoryId'] ?? null;


        switch ($action) {
            case "edit":
                if (isset($categoryId)) {
                    $modifyData = $this->productModel->getCategoryInfo($categoryId);
                    $listCategories = $this->productModel->getListCategories();
                    return $this->view(viewPath: "admin.categoryModify", params: [
                        "listCategories" => $listCategories,
                        "modifyData" => $modifyData,
                    ]);
                }
                return header("Location: " . BASEPATH . "/admin/users");

            case "delete":
                if (isset($categoryId)) {
                    $this->productModel->deleteCategory($categoryId);
                };
                return header("Location: " . BASEPATH . "/admin/categories");

            case "add":
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    return $this->view(viewPath: "admin.categoryAdd");
                } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $this->productModel->addNewCategory(insertData: $_POST);
                }
                return header("Location: " . BASEPATH . "/admin/categories");

            default:
                $listCategories = $this->productModel->getListCategories();
                return $this->view(viewPath: "admin.categoryViews", params: [
                    "listCategories" => $listCategories,
                    "analyticsArray" => $this->analyticsArray,
                ]);
        }
    }

    public function comments()
    {
        $action = $_REQUEST['pr1'] ?? "default";
        $commentId = $_REQUEST['commentId'] ?? null;
        $backLink = $_REQUEST["back"] ?? "admin";

        switch ($action) {
            case "delete":
                if (isset($commentId)) {
                    $this->commentModel->deleteComment($commentId);
                };

                if ($backLink == "admin") {
                    return header("Location: " . BASEPATH . "/admin/comments");
                } else {
                    return header("Location: " . BASEPATH . "/user/commentHistory");
                }

            default:
                $listComments = $this->adminModel->mergeArray(originalArray: $this->commentModel->getAllComment(), byKey: "comment_id");
                return $this->view(viewPath: "admin.commentViews", params: [
                    "listComments" => $listComments,
                    "analyticsArray" => $this->analyticsArray,
                ]);
        }
    }

    public function rates()
    {
        $action = $_REQUEST['pr1'] ?? "default";
        $rateId = $_REQUEST['rateId'] ?? null;


        switch ($action) {
            case "delete":
                if (isset($rateId)) {
                    $this->rateModel->deleteRate($rateId);
                };
                return header("Location: " . BASEPATH . "/admin/rates");

            default:
                $listRates = $this->adminModel->mergeArray(originalArray: $this->rateModel->getAllRate(), byKey: "rate_id");
                return $this->view(viewPath: "admin.rateViews", params: [
                    "listRates" => $listRates,
                    "analyticsArray" => $this->analyticsArray,
                ]);
        }
    }

    public function carts()
    {
        $action = $_REQUEST['pr1'] ?? "default";
//        $rateId = $_REQUEST['rateId'] ?? null;


        switch ($action) {
            case "delete":
                if (isset($rateId)) {
                    $this->rateModel->deleteRate($rateId);
                };
                return header("Location: " . BASEPATH . "/admin/rates");

            default:
                $listCarts = $this->cartModel->getAllCarts();
                return $this->view(viewPath: "admin.cartViews", params: [
                    "listCarts" => $listCarts,
                    "analyticsArray" => $this->analyticsArray,
                ]);
        }
    }

    public function vouchers()
    {
        $action = $_REQUEST['pr1'] ?? "default";
        $voucherId = $_REQUEST['voucherId'] ?? null;

        switch ($action) {
            case "delete":
                if (isset($rateId)) {
                    $this->rateModel->deleteRate($rateId);
                };
                return header("Location: " . BASEPATH . "/admin/rates");
            case "add":
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                    return $this->view(viewPath: "admin.voucherAdd");
                } else if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $this->voucherModel->createNewVoucher($_POST);
                }
                return header("Location: " . BASEPATH . "/admin/vouchers");

            case "edit":
                if (isset($voucherId)) {
                    $voucherData = $this->voucherModel->getVoucherInfo($voucherId);

                    return $this->view(viewPath: "admin.voucherModify", params: [
                        "voucherData" => $voucherData,
                    ]);
                }

                return header("Location: " . BASEPATH . "/admin/vouchers");

            default:
                $listVouchers = $this->voucherModel->getAllVoucher();

                return $this->view(viewPath: "admin.voucherViews", params: [
                    "listVouchers" => $listVouchers,
                    "analyticsArray" => $this->analyticsArray,
                ]);
        }
    }

    public function stocks()
    {
        $action = $_REQUEST['pr1'] ?? "default";
        $productId = $_REQUEST['productId'] ?? null;

        switch ($action) {
            case "delete":
                return __METHOD__;
            case "add":
                return __METHOD__;
            case "edit":
                $modifyData = $this->productModel->getProductStock($productId);
                return $this->view(viewPath: "admin.stockModify", params: [
                    "modifyData" => $modifyData
                ]);
            default:
                $listProducts = $this->productModel->getListProductStock();

                return $this->view(viewPath: "admin.stockViews", params: [
                    "listProducts" => $listProducts,
                    "analyticsArray" => $this->analyticsArray,
                ]);
        }
    }


    public function update()
    {
        $method = $_SERVER["REQUEST_METHOD"];
        $for = $_REQUEST["for"];
        $id = $_REQUEST["id"];

        switch ($method) {
            case "POST":
                switch ($for) {
                    case "users":
                        $this->userModel->updateUserInfo(modifyData: $_POST, userId: $id);
                        return header("Location: " . BASEPATH . "/admin/users");
                    case "products":
                        $this->productModel->updateProductInfo(modifyData: $_POST, productId: $id);
                        return header("Location: " . BASEPATH . "/admin/products");
                    case "categories":
                        $this->productModel->updateCategoryInfo(modifyData: $_POST, categoryId: $id);
                        return header("Location: " . BASEPATH . "/admin/categories");
                    case "vouchers":
                        $this->voucherModel->updateVouchersInfo(modifyData: $_POST, voucherId: $id);
                        return header("Location: " . BASEPATH . "/admin/vouchers");
                    case "stocks":
                        $this->productModel->updateProductStock(modifyData: $_POST, productId: $id);
                        return header("Location: " . BASEPATH . "/admin/stocks");
                }
            case "GET":
                break;
            default:
                break;

        }
    }


    public function test()
    {
        $productRate = $this->rateModel->getRateScore(1);
        print_r($productRate);

    }
}