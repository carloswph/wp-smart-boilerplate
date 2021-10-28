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
		
		$script = "// Assets to compile and how";
		
		if($compiling['js'] === true) {
		    $script .= "mix.js(`${resources}/js/*.js`, `${pluginpath}/dist/js/bundle.js`);" . PHP_EOL;
		    if($tasks['babel'] === true) {
		        $script .= "mix.babel(`${pluginpath}/dist/js/bundle.js`, `${pluginpath}/dist/js/bundle.es5.js`);" . PHP_EOL;
		    }
		}
		
		if($tasks['browsersync'] === true) {
		    $script .= "mix.browserSync('" . site_url() . "');" . PHP_EOL;
		}
	}

	public function save()
	{
		fclose($this->mixConfig);
	}
}
