<?php

namespace App\Http\Controllers\Api\Church;

use App\Http\Controllers\Controller;
use App\Models\Church;
use App\Repositories\CrudChurchRepository;
use Illuminate\Http\Request;

class CrudChurchController extends Controller
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
            //Check if image input is not empty and create url for this one
            if ($request->image != null) {
                $inputs['logo_url']=$this->savaImage($request->image);
            }
            CrudChurchRepository::create($inputs);
            return response()->json([
                'message' => 'Eglise bien créée',
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
            $church = CrudChurchRepository::show($id);
            return response()->json([
                'church' => $church,
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
    public function update(Request $request, Church $church)
    {
        try {
            $inputs = $this->validateForm($request);
            //Check if image input is not empty and create url for this one
            if ($request->image != null) {
                $inputs['logo_url']=$this->savaImage($request->image);
            }
            CrudChurchRepository::update($church, $inputs);
            return response()->json([
                'message' => 'Eglise bien modifée',
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
        $status = false;
        try {
            $church = CrudChurchRepository::show($id);
            if ($church->preachings->isEmpty()) {
                $status =  CrudChurchRepository::delete($church);
                return response()->json([
                    'message' => 'Eglise bien retirée',
                    'status' => $status
                ], 200);
            } else {
                return response()->json([
                    'message' => "Attention, cette eglise contient données en utilisation",
                    'status' => $status
                ], 200);
            }
        } catch (\Exception $ex) {
            return response()->json([
                'error' => $ex->getMessage(),
                'status' => false
            ], 200);
        }
    }

    private function validateForm(Request $request):array{
        return $request->validate([
            'name' => ['required', 'string'],
            'abreviation' => ['nullable', 'string'],
            'email' => ['nullable', 'string', 'unique:churches,email'],
            'phone' => ['nullable', 'string', 'unique:churches,phone'],

        ]);
    }
}
