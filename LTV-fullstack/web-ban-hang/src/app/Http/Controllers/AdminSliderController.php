<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;

class AdminSliderController extends Controller
{
    use StorageImageTrait;

    private $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index', [
            'sliders' => $sliders
        ]);
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderAddRequest $request)
    {
        try {
            $dataInsert = [
                'name' => $request['name'],
                'description' => $request['description']
            ];
            if ($request->has('image')) {
                $dataImage = $this->storageTraitUpload($request, 'image', 'sliders');
                if (!empty($dataImage)) {
                    $dataInsert['image_path'] = $dataImage['file_path'];
                    $dataInsert['image_name'] = $dataImage['file_name'];
                }
            }
            $this->slider->create($dataInsert);
            return redirect()->route('sliders.index');
        } catch (\Exception $exception) {
            $message = 'Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine();
            Log::error($message);
        }
    }

    public function edit($id)
    {
        $slider = $this->slider->findOrFail($id);
        return view('admin.slider.edit', [
            'slider' => $slider
        ]);
    }

    public function update(SliderUpdateRequest $request, $id)
    {
        $slider = $this->slider->findOrFail($id);

        try {
            $dataUpdate = [
                'name' => $request['name'],
                'description' => $request['description']
            ];
            if ($request->has('image')) {
                $dataImage = $this->storageTraitUpload($request, 'image', 'sliders');
                if (!empty($dataImage)) {
                    $dataUpdate['image_path'] = $dataImage['file_path'];
                    $dataUpdate['image_name'] = $dataImage['file_name'];
                }
            }
            $slider->update($dataUpdate);
            return redirect()->route('sliders.index');
        } catch (\Exception $exception) {
            $message = 'Message: ' . $exception->getMessage() . '. Line: ' . $exception->getLine();
            Log::error($message);
        }
    }
}
