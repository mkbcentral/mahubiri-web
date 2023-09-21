<?php 

namespace App\Repositories\Church;

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
    public static function delete(string $id):bool{
        $preaching=Preaching::find($id);
        if ($preaching->delete()) {
           return true;
        }
    }
}