<?php

class Xcast extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
        'title' => 'required|between:8,64',
        'author' => 'required|between:8,20',
        'levels' => 'required|integer|between:0,1',
        'description' => 'required|between:8,300',
        'github' => 'url',
	];

	// Don't forget to fill this array
	protected $fillable = ['title', 'author', 'levels', 'poster', 'video', 'duration', 'description', 'github', 'notes', 'rendered_notes'];

    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'LIKE', "%$search%");
                    // ->orWhere('author', 'LIKE', "%$search%")
                    // ->orWhere('description', 'LIKE', "%$search%")
    }

    public function scopeOnlyFree($query)
    {
        return $query->where('levels', '=', 0);
    }
}
