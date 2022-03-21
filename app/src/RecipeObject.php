<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Model\SiteTree;

class RecipeObject extends DataObject {

  private static $db = [
    'Title' => 'Text',
    'Content' => 'HTMLText',
    'ImageURL' => 'Text'
  ];

  private static $has_one = [
    'ImageSource' => Image::class,
    'RecipesPage' => RecipesPage::class,
  ];

  private static $owns = [
    'ImageSource'
  ];

  public function Link() {
    return $this->RecipesPage()->Link('show/'.$this->ID);
  }

  public function getCMSFields() {
    $imageField = UploadField::create('ImageSource');
    $imageField->setFolderName('RecipeImages');
    $imageField->getValidator()->setAllowedExtensions(['jpg', 'jpeg', 'png']);
    return FieldList::create(
      TextField::create('Title'),
      $imageField,
      HTMLEditorField::create('Content'),
    );
  }

}
