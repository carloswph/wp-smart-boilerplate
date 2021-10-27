<?php 

namespace SmartBoilerplate;
use SmartBoilerplate\Generator;

class Config
{
	protected $siteName;

	protected $themePath;

	protected $isChild;

	protected $sourceDir;

	protected $distDir;

	protected $options;

	public function __construct(array $options)
	{
		$this->siteName = get_bloginfo('name');
		$this->options = $options;
		
		add_action('after_setup_theme', function () {
			if(is_child_theme() === true) {
				$this->themePath = get_stylesheet_directory();
			} else {
				$this->themePath = get_template_directory();
			}
		});
	}

	public function getOptions()
	{
		return $this->options;
	}

	public function getSiteName()
	{
		return $this->siteName;
	}

	public function setSourceDir(string $dirName)
	{
		$this->sourceDir = $dirName;
	}

	public function setDistDir(string $dirName)
	{
		$this->distDir = $dirName;
	}

	public function getThemePath()
	{
		return $this->themePath;
	}

	public function generate()
	{
		$generator = new Generator($this);
	}
}