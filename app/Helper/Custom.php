<?php

namespace App\Helper;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class Custom
{
    public static function deleteByAjax($request, $model): JsonResponse
    {
        $model = $model::findOrFail($request->get('id'));

        if ($model->delete()) {
            return response()->json('success', Response::HTTP_OK);
        } else {
            return response()->json('error', Response::HTTP_BAD_REQUEST);
        }
    }

    public static function changeStatusByAjax($request, $model): JsonResponse
    {
        $model = $model::findOrFail($request->get('id'));
        $model->status = $request->get('status');

        if ($model->save()) {
            return response()->json('success', Response::HTTP_OK);
        } else {
            return response()->json('error', Response::HTTP_BAD_REQUEST);
        }
    }

    public static function uploadFile($file, $folder): ?string
    {
        if ($file instanceof UploadedFile) {
            $extension = $file->getClientOriginalExtension();
            $file_name = time() . '_' . uniqid() . '.' . $extension;

            $destination = "uploads/$folder/$file_name";

            $file->move(public_path("uploads/$folder"), $file_name);

            return $destination;
        }

        return null;
    }

    public static function deleteFile($file): void
    {
        if (!is_null($file)) {
            File::delete($file);
        }
    }
}
