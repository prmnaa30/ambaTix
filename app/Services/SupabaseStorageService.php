<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SupabaseStorageService
{
  protected $url;
  protected $apiKey;
  protected $bucket;

  public function __construct()
  {
    $this->url = env('SUPABASE_URL');
    $this->apiKey = env('SUPABASE_API_KEY');
    $this->bucket = env('SUPABASE_BUCKET_NAME');
  }

  public function uploadFile($filePath, $fileName)
  {
    $endpoint = "{$this->url}/storage/v1/object/{$this->bucket}/$fileName";

    $response = Http::withHeaders([
      "Authorization" => "Bearer {$this->apiKey}",
      'apikey' => $this->apiKey,
    ])->attach('file', file_get_contents($filePath), $fileName)
      ->post($endpoint);
    
    return $response->json();
  }

  public function getPublicUrl($fileName)
  {
    return "{$this->url}/storage/v1/object/public/{$this->bucket}/$fileName";
  }

  public function deleteFile($fileName)
  {
    $endpoint = "{$this->url}/storage/v1/object/{$this->bucket}/$fileName";
    $response = Http::withHeaders([
      "Authorization" => "Bearer {$this->apiKey}",
      'apikey' => $this->apiKey,
    ])->delete($endpoint);
    
    return $response->json();
  }
}