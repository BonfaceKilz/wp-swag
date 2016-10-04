<?php

require_once __DIR__."/../../ext/wpcrud/WpCrud.php";

class SwagController extends WpCrud {
	function init() {
		$this->addField("title")
            ->type("label");

		$this->addField("color")
            ->description("If no color is specified, the color will be inherited from the parent");

		$this->addField("description")
            ->description("This description will appear in the category listing")
            ->type("textarea");

		$this->setListFields(array("title","color"));

        $this->setConfig("enableCreate",FALSE);
        $this->setConfig("enableDelete",FALSE);
        $this->setConfig("typeName","Swag Badges");
        $this->setConfig("description",
            "Use this page to set colors and decription for the swag categories.<br/><br/> ".
            "You don't need to use this page to actually <i>create</i> anything, ".
            "the items listed here are created implicitly as you set the <tt>provides</tt> ".
            "tag of a swagpath.");

        $this->setConfig("parentMenuSlug","__unused__");
	}

    function createItem() {
        throw new Exception("That's not how it works.");
    }

    function getItem($id) {
    	return Swag::findByString($id);
    }

    function deleteItem($item) {
        throw new Exception("That's not how it works.");
    }

    function saveItem($item) {
        $item->getSwagData()->save();
    }

    function getAllItems() {
    	$implied=Swag::findAllImplied();
    	$all=array();

    	foreach ($implied as $swag) {
    		if ($swag->getTitle())
    			$all[]=$swag;
    	}

    	return $all;
    }

    function getFieldValue($item, $field) {
    	switch ($field) {
    		case "title":
    			return $item->getString();
    			break;

    		case "color":
    			return $item->getDefinedColor();
    			break;

    		case "description":
    			return $item->getDescription();
    			break;

    		case "id":
    			return $item->getString();
    			break;

    		default:
    			throw new Exception("Unknown field: ".$field);
    	}
    }

    function setFieldValue(&$item, $field, $value) {
        switch ($field) {
            case "title":
                if ($value!=$item->getString()) {
                    throw new Exception("That's not supposed to change, new=".$value);
                }
                return;

            case "color":
                $item->getSwagData()->color=$value;
                return;

            case "description":
                $item->getSwagData()->description=$value;
                return;

            default:
                throw new Exception("Can't set field: ".$field);
        }
    }
}