<?php
namespace App\Repository;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopRepository
{
    public function insert(Request $request)
    {
        $shop = new Shop();
        $shopData = $request->toArray();
        $shop->fill($shopData);
        $shop->save();
        foreach($request->user_ids as $user_id)
        {
            $shop->users()->attach($user_id);
        }
    }

    public function update($shop, Request $request)
    {
        $shopData = $request->toArray();
        $shop->update($shopData);
        $shop->users()->detach();
        foreach($request->user_ids as $user_id)
        {
            $shop->users()->attach($user_id);
        }
    }
}
?>