<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\WorkOutLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::where('user_id', Auth::id())->get();
        return view('tags.index', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        Tag::create([
            'user_id' => Auth::id(),
            'comment' => $request->comment,
        ]);

        return redirect()->route('tags.index')->with('success', 'タグが追加されました。');
    }

    public function destroy(Tag $tag)
    {

        $tag->delete();
        
        return redirect()->route('tags.index', $tag->tag_id)->with('success', 'タグが削除されました。');
    }

    public function addTagToWorkOutLog(Request $request, WorkOutLog $workOutLog)
    {
        $request->validate([
            'tag_id' => 'required|exists:tags,id',
        ]);

        $workOutLog->tags()->attach($request->tag_id);
        return redirect()->back()->with('success', 'タグが追加されました。');
    }

    public function removeTagFromWorkOutLog(Request $request, WorkOutLog $workOutLog)
    {
        $request->validate([
            'tag_id' => 'required|exists:tags,id',
        ]);

        $workOutLog->tags()->detach($request->tag_id);
        return redirect()->back()->with('success', 'タグが削除されました。');
    }
}
