<?php

class NameDay
{
    public static function refresh(){
        $dom = new DOMDocument();
        $dom->loadHTML(file_get_contents('https://mek.oszk.hu/00000/00056/html/196.htm'));
        $xpath = new DOMXPath($dom);
        $data = ((string)$xpath->query('//body/pre')->item(0)->nodeValue);
        for($i=0;$i<5;$i++) {
            $data = preg_replace('/^.+\n/', '', $data);
        }
        $result = [];
        foreach(explode("\n",strip_tags($data)) as $index => $row){
            if(strlen($row) != 0){
                list($name,$dates) = explode("\t",preg_replace('!\s+!', "\t", $row));
            }else{
                $dates = $row;
            }
            foreach(explode(',',$dates) as $date){
                if(strlen($date) == 0){
                    continue;
                }
                list($month,$day) = explode('.',$date);
                $clearDay = str_replace('*', '', $date);
                if (empty($result[$month][$day])) {
                    $result[$month][$day] = ['main' => [], 'other' => []];
                }
                $key = $clearDay == $date ? 'other' : 'main';
                $result[$month][$day][$key][] = $name;

            }
        }

        file_put_contents(__DIR__.'/nevnapok.json',json_encode($result));

    }

    public static function get(int $month, int $day): array
    {
        $data = json_decode(file_get_contents(__DIR__.'/nevnapok.json'), true);
        if(empty($data[$month][$day])){
            throw new Exception('This aren\'t the date you\'re looking for...');
        }
        return $data[$month][$day];
    }


}
