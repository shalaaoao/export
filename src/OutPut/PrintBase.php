<?php namespace Laoyuegou\Export\OutPut;

abstract class PrintBase
{
    protected $content_data = [];
    protected $file_path;

    const DEFAULT_PATH = __DIR__ . '/../../storage/';

    public function __construct($content_data)
    {
        $this->content_data = $content_data;
    }

    /**
     * @return array [csv_string, csv_server_url]
     */
    abstract protected function export(): array;
}
