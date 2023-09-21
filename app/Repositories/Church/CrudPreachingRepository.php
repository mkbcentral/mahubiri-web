<?php 

namespace App\Repositories;

use App\Models\Preaching;

class CrudPreachingRepository{
    public static function create(array $inputs):Preaching{
        return Preaching::create($inputs);
    }
    public static function show(string $id):Preaching{
        return Preaching::find($id);
    }
    public static function update(Preaching $preaching,array $inputs):Preaching{
         $preaching->update($inputs);
         return $preaching;
    }
    public static function delete(Preaching $preaching):bool{
        if ($preaching->delete()) {
           return true;
        }
    }
}