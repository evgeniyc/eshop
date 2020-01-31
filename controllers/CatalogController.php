<?php 
namespace app\controllers; 
 
use app\models\Category; 
use app\models\Brand; 
use app\models\Product; 
use Yii; 
 
class CatalogController extends Controller { 
    /** 
     * Главная страница каталога товаров 
     */ 
    public function actionIndex() { 
        // получаем корневые категории 
        $root = Category::find()->where(['parent_id' => 0])->all(); 
        // получаем популярные бренды 
        $brands = (new Brand())->getPopularBrands(); 
        return $this->render('index', compact('root', 'brands')); 
    } 
 
    /** 
     * Категория каталога товаров 
     */ 
    public function actionCategory($id) { 
        $id = (int)$id; 
        $temp = new Category(); 
        // товары категории 
        list($products, $pages) = $temp->getCategoryProducts($id); 
        // данные о категории 
        $category = $temp->getCategory($id); 
        // устанавливаем мета-теги для страницы 
        $this->setMetaTags( 
            $category->name . ' | ' . Yii::$app->params['shopName'], 
            $category->keywords, 
            $category->description 
        ); 
        return $this->render( 
            'category', 
            compact('category', 'products', 'pages') 
15 
 
        ); 
    } 
 
    /** 
     * Список всех брендов каталога товаров 
     */ 
    public function actionBrands() { 
        $brands = (new Brand())->getAllBrands(); 
        return $this->render( 
            'brands', 
            compact('brands') 
        ); 
    } 
 
    /** 
     * Список товаров бренда с идентификатором $id 
     */ 
    public function actionBrand($id) { 
        $id = (int)$id; 
        $brand = (new Brand())->getBrand($id); 
        return $this->render( 
            'brand', 
            compact('brand') 
        ); 
    } 
}