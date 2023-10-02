<?php

namespace App\Repositories\Church;

use App\Http\Resources\PreachingResource;
use App\Models\Church;
use App\Models\FavoritePreaching;
use App\Models\Preaching;
use App\Models\User;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Collection;

class OtherPreachingRepository
{

    /**
     * Get lis preachings by church id
     */
    public static function getListPreachingByChurchId($churchId): AnonymousResourceCollection
    {
        $preachings = Preaching::where('title', 'like', '%' . request('q') . '%')
            ->where('church_id',$churchId)
            ->orderBy('created_at', 'DESC')
            ->paginate(request('per_page'));
        return PreachingResource::collection($preachings);
    }
    /**
     * Get List favorite preachings
     */
    public static function getFavoritePreachingByUserId():Collection
    {
        $user=User::find(1);
        return $user->favoritePreachings;
    }
    /**
     * Add new preaching to list favorite preachings
     */
    public static function addToFavoriteList(string $preachingId):FavoritePreaching
    {
        return FavoritePreaching::create(
            [
                'user_id' => 1,
                'preaching_id' =>$preachingId
            ]
        );
    }
    /**
     * Delete preching to favorite list
     */
    public static function  deletePreachingToListFavorite(string $preachingId):bool{
        $favoritePreachin=   FavoritePreaching::where('preaching_id',$preachingId)->first();
        if($favoritePreachin->delete()){
            return true;
        }else{
            return false;
        }
    }

    public static function checkIfPreachingExistInFavorite(string $preachingId):?FavoritePreaching
    {
      return  FavoritePreaching::where('preaching_id', $preachingId)
                    ->where('user_id',1)
                    ->first();
    }
}
