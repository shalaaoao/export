<?php namespace Laoyuegou\Export\OutPut;

/**
 * 导出Csv
 * Class PrintConsole
 * @package Laoyuegou\Export\OutPut
 */
class ExportCsv extends PrintBase
{
    public function setPath($path = '', $name = '')
    {
        if (!$path) {
            $path = self::DEFAULT_PATH;
        }

        if (!$name) {
            $name = date('YmdHis' . rand(100, 999)) . '.csv';
        }

        $this->file_path = $path . $name;

        return $this;
    }

    public function export(): array
    {
        $fp = fopen($this->file_path, 'w+');

        foreach ($this->content_data as $arr) {
            $_ = '';
            foreach ($arr as $v) {
                $v = str_replace(',', '，', $v);
                $v = str_replace("\n", ' ', $v);
                $v = str_replace("\r", ' ', $v);

                $_ .= $v . ',';
            }
            fwrite($fp, rtrim($_, ',').PHP_EOL);
        }

        fclose($fp);

        return ['', $this->file_path];
    }
}
