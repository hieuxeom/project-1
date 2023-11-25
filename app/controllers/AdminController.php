<?php

class AdminController extends BaseController
{
    private $adminModel;
    private $userModel;
    private $productModel;

    public function __construct()
    {
        $this->loadModel("AdminModel");
        $this->adminModel = new AdminModel();
        $this->loadModel("UserModel");
        $this->userModel = new UserModel();
        $this->loadModel("ProductModel");
        $this->productModel = new ProductModel();
    }

    public function index()
    {
//        return $this->view(viewPath: "admin.index");
        return header("Location: " . BASEPATH . "/admin/users");
    }

    public function users()
    {
        $action = $_REQUEST['pr1'] ?? "default";
        $userId = $_REQUEST['userId'] ?? null;


        switch ($action) {
            case "edit":
                if (isset($userId)) {
                    $modifyData = $this->userModel->getUserInfo($userId);
                    return $this->view(viewPath: "admin.userModify", params: [
                        "modifyData" => $modifyData,
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
                    $this->userModel->deleteUser($userId);
                };
                return header("Location: " . BASEPATH . "/admin/users");

            default:
                $listUsers = $this->userModel->getAllUser();
                return $this->view(viewPath: "admin.userViews", params: [
                    "listUsers" => $listUsers,
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
                    $this->productModel->deleteUser($productId);
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
                    $this->productModel->deleteUser($categoryId);
                };
                return header("Location: " . BASEPATH . "/admin/users");

            case "banned":
                if (isset($categoryId)) {
                    $this->productModel->deleteUser($categoryId);
                };
                return header("Location: " . BASEPATH . "/admin/users");

            default:
                $listCategories = $this->productModel->getListCategories();
                return $this->view(viewPath: "admin.categoryViews", params: [
                    "listCategories" => $listCategories,
                ]);
        }
    }

    public function update()
    {
        // path = admin/update?for=?&id=?
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
                }
            case "GET":

                break;
            default:
                break;

        }
    }

    public function delete()
    {
        $for = $_REQUEST["for"];
        $id = $_REQUEST["id"];


        switch ($for) {
            case "users":
                $this->userModel->updateUserInfo(modifyData: $_POST, userId: $id);
                return header("Location: " . BASEPATH . "/admin/users");
            case "products":
                $this->productModel->deleteProduct(productId: $id);
                return header("Location: " . BASEPATH . "/admin/products");
        }
    }

    public function test()
    {
        print_r($_REQUEST);
    }
}