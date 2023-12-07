<?php 

namespace Api;

class Data {
    static public function getProducts(){
        $data = file(__DIR__.'/../data/product.txt');
        foreach($data as $index => $value){
                $products[$index] = explode("::", $value);
        }

        return $products;
    }

    static public function addProduct($company, $product_nmae, $price, $quant){
        if($company != '' && $product_nmae != '' && $price != '' && $quant != ''){
            $new_product = $company."::".$product_nmae."::".$price."::".$quant."\n";
            file_put_contents(__DIR__.'/../data/product.txt', $new_product, FILE_APPEND);
        }else {
            return "<script>alert('Заполните все поля!');</script>";
        }

    }

    static public function delProduct($id_product){
        $data = file(__DIR__.'/../data/product.txt');
        foreach($data as $index => $value){
            if($index != $id_product){
                $upd_file .= $data[$index];
            }
        }
        file_put_contents(__DIR__.'/../data/product.txt', $upd_file);
    }

}
