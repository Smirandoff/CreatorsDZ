<?php

namespace App\Http\Controllers;

use App\Http\Repositories\MessengerRepository;
use App\Http\Requests\NewThreadRequest;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Http\Request;

class MessengerController extends Controller
{
    public function __construct(MessengerRepository $repository){
        $this->repository = $repository;
    }
    public function index(){
        $threads = $this->repository->getUserThreads(auth()->user());
        return view('messenger.index');
    }
    public function show(Thread $thread){
        if(!$thread->hasParticipant(auth()->id())){
            abort(403);
        }
        return view('messenger.show')->with(compact('thread'));
    }
    public function create(){
        return view('messenger.create');
    }
    public function store(NewThreadRequest $request){
        if($this->createNewThread($request->validated())){
            return redirect()->route('messenger.index')->withSuccess('Le message a été envoyé avec succès !');
        }else{
            abort(520);
        }
    }
    public function update(Thread $thread, UpdateThreadRequest $request){
        if(!$thread->hasParticipant(auth()->id())){
            abort(403);
        }
        $this->repository->addMessageToThread($thread, $request->validated());

        return redirect()->route('messenger.show', $thread);
    }
}
