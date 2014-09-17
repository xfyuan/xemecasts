<?php

class Series extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'title' => 'required|between:8,100',
		'purpose' => 'required|between:8,500',
		'summary' => 'required|min:10',
	];

	// Don't forget to fill this array
	protected $fillable = ['title', 'summary', 'purpose', 'duration'];

    public function xcast()
    {
        return $this->belongsToMany('Xcast');
    }
}
