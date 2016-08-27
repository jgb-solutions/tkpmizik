<?php

class MP4APIController extends BaseController
{
	public function index()
	{
		return MP4::take(3)->get();
	}
}