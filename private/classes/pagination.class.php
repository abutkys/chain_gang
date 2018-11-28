<?php

class Pagination extends DatabaseObject {
	public $current_page;
	public $per_page;
	public $total_count;
	
	public function __construct($current_page=1,$per_page=5,$total_count=0){
		$this->current_page = $current_page;
		$this->per_page = $per_page;
		$this->total_count = $total_count;
	}
	public function offset(){
		return $this->per_page * ($this->current_page - 1);
	}
	public function next_page(){
		$next = $this->current_page + 1;
		 return $next < $this->total_pages() ? $next : false;
	}
	public function prev_page(){
		$prev = $this->current_page - 1;
		return $prev > 0 ? $prev : false;
	}
	public function total_pages(){
		return $this->total_count / $this->per_page;
	}
	public function next_link($url=""){
		$link = "";
		if ($this->next_page() != FALSE){
			$link .= "<a href=\"{$url}?page={$this->next_page()}\">NEXT &raquo;</a>";
		}
		return $link;
	}
	public function prev_link($url = ""){
		$link = "";
		if ($this->prev_page() != FALSE) {
			$link .= "<a href=\"{$url}?page={$this->prev_page()}\">&laquo;Previous</a>";
		}
		return $link;
	}
	public function number_link($url = ""){
		$output = "";
		for ($i = 1;$i < $this->total_pages(); $i++){
			if ($i == $this->current_page){
				$output .= "<span class=\"selected\">{$i}</span>";
			}else{
				$output .= "<a href=\"{$url}?page={$i}\">$i</a>";
			}
		}
		return $output;
	}
	public function page_links($url=""){
		$output= "";
		if ($this->total_pages() > 1){
			$output .= "<div class=\"pagination\">";
			$output .= $this->next_link($url);
			$output .= $this->number_link($url);
			$output .= $this->prev_link($url);
			$output .= "</div>";
		}
		return $output;
	}
 
}