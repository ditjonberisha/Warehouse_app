<?php
namespace App\Repository;
use App\Models\Phone;
use App\Models\Photo;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Enum\PhoneConditionEnum;
use App\Helpers\FileHelper;
use Illuminate\Support\Facades\Auth;

class PhoneRepository
{
    public function getPhones($search = '')
    {
        $myShops = Auth::user()->myShops();
        $GLOBALS['search'] = strtolower($search);
        if(!empty($GLOBALS['search']))
        {
            $phones = Phone::where(function($query){
              $query->where('IMEI1' ,'LIKE', "%{$GLOBALS['search']}%")->
              whereOr('IMEI2', 'LIKE', "%{$GLOBALS['search']}%")->
              whereOr('returnedOrderId', 'LIKE', "%{$GLOBALS['search']}%")->
              whereOr('condition', 'LIKE', "{$GLOBALS['search']}")->
              whereOr('customer_email', 'LIKE', "%{$GLOBALS['search']}%")->
              whereOr('description', 'LIKE', "%{$GLOBALS['search']}%")->
              whereOr('EAN', 'LIKE', "%{$GLOBALS['search']}%");})->whereIn('shop_id', $myShops->pluck('id'));
        }
        else
        {
            $phones = Phone::whereIn('shop_id', $myShops->pluck('id'));
        }
        return $phones->get();
    }
    public function insert(Request $request)
    {
        $myShops = Auth::user()->myShops();
        $phone = new Phone();
        $phoneData = $request->all();
        $phone->fill($phoneData);
        if (!in_array($phone['shop_id'], $myShops->pluck('id')->toArray()))
        {
            throw new \Exception('You do not have access to this shop!');
        }
        $phone->condition = PhoneConditionEnum::getValue($phone->condition);
        $phone->save();

        $order = new Order();
        $order->user_id = $request->user()->id;
        $phone->order()->save($order);

        $photos = $request->photos;
        $photos_count = count($photos);
        for ($i = 0; $i < $photos_count; $i++)
        {
            $photo = new Photo();
            $path = FileHelper::createFile($photos[$i], "public/phone_photos", time()."$i");
            $photo->path = $path;
            $phone->photos()->save($photo);
        }
    }
    public function update($phone, Request $request)
    {
        $myShops = Auth::user()->myShops();
        $phoneData = $request->except('status');
        if (!in_array($phone['shop_id'], $myShops->pluck('id')->toArray()))
        {
            return redirect()->back()->withErrors('You do not have access');
        }
        $phoneData['condition'] = PhoneConditionEnum::getValue($phoneData['condition']);
        $phone->update($phoneData);

        $photos = $request->photos;
        $photos_count = count($photos);

        if($photos_count > 0)
        {
            for ($i = 0; $i < $photos_count; $i++)
            {
                $photo = new Photo();
                $path = FileHelper::createFile($photos[$i], "storage/phone_photos", time());
                $photo->path = $path;
                $phone->photos()->save($photo);
            }
        }
    }

    public function delete($phone)
    {
        $myShops = Auth::user()->myShops();
        if(!in_array($phone->shop_id, $myShops->pluck('id')->toArray()))
        {
            throw new \Exception('You do not have access');
        }
        $photo_count = count($phone->photos);
        for($i = 0; $i < $photo_count; $i++)
        {
            $photo = $phone->photos[$i];
            FileHelper::deleteFile($photo->path);
            $photo->forceDelete();
        }
        if(isset($phone->order))
            $phone->order->forceDelete();
        $phone->forceDelete();
    }
}
?>