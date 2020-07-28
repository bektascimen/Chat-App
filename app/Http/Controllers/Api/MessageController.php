<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Message[]|Collection
     */
    public function index()
    {
        return Message::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $message = Message::create($input);

        return response([
            'data' => $message,
            'message' => 'Mesaj eklendi.'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Message $message
     * @return Response
     */
    public function show(Message $message)
    {
        $message = Message::find($message);
        if ($message)
            return response($message, 200);
        else
            return response(['message' => 'Mesaj bulunamadı.'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Message $message
     * @return Response
     */
    public function update(Request $request, Message $message)
    {
        $input = $request->all();

        $message->update($input);

        return response([
            'data' => $message,
            'message' => 'Mesaj güncellendi.'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Message $message
     * @return Response
     * @throws Exception
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return response([
            'message' => 'Mesaj silindi.'
        ], 200);
    }
}
