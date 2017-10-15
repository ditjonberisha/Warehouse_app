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
        $shop->users()->attach($request->user()->id);
    }

    public function update($id, Request $request)
    {
        $shop = Shop::findOrFail($id);
        $shopData = $request->toArray();
        $shop->update($shopData);
    }

    public function delete($id)
    {
        Shop::destroy($id);
    }
}
?>