<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Illuminate\Console\AppNamespaceDetectorTrait;
use Illuminate\Foundation\Composer;
use Laracasts\Generators\Migrations\NameParser;
use Laracasts\Generators\Migrations\SchemaParser;
use Laracasts\Generators\Migrations\SyntaxBuilder;

class MagicGenerator extends Command
{
    use AppNamespaceDetectorTrait;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'jerrys:generate:module';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generate file input for the generator';

    /**
     * The filesystem instance.
     *
     * @var Filesystem
     */
    protected $files;

	/**
	 * Create a new command instance.
     *
	 */
	public function __construct(Filesystem $files, Composer $composer)
	{
		parent::__construct();
        $this->files = $files;
        $this->composer = $composer;
	}



	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
        $this->makeModule();
	}

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('name', InputArgument::REQUIRED, 'The name of the object'),
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['schema', 's', InputOption::VALUE_OPTIONAL, 'Optional schema to be attached to the migration', null],
        ];
    }

    /**
     * Generate the desired module.
     */
    protected function makeModule()
    {
        $name = $this->argument('name');

        if ($this->files->exists($path = $this->getModulePath($name)))
        {
            return $this->error($this->type.' already exists!');
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->compileMigrationStub());

        $this->info('Migration created successfully.');

        $this->composer->dumpAutoloads();
    }

    /**
     * Get the path to where we should store the module.
     *
     * @param  string $name
     * @return string
     */
    protected function getModulePath($name)
    {
        return './database/migrations/'.date('Y_m_d_His').'_'.$name.'.php';
    }

    /**
     * Generate the desired migration.
     */
    protected function makeMigration()
    {
        $name = $this->argument('name');

        if ($this->files->exists($path = $this->getPath($name)))
        {
            return $this->error($this->type.' already exists!');
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->compileMigrationStub());

        $this->info('Migration created successfully.');

        $this->composer->dumpAutoloads();
    }

    /**
     * Generate an Eloquent model, if the user wishes.
     */
    protected function makeModel()
    {
        $modelPath = $this->getModelPath($this->getModelName());

        if ($this->option('model') && ! $this->files->exists($modelPath)) {
            $this->call('make:model', [
                'name' => $this->getModelName(),
                '--no-migration' => true
            ]);
        }
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if ( ! $this->files->isDirectory(dirname($path)))
        {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
    }

    /**
     * Get the path to where we should store the migration.
     *
     * @param  string $name
     * @return string
     */
    protected function getPath($name)
    {
        return './database/migrations/'.date('Y_m_d_His').'_'.$name.'.php';
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getModelPath($name)
    {
        $name = str_replace($this->getAppNamespace(), '', $name);

        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'.php';
    }

    /**
     * Compile the migration stub.
     *
     * @return string
     */
    protected function compileMigrationStub()
    {
        $stub = $this->files->get(__DIR__.'/../stubs/migration.stub');

        $this->replaceClassName($stub)
            ->replaceSchema($stub)
            ->replaceTableName($stub);

        return $stub;
    }

    /**
     * Replace the class name in the stub.
     *
     * @param  string $stub
     * @return $this
     */
    protected function replaceClassName(&$stub)
    {
        $className = ucwords(camel_case($this->argument('name')));

        $stub = str_replace('{{class}}', $className, $stub);

        return $this;
    }

    /**
     * Replace the table name in the stub.
     *
     * @param  string $stub
     * @return $this
     */
    protected function replaceTableName(&$stub)
    {
        $table = $this->meta['table'];

        $stub = str_replace('{{table}}', $table, $stub);

        return $this;
    }

    /**
     * Replace the schema for the stub.
     *
     * @param  string $stub
     * @return $this
     */
    protected function replaceSchema(&$stub)
    {
        if ($schema = $this->option('schema')) {
            $schema = (new SchemaParser)->parse($schema);
        }

        $schema = (new SyntaxBuilder)->create($schema, $this->meta);

        $stub = str_replace(['{{schema_up}}', '{{schema_down}}'], $schema, $stub);

        return $this;
    }

    /**
     * Get the class name for the Eloquent model generator.
     *
     * @return string
     */
    protected function getModelName()
    {
        return ucwords(str_singular(camel_case($this->meta['table'])));
    }

}
