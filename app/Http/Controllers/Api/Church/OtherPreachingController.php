<?php

namespace App\Http\Controllers\Api\Church;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavoritePreachingResource;
use App\Models\FavoritePreaching;
use App\Repositories\Church\OtherPreachingRepository;
use Illuminate\Http\Request;

class OtherPreachingController extends Controller
{

    public function getListPreachingByChurchId()
    {
        return OtherPreachingRepository::getListPreachingByChurchId(request('church_id'));
    }
    public function gettFavoritePreachingByUserId()
    {
        $favorites= OtherPreachingRepository::getFavoritePreachingByUserId();
        return FavoritePreachingResource::collection($favorites);
    }

    public function addPreachingToFavorite(Request $request)
    {
        try {
            $favoriChecher=OtherPreachingRepository::checkIfPreachingExistInFavorite($request->preaching_id);
            if($favoriChecher==null){
                $favorite = OtherPreachingRepository::addToFavoriteList($request->preaching_id);
                if ($favorite) {
                    return response()->json([
                        'message' => 'Prédication ajoutée au favories',
                        'status' => true
                    ]);
                } else {
                    return response()->json([
                        'message' => "Chech de l'opeation",
                        'status' => false
                    ]);
                }
            }else{
                return response()->json([
                    'message' => "Existe déjà",
                    'status' => false
                ]);
            }
                        
        } catch (\Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage(),
                'status' => false
            ]);
        }
    }

    public function deletePreachingToFavorite(){
        $status=OtherPreachingRepository::deletePreachingToListFavorite(request('preaching_id'));
        if ($status) {
            return response()->json([
                'message' => 'Prédication retirée au favories',
                'status' => $status
            ]);
        } else {
            return response()->json([
                'message' => "Echec de l'opératoin",
                'status' => $status
            ]);
        }
    }
}
