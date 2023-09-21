<?php 

namespace App\Repositories;

use App\Models\Church;

class CrudChurchRepository{
    public static function create(array $inputs):Church{
        return Church::create($inputs);
    }
    public static function show(string $id):Church{
        return Church::find($id);
    }
    public static function update(Church $church,array $inputs):Church{
         $church->update($inputs);
         return $church;
    }
    public static function delete(Church $church):bool{
        if ($church->delete()) {
           return true;
        }
    }
}