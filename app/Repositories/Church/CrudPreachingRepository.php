<?php

namespace App\Repositories\Church;

use App\Http\Resources\PreachingResource;
use App\Models\Preaching;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CrudPreachingRepository
{
    public static function getListPreaching(): AnonymousResourceCollection
    {
        $preachings = Preaching::where('title', 'like', '%' . request('q') . '%')
            ->orderBy('created_at', 'ASC')->paginate(request('per_page'));
        return PreachingResource::collection($preachings);
    }
    public static function create(array $inputs): Preaching
    {
        return Preaching::create($inputs);
    }
    public static function show(string $id): Preaching
    {
        return Preaching::find($id);
    }
    public static function update(Preaching $preaching, array $inputs): Preaching
    {
        $preaching->update($inputs);
        return $preaching;
    }
    public static function delete(string $id): bool
    {
        $preaching = Preaching::find($id);
        if ($preaching->delete()) {
            return true;
        }
    }
}
