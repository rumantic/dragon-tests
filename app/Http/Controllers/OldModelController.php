<?php
namespace App\Http\Controllers;


use App\Models\Client;
use Sitebill\Dragon\app\Models\AnyModel;
use Sitebill\Dragon\Eloquent\Casts\SelectBox;

class OldModelController extends Controller
{

    public function load_data () {
        $anyModel = new \Sitebill\Dragon\app\Models\AnyModel();
        //$anyModel->setTable('data');
        $anyModel->setTable('client');
        //$anyModel->setTable('migrations');


        //$record = $anyModel->where('client_id', 18)->first();
        //$record = $anyModel->take(3)->get();
        $record = $anyModel->where('client_id', 3607)->first();
        $record->fio = 'Test Model';
        //$record->update();

        $client = new Client();
        $record = $client->where('client_id', 3607)->first();
        $record->fio = 'Иванов Иван';
        $record->save();
        //dd($record);

        return response()->json($record);
        //return $record->toJson();
    }

}
