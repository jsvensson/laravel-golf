<?php

class BaseController extends Controller {

  protected $layout = 'layout.default';
  protected $user;

  /**
   * Constructor for the base controller.
   *
   * Configures user credentials for all inheriting controllers.
   *
   * @return void
   */
  public function __construct()
  {
    // Set up $this->user
    if (Sentry::check()) {
      $this->user = User::find(Sentry::getUser()->id);
    }
    else {
      $this->user = false;
    }
  }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
