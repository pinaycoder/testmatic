<?php

namespace App\Mailers;

use Illuminate\Contracts\Mail\Mailer;

use App\User;
use App\Project;

class AppMailer{

	protected $mailer;

	protected $from = 'admin@testmatic.com';

	protected $to = '';

	protected $subject = '';

	protected $view;

	protected $data = [];

	public function __construct(Mailer $mailer){

		$this->mailer = $mailer;

	}

	public function sendUserWelcomeEmail(User $user){

		$this->to = $user->email;
		$this->view = 'emails.users.welcome';
		$this->subject = 'Welcome to TESTmatic!';
		$this->data = compact('user');

		$this->deliver();
	}

	public function sendProjectWelcomeEmail(Project $project, User $user){

		$this->to = $user->email;
		$this->view = 'emails.projects.welcome';
		$this->subject = 'TESTmatic: Welcome to Project ' . $project->name . ' !';
		$this->data = compact('user','project');

		$this->deliver();
	}

	public function sendParticipantWelcomeEmail(User $user){

		$this->to = $user->email;
		$this->view = 'emails.users.welcome';
		$this->subject = 'Welcome to TESTmatic!';
		$this->data = compact('user', 'project');

		$this->deliver();
	}

	public function deliver(){

		$this->mailer->send($this->view, $this->data, function($message){
			$message->from($this->from, 'TESTmatic Administrator')
					->to($this->to)
					->subject($this->subject);

		});

	}
}