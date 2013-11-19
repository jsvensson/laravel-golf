<?php

class TestController extends BaseController
{

  public function getScssphp()
  {
    $path = public_path() . '/assets/stylesheets/scss';
    $s = new scssc();
    $s->setImportPaths($path);
    $css = $s->compile('@import "screen.scss"');

    return View::make('test.css')
      ->with('css', $css);
  }

  public function getAssetic()
  {
    // Filter manager
    $fm = new Assetic\FilterManager();
    $fm->set('scssphp', new Assetic\Filter\ScssphpFilter());

    $path = public_path() . '/assets/stylesheets/scss';
    $factory = new Assetic\Factory\AssetFactory($path);
    $factory->setFilterManager($fm);
    $factory->setDebug(true);

    $css = $factory->createAsset('*.scss', 'scssphp');

    return View::make('test.css')
      ->with('css', $css->dump());
  }

}

/* EOF */
