<?php 

namespace SmartBoilerplate;

class Generator
{
	protected $mixFile = 'webpack.mix.js';

	protected $mixConfig;

	protected $options;

	protected $config;

	public function __construct(Config $config)
	{
		$this->config = $config;
		$this->options = $this->config->getOptions();
		$this->mixConfig = fopen($this->options['root'] . $this->mixFile, 'w+');
		$this->commons();
		$this->tasks();
		$this->save();
	}

	public function commons()
	{
		$commons = "let mix = require('laravel-mix');" . PHP_EOL;
		$commons .= "var pluginname = '" . str_replace('/', '', $this->options['slug']) . "';" . PHP_EOL;
		$commons .= "const pluginpath = '" . $this->options['root'] . "'" . PHP_EOL;
		$commons .= "const resources = pluginpath + '/res';" . PHP_EOL;
		fwrite($this->mixConfig, $commons);
	}
	
	public function tasks()
	{
		$tasks = $this->options;
		$compiling = $tasks['compiling'];
		
		//if(in_array('js', $compiling)
	}

	public function save()
	{
		fclose($this->mixConfig);
	}
}