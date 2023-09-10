<?php namespace App\Traits;
use Artesaos\SEOTools\Facades\OpenGraph;
use Illuminate\Support\Str;

trait OgGenerate{
	public function ogGenerate(): void
    {
		OpenGraph::setUrl($this->url);
		if($this->og_title || $this->name){
			OpenGraph::setTitle($this->og_title ?: $this->name);
		}
		if($this->og_description || $this->description){
			OpenGraph::setDescription($this->og_description ?: $this->description);
		}
		if($this->image_src){
			OpenGraph::addImage($this->image_src);
		}
	}
}
