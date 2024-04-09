<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ResourceController extends Controller
{
    protected $paginate = 10;

    public function getResources(Request $request)
    {
        $resources = Resources::when(isset($request->search_value) && strlen($request->search_value) > 0, function ($query) use ($request) {
            return $query->whereRaw("lower(title) like ?", "%" . strtolower($request->search_value) . "%");
        })->paginate($this->paginate);

        return view("pages.back.resources")
            ->with("resources", $resources)
            ->with("page_uri", "resources")
            ->with("parent", "features");
    }

    public function getTherapistResources()
    {
        $resources = Resources::paginate($this->paginate);
        return view("pages.back.therapist.resources")
            ->with("resources", $resources)
            ->with("page_uri", "therapist_resources")
            ->with("parent", "therapist");
    }

    public function getResource(int $id)
    {
        $resource = Resources::findOrFail($id);
        if (isset($resource->id)) {
            $response_code = Response::HTTP_OK;
            $response_data = $resource;
            $response_message = "Data saved successfuly";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_data = [];
            $response_message = "Sorry! An error occures";
        }

        return response()->json([
            "response_code" => $response_code,
            "response_data" => $response_data,
            "response_message" => $response_message
        ], $response_code);
    }

    public function storeResource(Request $request)
    {
        $this->validate($request, [
            "title" => "required|string|max:255|min:5",
            "video_path" => "nullable|string",
            "document_path" => "nullable|string",
            "description" => "required|string|min:10"
        ]);

        $resource = $request->all();
        // Strip http: from the youtube url
        $youtubeURL = substr_replace($resource["video_path"], "", 0, 6);
        $resource['video_path'] = str_replace("watch?v=", "embed/", $youtubeURL);

        $result = DB::transaction(function () use ($resource) {
            Resources::create($resource);

            return 1;
        });

        if ($result) {
            $response_code = Response::HTTP_OK;
            $response_message = "Data saved successfully";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry! An error occured";
        }

        return response()->json([
            "response_code" => $response_code,
            "response_message" => $response_message
        ], $response_code);
    }

    public function updateResource(Request $request, int $id)
    {
        $this->validate($request, [
            "title" => "required|string|max:255|min:5",
            "video_path" => "nullable|string",
            "document_path" => "nullable|string",
            "description" => "required|string|min:10"
        ]);

        $resource = Resources::findOrFail($id);

        $requestData = $request->all();
        // Strip http: from the youtube url
        $youtubeURL = str_replace("https:", "", $requestData["video_path"]);
        // Replace watch?v= with embed/
        $requestData['video_path'] = str_replace("watch?v=", "embed/", $youtubeURL);

        $result = DB::transaction(function () use ($resource, $requestData) {
            $resource->update($requestData);
            return 1;
        });

        if ($result) {
            $response_code = Response::HTTP_OK;
            $response_message = "Data saved successfully";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry! An error occured";
        }

        return response()->json([
            "response_code" => $response_code,
            "response_message" => $response_message
        ], $response_code);
    }

    public function deleteResource(int $id)
    {
        $resource = Resources::findOrFail($id);
        $result = $resource->delete();

        if ($result) {
            $code = Response::HTTP_OK;
            $message = "Resource deleted successfuly!";
        } else {
            $code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $message = "Sorry! An error ocured";
        }

        return response()->json([
            "response_code" => $code,
            "response_message" => $message
        ], $code);
    }
}
