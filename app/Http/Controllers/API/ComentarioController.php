<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comentario;
use Validator;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentarios = Comentario::with('user')->get();
        $data = $comentarios->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Comentarios lidos com sucesso.'
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
            'post_id' => 'required',           
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

        $comentario = Comentario::create($input);
        $data = $comentario->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Comentario armazenado com sucesso.'
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
        $comentario = Comentario::find($id);        

        if (is_null($comentario)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Comentario not found.'
            ];
            return response()->json($response, 404);
        }

        $data = $comentario->toArray();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'comentario recuperado com sucesso.'
        ];

        return response()->json($response, 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
