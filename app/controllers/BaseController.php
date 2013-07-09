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
    // Set up current user for all views
    View::share('user', User::currentUser());
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
