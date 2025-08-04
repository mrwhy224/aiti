<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Morilog\Jalali\Jalalian;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
            'is_published' => $this->is_published,
            'published_on' => $this->is_published?Jalalian::fromCarbon($this->published_at)->format('j F Y'):null,
            'author' => new UserResource($this->whenLoaded('user')),
            'tags' => $this->whenLoaded('tags', function () {
                return $this->tags->pluck('name');
            }),
            'view_count' => $this->whenCounted('requestLogs'),
            'comment_count' => $this->whenCounted('comments'),
        ];
    }
}
