<?php

namespace App\Console\Commands;

use App\Models\Kladr;
use App\Models\Street;
use Illuminate\Console\Command;

class KladrUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:kladr_update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->update_kladr();
        $this->update_street();

        // INSERT INTO `street`(`name`, `socr`, `code`) SELECT `name`, `socr`, `code` FROM `kladr_mix` WHERE length(`code`) = 17
        // SELECT * FROM kladr_migrate.street WHERE region_id=63 and city_id=1 and town_id=0 and area_id=0
        // insert into `samara-zaselim`.`re_street` (`name`) SELECT `name` FROM kladr_migrate.street WHERE region_id=63 and city_id=1 and town_id=0 and area_id=0



        return Command::SUCCESS;
    }

    private function update_kladr()
    {
        $step = 0;
        while ( true ) {
            $kladr_records = Kladr::where('region_id', 0)->take(10000)->get();
            if ( count($kladr_records) == 0 ) {
                echo 'nothing to parse in KLADR table'."\n";
                return;
            }
            foreach ( $kladr_records as $item ) {
                $parsed = $this->parse_kladr_code($item->code);
                $item->region_id =  $parsed['region_id'];
                $item->area_id =  $parsed['area_id'];
                $item->city_id =  $parsed['city_id'];
                $item->town_id =  $parsed['town_id'];
                $item->status_id =  $parsed['status_id'];
                $item->save();
                //echo "updated ".$item->code.'<br>';
            }
            echo 'complete step '.$step++."\n";
        }
    }

    private function update_street()
    {
        $step = 0;
        while ( true ) {
            $records = Street::where('region_id', 0)->take(5000)->get();
            if ( count($records) == 0 ) {
                echo 'nothing to parse in STREET table'."\n";
                return;
            }
            foreach ( $records as $item ) {
                $parsed = $this->parse_street_code($item->code);
                $item->region_id =  $parsed['region_id'];
                $item->area_id =  $parsed['area_id'];
                $item->city_id =  $parsed['city_id'];
                $item->town_id =  $parsed['town_id'];
                $item->street_id =  $parsed['street_id'];
                $item->status_id =  $parsed['status_id'];
                $item->save();
                //echo "updated ".$item->code.'<br>';
            }
            echo 'complete step '.$step++."\n";
        }
    }


    private function parse_street_code( $code )
    {
        if ( strlen($code) < strlen('50040000028002251') ) {
            $code = '0'.$code;
        }
        $result = array();
        $result['region_id'] = intval(substr($code, 0, 2));
        $result['area_id'] = intval(substr($code, 2, 3));
        $result['city_id'] = intval(substr($code, 5, 3));
        $result['town_id'] = intval(substr($code, 8, 3));
        $result['street_id'] = intval(substr($code, 11, 4));
        $result['status_id'] = intval(substr($code, 15, 2));
        return $result;
    }


    private function parse_kladr_code( $code )
    {
        if ( strlen($code) < strlen('9500500012100') ) {
            $code = '0'.$code;
        }
        $result = array();
        $result['region_id'] = intval(substr($code, 0, 2));
        $result['area_id'] = intval(substr($code, 2, 3));
        $result['city_id'] = intval(substr($code, 5, 3));
        $result['town_id'] = intval(substr($code, 8, 3));
        $result['status_id'] = intval(substr($code, 11, 2));
        return $result;
    }

}
