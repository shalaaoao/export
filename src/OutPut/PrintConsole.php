<?php namespace Laoyuegou\Export\OutPut;

/**
 * 直接在控制台输出
 * Class PrintConsole
 * @package Laoyuegou\Export\OutPut
 */
class PrintConsole extends PrintBase
{
    public function export(): array
    {
        $str = '';
        foreach ($this->content_data as $arr) {
            $_ = '';
            foreach ($arr as $v) {
                $v = str_replace(',', '，', $v);
                $v = str_replace("\n", ' ', $v);
                $v = str_replace("\r", ' ', $v);

                $_ .= $v . ',';
            }

            $str .= rtrim($_, ',') . PHP_EOL;
        }

        return [$str, ''];
    }
}
