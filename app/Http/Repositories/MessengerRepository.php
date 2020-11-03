<?php

namespace App\Http\Repositories;

use App\Models\User;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Support\Facades\Auth;

class MessengerRepository {
  public function getAllThreads(){
    return Thread::getAllLatest()->get();
  }
  public function getUserThreads(User $user){
    return Thread::forUser($user)->latest('updated_at')->get();
  }
  public function createNewThread($data){
    $thread = Thread::create([
      'subject' => $data['subject'],
    ]);
    $message = $thread->messages()->create([
      'user_id' => Auth::id(),
      'body' => $data['message']
    ]);
    $thread->participants()->create([
      'user_id' => Auth::id(),
      'last_read' => now(),
    ]);
    $thread->addParticipant($data['recipients']);
    
    return true;
  }
  public function addMessageToThread(Thread $thread, $data){
    $thread->activateAllParticipants();

    $thread->messages()->create([
      'user_id' => Auth::id(),
      'body' => $data['message']
    ]);
    $participant = $thread->participants()->firstOrCreate([
      'user_id' => Auth::id(),
      'last_read' => now(),
    ]);
    if($data['recipients'] && !empty($data['recipients'])){
      $thread->addParticipant($data['recipients']);
    }
    return true;
  }
}