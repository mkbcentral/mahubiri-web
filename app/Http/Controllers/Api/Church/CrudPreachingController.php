<?php

namespace App\Http\Controllers\Api\Church;

use App\Http\Controllers\Controller;
use App\Models\Preaching;
use App\Repositories\CrudPreachingRepository;
use Illuminate\Http\Request;

class CrudPreachingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $inputs = $this->validateForm($request);
            if ($request->audio != null) {
                $inputs['preaching_url'] = $this->saveAudio($request->audio);
            }
            CrudPreachingRepository::create($inputs);
            return response()->json([
                'message' => 'Prédication bien créée',
                'status' => true
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage(),
                'status' => false
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $preaching = CrudPreachingRepository::show($id);
            return response()->json([
                'preaching' => $preaching,
                'status' => true
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage(),
                'status' => false
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Preaching $preaching)
    {
        try {
            $inputs = $this->validateForm($request);
            if ($request->audio != null) {
                $inputs['preaching_url'] = $this->saveAudio($request->audio);
            }
            CrudPreachingRepository::update($preaching, $inputs);
            return response()->json([
                'message' => 'Prédication bien modifée',
                'status' => true
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage(),
                'status' => false
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $status =  CrudPreachingRepository::delete($id);
            return response()->json([
                'message' => 'Prédication bien retirée',
                'status' => $status
            ], 200);
        } catch (\Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage(),
                'status' => false
            ], 200);
        }
    }

    private function validateForm(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string'],
            'preacher_name' => ['nullable', 'string'],
            'preaching_url' => ['required', 'numeric'],
        ]);
    }
}
