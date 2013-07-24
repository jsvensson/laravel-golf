<?php

// Template to use
Breadcrumbs::setView('partial/breadcrumbs');

// Base Home breadcrumb
Breadcrumbs::register('home', function($b) {
  $b->push('Hem', URL::to('/'));
});

// contest.index breadcrumb
Breadcrumbs::register('contests', function($b) {
  $b->parent('home');
  $b->push('Tävlingar', route('contest.index'));
});

// contest.show breadcrumb
Breadcrumbs::register('contest', function($b, $contest) {
  $b->parent('contests');
  $b->push($contest->name, route('contest.show', $contest->id));
});

// contest.event.index breadcrumb
Breadcrumbs::register('events', function($b, $contest) {
  $b->parent('contest', $contest);
  $b->push('Events', route('contest.event.index', $contest->id));
});

// contest.event.show breadcrumb
Breadcrumbs::register('event', function($b, $event) {
  $b->parent('events', $event->contest);
  $b->push($event->name, route('contest.event.show', [$event->contest->id, $event->id]));
});
