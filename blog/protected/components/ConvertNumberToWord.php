<?php
class ConvertNumberToWord
{
    public function convert_number($so)
    {
        $arr_chuhangdonvi = array(
            'không',
            'một',
            'hai',
            'ba',
            'bốn',
            'năm',
            'sáu',
            'bảy',
            'tám',
            'chín'
        );
        $resualt = '';
        $resualt = $arr_chuhangdonvi[$so];
        return $resualt;
    }
    public function convert_two_number($so)
    {
        $arr_chubinhthuong = array(
            'không',
            'một',
            'hai',
            'ba',
            'bốn',
            'năm',
            'sáu',
            'bảy',
            'tám',
            'chín'
        );
        $arr_chuhangdonvi = array(
            'mươi',
            'mốt',
            'hai',
            'ba',
            'bốn',
            'lăm',
            'sáu',
            'bảy',
            'tám',
            'chín'
        );
        $arr_chuhangchuc = array(
            '',
            'mười',
            'hai mươi',
            'ba mươi',
            'bốn mươi',
            'năm mươi',
            'sáu mươi',
            'bảy mươi',
            'tám mươi',
            'chín mươi'
        );
        $resualt = '';
        $sohangchuc = substr($so, 0, 1);
        $sohangdonvi = substr($so, 1, 1);
        $resualt .= $arr_chuhangchuc[$sohangchuc];
        if ($sohangchuc == 1 && $sohangdonvi == 1)
            $resualt .= ' ' . $arr_chubinhthuong[$sohangdonvi];
        elseif ($sohangchuc == 1 && $sohangdonvi > 1)
            $resualt .= ' ' . $arr_chuhangdonvi[$sohangdonvi];
        elseif ($sohangchuc > 1 && $sohangdonvi > 0)
            $resualt .= ' ' . $arr_chuhangdonvi[$sohangdonvi];

        return $resualt;
    }
    public function convert_three_number($so)
    {
        $resualt = '';
        $arr_chubinhthuong = array(
            'không',
            'một',
            'hai',
            'ba',
            'bốn',
            'năm',
            'sáu',
            'bảy',
            'tám',
            'chín'
        );
        $sohangtram = substr($so, 0, 1);
        $sohangchuc = substr($so, 1, 1);
        $sohangdonvi = substr($so, 2, 1);
        $resualt = $arr_chubinhthuong[$sohangtram] . ' trăm';
        if ($sohangchuc == 0 && $sohangdonvi != 0)
            $resualt .= ' linh ' . $arr_chubinhthuong[$sohangdonvi];
        elseif ($sohangchuc != 0)
            $resualt .= ' ' . $this->convert_two_number($sohangchuc . $sohangdonvi);
        return $resualt;
    }

    public function convert($so)
    {
        $result = '';
        $arr_So = array(
            'ty' => '',
            'trieu' => '',
            'nghin' => '',
            'tram' => ''
        );
        $sochuso = strlen($so);
        for ($i = $sochuso - 1; $i >= 0; $i--) {

            if ($sochuso - $i <= 3) {
                $arr_So['tram'] = substr($so, $i, 1) . $arr_So['tram'];
            } elseif ($sochuso - $i > 3 && $sochuso - $i <= 6) {
                $arr_So['nghin'] = substr($so, $i, 1) . $arr_So['nghin'];
            } elseif ($sochuso - $i > 6 && $sochuso - $i <= 9) {
                $arr_So['trieu'] = substr($so, $i, 1) . $arr_So['trieu'];
            } else {
                $arr_So['ty'] = substr($so, $i, 1) . $arr_So['ty'];
            }
        }
        if ($arr_So['ty'] > 0)
            $result .= $this->m($arr_So['ty']) . ' tỷ';
        if ($arr_So['trieu'] > 0) {
            if ($arr_So['trieu'] >= 100 || $arr_So['ty'] > 0)
                $result .= ' ' . $this->convert_three_number($arr_So['trieu']) . ' triệu';
            elseif ($arr_So['trieu'] >= 10)
                $result .= ' ' . $this->convert_two_number($arr_So['trieu']) . ' triệu';
            else
                $result .= ' ' . $this->convert_number($arr_So['trieu']) . ' triệu';
        }
        if ($arr_So['nghin'] > 0) {
            if ($arr_So['nghin'] >= 100 || $arr_So['trieu'] > 0)
                $result .= ' ' . $this->convert_three_number($arr_So['nghin']) . ' nghìn';
            elseif ($arr_So['nghin'] >= 10)
                $result .= ' ' . $this->convert_two_number($arr_So['nghin']) . ' nghìn';
            else
                $result .= ' ' . $this->convert_number($arr_So['nghin']) . ' nghìn';
        }
        if ($arr_So['tram'] > 0) {
            if ($arr_So['tram'] >= 100 || $arr_So['nghin'] > 0)
                $result .= ' ' . $this->convert_three_number($arr_So['tram']);
            elseif ($arr_So['tram'] >= 10)
                $result .= ' ' . $this->convert_two_number($arr_So['tram']);
            else
                $result .= ' ' . $this->convert_number($arr_So['tram']);
        }

        return $result;
    }
}
