<?php
namespace App\Http\Controllers;


use Sitebill\Dragon\Eloquent\Casts\SelectBox;
use Sitebill\Dragon\Helpers\DragonHelper;

class OldModelController extends Controller
{

    public function load_data () {
        $anyModel = DragonHelper::getDynamicModel('client');
        echo 'client model key = '.$anyModel->getKeyName().'<br>';
        $record = $anyModel->where('client_id', 3607)->first();

        echo $record->fio->value.'<br>';
        $record->fio = 'Test Model '.microtime();
        $record->save();

        $record = $anyModel->where('client_id', 3607)->first();
        echo $record->fio->value.'<br>';
        $record->fio = 'Test Model '.microtime();
        $record->save();

        $dataModel = DragonHelper::getDynamicModel('data');
        echo 'data model key = '.$dataModel->getKeyName().'<br>';
        $record = $dataModel->where('id', 50072479)->first();
        //$data_id = $record->id->value;
        echo $record->id->value.' '.$record->price->value.'<br>';
        $record->price->value += 1;
        $record->save();

        $versionModel = DragonHelper::getDynamicModel('version');
        $versionModel->create([
            'version' => 1,
            'code' => uniqid(),
            'name' => 'Simple test',
        ]);
        $lastVersion = $versionModel->orderby('version_id', 'desc')->first();
        echo $lastVersion->code->value.'<br>';
        $version_array = $versionModel->orderby('version_id', 'desc')->take(1)->get()->toArray();
        echo '<pre>';
        print_r($version_array);
        echo '</pre>';


        //$record = $dataModel->where('id', $data_id)->first();
        //echo $record->id->value.' '.$record->price->value.'<br>';




        exit;


        //return response()->json($record);
        //return $record->toJson();
    }

}
