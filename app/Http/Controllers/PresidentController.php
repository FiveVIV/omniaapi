<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePresidentRequest;
use App\Http\Requests\UpdatePresidentRequest;
use App\Http\Resources\PresidentResource;
use App\Models\President;
use Illuminate\Http\JsonResponse;

class PresidentController extends Controller
{

    /**
     * Show all objects
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $presidents = President::with('facts')->get();
        return response()->json(PresidentResource::collection($presidents));
    }


    /**
     * Store new object
     *
     * @param StorePresidentRequest $request
     * @return JsonResponse
     */
    public function store(StorePresidentRequest $request): JsonResponse
    {
        $president = President::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'President created successfully',
            'data' => new PresidentResource($president),
        ], 201);
    }

    /**
     * Return object by id
     *
     * @param President $president
     * @return JsonResponse
     */
    public function show(President $president): JsonResponse
    {
        $president->load('facts');
        return response()->json($president);
    }

    /**
     * Update the specified object in storage.
     *
     * @param UpdatePresidentRequest $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(UpdatePresidentRequest $request, string $id): JsonResponse
    {
        $president = President::findOrFail($id);

        $president->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'President updated successfully',
            'data' => new PresidentResource($president),
        ], 200);
    }


    /**
     * Destroy object by id
     *
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $president = President::findOrFail($id);

            $president->delete();

            return response()->json([
                'success' => true,
                'message' => 'President deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'President not found',
            ], 404);
        }
    }


}
