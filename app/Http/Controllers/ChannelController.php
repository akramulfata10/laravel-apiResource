<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChannelRequest;
use App\Http\Requests\UpdateChannelRequest;
use App\Http\Resources\ChannelCollection;
use App\Http\Resources\ChannelResource;
use App\Models\Channel;

class ChannelController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return new ChannelCollection(Channel::latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChannelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChannelRequest $request) {
        $validateData = Channel::create($request->validated());
        if ($validateData) {
            if ($request->hasFile('cover')) {
                $validateData->addMediaFromRequest('cover')->toMediaCollection('covers');
            }
        }
        return new ChannelResource($validateData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel) {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChannelRequest  $request
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChannelRequest $request, Channel $channel) {
        $channel->update($request->validated());
        if ($channel) {
            if ($request->hasFile('cover')) {
                $channel->clearMediaCollection('covers');
                $channel->addMediaFromRequest('cover')->toMediaCollection('covers');
            }
        }
        return new ChannelResource($channel);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel) {
        $channel->delete();
        $channel->clearMediaCollection('covers');
        return response()->json([
            'data' => [],
            'success' => 'deleted successfully',
        ]);
    }
}