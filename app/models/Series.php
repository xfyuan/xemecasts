<?php

class Series extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'title' => 'required|between:8,50',
		'summary' => 'required|between:8,500',
		'purpose' => 'required|between:8,300',
	];

	// Don't forget to fill this array
	protected $fillable = ['title', 'summary', 'purpose', 'duration'];

    public function xcast()
    {
        return $this->belongsToMany('Xcast');
    }
}
