<?php

namespace Modules\CommonModule\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CategoryModule\Services\Category\CategoryService;
use Modules\CategoryModule\Transformers\CategoryResource;
use Modules\CommonModule\Entities\Setting;
use Modules\CommonModule\Services\CommonService;
use Modules\CommonModule\Services\Setting\SettingService;
use Modules\VideoItemModule\Services\VideoItem\VideoItemService;
use Modules\VideoItemModule\Transformers\VideoResource;

class CommonApiController extends Controller
{
    private $commonService,$settingService;

    public function __construct()
    {
        $this->commonService = new CommonService();
        $this->settingService = new SettingService();
    }

    public function getSettingValues(Request $request)
    {
        $response = $this->settingService->getSettingValues();
        return return_response($response);
    }
    public function createContactUs(Request $request)
    {
        $data = $request->all();
        $response = $this->commonService->createContactUs($data);
        return return_response($response);
    }
    public function sendEmail(Request $request)
    {
        $data = $request->all();
        $response = $this->commonService->sendEmail($data);
        return return_response($response);
    }
    public function search(Request $request)
    {
        $data = $request->all();
        $categories = (new CategoryService())->all($data)['data'];
        $categories = getCaseResource(CategoryResource::collection($categories)->response()->getData(true),$data);
        $videos = (new VideoItemService())->all($data)['data'];
        $videos = getCaseResource(VideoResource::collection($videos)->response()->getData(true),$data);

        return return_response(return_msg(true,"Success",compact('videos','categories')));
    }

}
