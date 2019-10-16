<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('comentarios')->get();
        $data = $posts->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Posts recebidos successfully.'
        ];

        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $input = $request->all();        
        $validator = Validator::make($input, [
            'titulo' => 'required',
            'conteudo' => 'required',            
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $post = Post::create($input);
        $data = $post->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Post armazenado com sucesso.'
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $data = $post->toArray();

        if (is_null($post)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Post not found.'
            ];
            return response()->json($response, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'titulo' => 'required',
            'conteudo' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Erro Validação.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $post = Post::find($id);

        if (is_null($post)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Post not found.'
            ];
            return response()->json($response, 404);
        }
        
        $post->titulo = $input['titulo'];
        $post->conteudo = $input['conteudo'];
        $post->save();

        $data = $post->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Post updated successfully.'
        ];

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (is_null($post)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Post not found.'
            ];
            return response()->json($response, 404);
        }

        $post->delete();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Post deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
