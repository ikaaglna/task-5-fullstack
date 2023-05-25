<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Articles::paginate();
        return response([
            'success' => true,
            'message' => 'All Article',
            'datas' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title'     => 'required',
                'content'   => 'required',
                'image'   => 'required',
                'category_id'   => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            } else {

                $data = Articles::create([
                    'title'     => $request->input('title'),
                    'content'   => $request->input('content'),
                    'image'   => $request->input('image'),
                    'user_id'   => $request->user()->id,
                    'category_id'   => $request->input('category_id')
                ]);


                if ($data) {
                    return response()->json([
                        'success' => true,
                        'message' => 'new article created',
                    ], 200);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'new articles are not created',
                    ], 401);
                }
            }
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = Articles::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'articles detail',
                'datas' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No result'
            ], 401);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $data = Articles::findOrFail($id);
            $validator = Validator::make($request->all(), [
                'title'     => 'required',
                'content'   => 'required',
                'image'   => 'required',
                'category_id'   => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            } else {
                $data->update([
                    'title'     => $request->input('title'),
                    'content'   => $request->input('content'),
                    'image'   => $request->input('image'),
                    'category_id'   => $request->input('category_id')
                ]);

                if ($data) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Article updated successfully',
                    ], 200);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Article are not successfully updated',
                    ], 401);
                }
            }
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Articles::findOrFail($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'Article deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Article failed to delete'
            ], 401);
        }
    }
}
