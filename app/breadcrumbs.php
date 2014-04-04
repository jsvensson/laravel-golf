<?php

// Template to use
Breadcrumbs::setView('partial/breadcrumbs');

// Base Home breadcrumb
Breadcrumbs::register('home', function($b) {
  $b->push('Hem', URL::to('/'));
});

// contest.index breadcrumb
Breadcrumbs::register('contest.index', function($b) {
  $b->parent('home');
  $b->push('Tävlingar', route('contest.index'));
});

// contest.show breadcrumb
Breadcrumbs::register('contest.show', function($b, $contest) {
  $b->parent('contest.index');
  $b->push($contest->name, route('contest.show', $contest->id));
});

// contest.edit breadcrumb
Breadcrumbs::register('contest.edit', function($b, $contest) {
  $b->parent('contest.show', $contest);
  $b->push('Redigera', route('contest.edit', $contest->id));
});

// contest.player.index breadcrumb
Breadcrumbs::register('contest.player.index', function($b, $contest) {
  $b->parent('contest.show', $contest);
  $b->push('Spelare', route('contest.player.index', $contest->id));
});

// contest.player.create breadcrumb
Breadcrumbs::register('contest.player.create', function($b, $contest) {
  $b->parent('contest.player.index', $contest);
  $b->push('Lägg till spelare', route('contest.player.create', $contest->id));
});

// contest.player.edit breadcrumb
Breadcrumbs::register('contest.player.edit', function($b, $contest, $player) {
  $b->parent('contest.show', $contest);
  $b->push('Redigera spelar-events', route('contest.player.edit', [$contest->id, $player->id]));
});

// contest.event.index breadcrumb
Breadcrumbs::register('contest.event.index', function($b, $contest) {
  $b->parent('contest.show', $contest);
  $b->push('Events', route('contest.event.index', $contest->id));
});

// contest.event.show breadcrumb
Breadcrumbs::register('contest.event.show', function($b, $course) {
  $b->parent('contest.event.index', $course->contest);
  $b->push($course->name, route('contest.event.show', [$course->contest->id, $course->id]));
});

// contest.event.create breadcrumb
Breadcrumbs::register('contest.event.create', function($b, $contest) {
  $b->parent('contest.show', $contest);
  $b->push('Skapa event', route('contest.event.create', [$contest->id]));
});

