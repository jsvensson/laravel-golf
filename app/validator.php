<?php

Validator::extend('check_password', function($attribute, $value, $parameters)
{
  return User::currentUser()->checkPassword($value);

});

/* EOF */
