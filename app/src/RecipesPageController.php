<?php
use SilverStripe\Control\HTTPRequest;

class RecipesPageController extends PageController {
  private static $allowed_actions = [
    'show'
  ];

  public function show(HTTPRequest $request) {
    $recipe = RecipeObject::get()->byID($request->param('ID'));

    if (!$recipe) {
      return $this->httpError(404, 'No such recipe');
    }

    return [
      'Recipe' => $recipe
    ];
  }
}
