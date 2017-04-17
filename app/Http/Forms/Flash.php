<?php

namespace App\Http\Forms;

class Flash
{
	/**
	 * Creates a SweetAlert flash message.
	 *
	 * This method stores data for SweetAlert message in the session that will only be available during
	 * the subsequent HTTP request.
	 *
	 * @param string $title
	 * @param string $message
	 * @param string $type
	 */
	public function create($title, $message, $type)
	{
		session()->flash('flash_message', [
			'title' => $title,
			'message' => $message,
			'type' => $type
		]);
	}
	
	/**
	 * Creates an info flash message.
	 *
	 * @param $title
	 * @param $message
	 */
	public function info($title, $message)
	{
		$this->create($title, $message, 'info');
	}
	
	/**
	 * Creates a success flash message.
	 *
	 * @param string $title
	 * @param string $message
	 */
	public function success($title, $message)
	{
		$this->create($title, $message, 'success');
	}
	
	/**
	 * Creates an error flash message.
	 *
	 * @param string $title
	 * @param string $message
	 */
	public function error($title, $message)
	{
		$this->create($title, $message, 'error');
	}
}