<?php

class BaseController extends Controller {

  protected $layout = 'layout.default';

  /**
   * Constructor for the base controller.
   *
   * Configures user credentials for all inheriting controllers.
   *
   * @return void
   */
  public function __construct()
  {
    // Set up current user in $user for all views
    if (Sentry::check()) {
      $user = User::find(Sentry::getUser()->id);
    }
    else {
      $user = false;
    }

    View::share('user', $user);
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
