<?php

namespace App\Services;

class EditorJsParser
{
    /**
     * @var array
     * Array of content blocks extracted from JSON.
     */
    protected $blocks;

    /**
     * @var array
     * Maps block types to their corresponding render methods.
     * This makes the parser easily extensible.
     */
    protected $renderMap = [
        'header'    => 'renderHeader',
        'paragraph' => 'renderParagraph',
        'list'      => 'renderList',
        'quote'=> 'renderBlockquote',
        // ## To add new tools, add a new entry here ##
        // 'image' => 'renderImage',
    ];

    /**
     * In the constructor, we receive the JSON string and convert it into an array.
     *
     * @param string $json
     */
    public function __construct(string $json)
    {
        $data = json_decode($json, true);

        // We check if the JSON is valid and has a 'blocks' key.
        if (json_last_error() === JSON_ERROR_NONE && isset($data['blocks'])) {
            $this->blocks = $data['blocks'];
        } else {
            $this->blocks = [];
        }
    }

    /**
     * The main method that converts all blocks to HTML.
     * It iterates through the blocks and uses the renderMap to call the correct method.
     *
     * @return string
     */
    public function render(): string
    {
        $html = '';
        foreach ($this->blocks as $block) {
            $blockType = $block['type'] ?? null;
            $blockData = $block['data'] ?? [];

            // Check if a render method is defined for this block type in our map.
            if ($blockType && isset($this->renderMap[$blockType])) {
                $methodName = $this->renderMap[$blockType];

                // Check if the method actually exists in this class to prevent errors.
                if (method_exists($this, $methodName)) {
                    $html .= $this->{$methodName}($blockData);
                }
            }
        }
        return $html;
    }

    /**
     * Renders the 'header' block into <h1> to <h6> tags.
     *
     * @param array $data
     * @return string
     */
    protected function renderHeader(array $data): string
    {
        $level = $data['level'] ?? 2; // If level is not specified, default to h2
        $text = htmlspecialchars($data['text'] ?? '', ENT_QUOTES, 'UTF-8');
        // You can add your custom CSS classes here
        return "<h{$level} class='text-2xl font-bold my-4'>{$text}</h{$level}>";
    }

    /**
     * Renders the 'paragraph' block into a <p> tag.
     *
     * @param array $data
     * @return string
     */
    protected function renderParagraph(array $data): string
    {
        $text = $data['text'] ?? ''; // Text in paragraphs can contain HTML, so we don't escape it here.
        // You can add your custom CSS classes here
        return "<p class='my-4 leading-relaxed'>{$text}</p>";
    }

    /**
     * Renders the 'list' block into <ul> or <ol> tags.
     *
     * @param array $data
     * @return string
     */
    protected function renderList(array $data): string
    {
        $style = $data['style'] ?? 'unordered'; // 'unordered' or 'ordered'
        $items = $data['items'] ?? [];
        $tag = ($style === 'ordered') ? 'ol' : 'ul';

        $listHtml = "<{$tag} class='list-disc list-inside my-4'>";
        foreach ($items as $item) {
            $escapedItem = htmlspecialchars($item, ENT_QUOTES, 'UTF-8');
            $listHtml .= "<li>{$escapedItem}</li>";
        }
        $listHtml .= "</{$tag}>";

        return $listHtml;
    }
    protected function renderBlockquote(array $data): string
    {
        $text = $data['text'] ?? ''; // Allow inline HTML
        $caption = $data['caption'] ?? ''; // Allow inline HTML

        // Build the HTML structure based on the new design
        $html = "<div class='blockquote-wrapper'>";
        $html .= "<div class='blockquote'>";
        $html .= "<h4>{$text}</h4>";

        // Only add the caption if it has actual content
        if (!empty(trim(strip_tags($caption)))) {
            $html .= '<h5 class="mt-4">&mdash; '.$caption.'</h5>';
        }

        $html .= "</div>";
        $html .= "</div>";

        return $html;
    }

    // ## To add new tools, create a new method here (and add it to the $renderMap) ##
}

