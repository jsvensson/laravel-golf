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

// contest.player.index breadcrumb
Breadcrumbs::register('contest.player.index', function($b, $contest) {
  $b->parent('contest.show', $contest);
  $b->push('Spelare', route('contest.player.index', $contest->id));
});

// contest.player.create breadcrumb
Breadcrumbs::register('contest.player.create', function($b, $contest) {
  $b->parent('contest.player.index');
  $b->push('Lägg till spelare', route('contest.player.create', $contest->id));
});

// contest.event.index breadcrumb
Breadcrumbs::register('contest.event.index', function($b, $contest) {
  $b->parent('contest.show', $contest);
  $b->push('Events', route('contest.event.index', $contest->id));
});

// contest.event.show breadcrumb
Breadcrumbs::register('contest.event.show', function($b, $event) {
  $b->parent('contest.event.index', $event->contest);
  $b->push($event->name, route('contest.event.show', [$event->contest->id, $event->id]));
});
