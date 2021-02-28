<?php namespace Laoyuegou\Export;

use Laoyuegou\Export\OutPut\ExportCsv;
use Laoyuegou\Export\OutPut\PrintConsole;

class Convert
{
    protected $title_column;
    protected $content_data;
    private   $csv_server_url = ''; // csv在服务器上的地址
    private   $csv_string     = ''; // csv的内容字符串

    public static function instance()
    {
        return new static();
    }

    public function setTitle(array $title_column)
    {
        $this->title_column = $title_column;
        return $this;
    }

    public function setContent(array $content_column)
    {
        $this->content_data = $content_column;
        return $this;
    }

    /**
     * 将数组降维成csv格式的一维数组
     * @return string
     */
    private function mergeTitleContent()
    {
        if (!$this->content_data) {
            return 'content不能为空';
        }

        if ($this->title_column) {
            array_unshift($this->content_data, $this->title_column);
        }

        return $this;
    }

    const TYPE_CONSOLE    = 1; // 打印到console
    const TYPE_CSV_EXPORT = 2; // 导出为csv

    /**
     * 处理导出
     * @param int $type
     */
    public function doExport(int $type, string $file_path = '', string $file_name = '')
    {
        $this->mergeTitleContent();

        switch ($type) {
            case self::TYPE_CONSOLE:
                $c = PrintConsole::class;
                break;
            case self::TYPE_CSV_EXPORT:
                $c = ExportCsv::class;
                break;
            default:
                return 'type错误';
        }

        list($this->csv_string, $this->csv_server_url) = (new $c($this->content_data))->setPath($file_path, $file_name)
                                                                                      ->export();

        return $this;
    }

    public function getServerUrl()
    {
        return $this->csv_server_url;
    }

    public function getCsvString()
    {
        return $this->csv_string;
    }

    // TODO 下载到本地
    public function scp(): string
    {
        return '';
    }
}
