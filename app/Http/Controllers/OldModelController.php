<?php
namespace App\Http\Controllers;


use Sitebill\Dragon\app\Models\AnyModel;
use Sitebill\Dragon\Eloquent\Casts\SelectBox;

class OldModelController extends Controller
{

    public function load_data () {
        $anyModel = new \Sitebill\Dragon\app\Models\AnyModel();
        $anyModel->setTable('client');
        $anyModel->setCast('status_id', SelectBox::class);

        //$record = $anyModel->where('client_id', 18)->first();
        $record = $anyModel->get();

        return response()->json($record);
        //return $record->toJson();
    }

}
