<?php

namespace Modules\OrderModule\Repositories\Order;

use Modules\OrderModule\Entities\Order;

class OrderRepository
{
    use OrderRepoHelper;

    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new Order();
    }
    public function create(array $data)
    {
        $item =$this->orderModel->create($data);
        return $item->fresh();
    }
    public function update(array $data)
    {
        $item = $this->orderModel->find($data['id']);
        $item->update($data);
        return $item->fresh();
    }
    public function find($id)
    {
        return $item = $this->orderModel->whereId($id)->with(['admin','driver'])->first();
    }
    public function delete($id)
    {
    $item = $this->orderModel->whereId($id)->first();
    return $item->delete();
    }
    public function all(array $data)
    {
        $items = $this->orderModel->orderByDesc('id')->with(['driver','admin']);
        $this->filter($items,$data);
        return getCaseCollection($items,$data);
    }
}
