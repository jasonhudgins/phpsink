<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softabstop=4: */


class Chooser {


  /**
  * this is a 2d array to store the items we can choose from
		*/
	var $_items = array();


		/**
		* simple constructor only (for now)
		*/
	function Chooser() 
	{
	}


		/** 
		* this method is how you add an item to the chooser,
		* first arg is an identifier, the second argument is
		* a weight setting.
		*/
	function addItem($ident, $weight = 1) 
	{
			/**
			* init a new assoc array
			*/
		$item = array();
			/** 
			* store the identifier
			*/
		$item['ident'] = $ident;
			/**
			store the weight
			*/
		$item['weight'] = $weight;
			/** 
			* push this onto the array
			*/
		array_push($this->_items, $item);
	}


		/**
		* this method is just for debugging
		*/
	function dumpItems() 
	{
		foreach ($this->_items as $item) {
			print $item['ident'] . "\n";
			print $item['weight'] . "\n";
		}
	}


		/** 
		* this method is the main workhorse, you call it when
		* you want a particular item to be chosen.
		*/
	function chooseItem() 
	{
		$weightTotal = 0;
			/** 
			* first task is to find the total weight via
			* this accumulator loop
			*/
		foreach ($this->_items as $item) {
			$weightTotal += $item['weight'];
		}
			/**
			* generate a random number between 0 and 10000
			*/
		$someValue = rand(0, 10000);
			/**
			* start with a base at 0
			*/
		$base = 0;
			/** 
			* iterate over the items and find the chosen one
			*/
		foreach ($this->_items as $item) {
				/**
				* choose this item
				*/
			$chosen = $item['ident'];
				/**
				* calc the probability that this is the item we want
				*/
			$prob = ($item['weight'] / $weightTotal) * 10000;
				/** 
				* add the probability to the current base
				*/
			$base += $prob;
				/**
				* if it's the random number is in our current 
				* range, then break here.
				*/
			if ($someValue < $base) {
				break;
			}
		}


			/**
			* return the identifier of the chosen item
			*/
		return $chosen;
	}
}


?>
