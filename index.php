<?php

// $arr = ['k', 'j', 'e', 'd', 'c', 'b', 'a'];
// $arr = ['a', 'b', 'c', 'd', 'e', 'j', 'k'];
$arr = ['j', 'c', 'd', 'a', 'e', 'b', 'k'];
// $arr = ['a', 'j', 'c', 'd', 'e', 'b', 'k'];

$list = [];

class LinkedList {
	public $value;
	public $next;
	function __construct($el, $next) {
		$this->value = $el;
		$this->next = $next;
	}
}

$head = new LinkedList($arr[0], null);

foreach (array_slice($arr, 1) as $item) {
	$temp = &$head;
	if (!$temp->next) {
		if (strcmp($temp->value, $item) > 0) {
			$temp = new LinkedList($item, $temp);
		} else if (strcmp($temp->value, $item) < 0) {
			$temp->next = new LinkedList($item, null);
		}
	} else {
		while ($temp->next) {
			if (strcmp($temp->value, $item) > 0) {
				$temp = new LinkedList($item, $temp);
				break;
			} else if (strcmp($temp->next->value, $item) > 0) {
				$temp->next = new LinkedList($item, $temp->next);
				break;
			} else if (strcmp($temp->next->value, $item) < 0) {
				$temp = &$temp->next;
			}
		}
		if (!$temp->next) {
			$temp->next = new LinkedList($item, null);
		}
	}
}

print_r($head);