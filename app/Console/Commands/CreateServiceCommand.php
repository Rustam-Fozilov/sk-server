<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class CreateServiceCommand extends GeneratorCommand
{
    /**
     * STUB_PATH.
     */
    const STUB_PATH = __DIR__ . '/Stubs/';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name : Create a service class} {--i : Create a service interface}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class and contract';


    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    protected function getStub()
    {
    }

    /**
     * @return string
     */
    protected function getServiceStub(): string
    {
        return self::STUB_PATH . 'service.stub';
    }

    /**
     * @return string
     */
    protected function getInterfaceStub(): string
    {
        return self::STUB_PATH . 'interface.stub';
    }

    /**
     * @return string
     */
    protected function getServiceInterfaceStub(): string
    {
        return self::STUB_PATH . 'service.interface.stub';
    }

    /**
     * Execute the console command.
     *
     * @throws FileNotFoundException
     */
    public function handle()
    {
        if ($this->isReservedName($this->getNameInput())) {
            $this->error('The name "' . $this->getNameInput() . '" is reserved by PHP.');

            return false;
        }

        $name = $this->qualifyClass($this->getNameInput());

        $path = $this->getPath($name);

        if ((!$this->hasOption('force') ||
                !$this->option('force')) &&
            $this->alreadyExists($this->getNameInput())) {
            $this->error($this->type . ' already exists!');

            return false;
        }

        $this->makeDirectory($path);
        $isInterface = $this->option('i');

        $this->files->put(
            $path,
            $this->sortImports(
                $this->buildServiceClass($name, $isInterface)
            )
        );
        $message = $this->type;

        // Whether to create contract
        if ($isInterface) {

            $interfaceName = $name . 'Interface';
            $interfacePath = str_replace(
                $this->getNameInput() . '.php',
                $this->getNameInput() . 'Interface.php',
                $path
            );

            $this->makeDirectory($interfacePath);

            $this->files->put(
                $interfacePath,
                $this->sortImports(
                    $this->buildServiceInterface($interfaceName)
                )
            );

            $message .= ' and Interface';
        }

        $this->info($message . ' created successfully.');
    }

    /**
     * Build the class with the given name.
     *
     * @param string $name
     * @param $isInterface
     * @return string
     *
     * @throws FileNotFoundException
     */
    protected function buildServiceClass(string $name, $isInterface): string
    {
        $stub = $this->files->get(
            $isInterface ? $this->getServiceInterfaceStub() : $this->getServiceStub()
        );

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    /**
     * Build the class with the given name.
     *
     * @param string $name
     * @return string
     *
     * @throws FileNotFoundException
     */
    protected function buildServiceInterface(string $name): string
    {
        $stub = $this->files->get($this->getInterfaceStub());

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    /**
     * @param $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Services';
    }
}
