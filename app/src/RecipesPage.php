<?php
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;


class RecipesPage extends Page {

  private static $has_many = [
    'RecipeObjects' => RecipeObject::class
  ];

  public function getCMSFields() {
    $fields = parent::getCMSFields();
    $fields->addFieldToTab('Root.Main', GridField::create('RecipeObjects',
      'Recipes',
      $this->RecipeObjects(),
      GridFieldConfig_RecordEditor::create()
    ));
      return $fields;
  }
}
