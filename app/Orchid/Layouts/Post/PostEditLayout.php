<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Post;

use Orchid\Screen\Layout;

class PostEditLayout extends Layout
{
    /** @var string */
    public $layout = 'fields';

    /**     * Allow or deny access to this layout for the current user.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**     * Build the layout.
     */
    public function build(): iterable
    {
        return [
            Input::make('post.title')->title('Title')->required(),
            Input::make('post.slug')->title('Slug')->required(),
            Input::make('post.body')->title('Body')->type('textarea')->required(),
            Input::make('post.excerpt')->title('Excerpt')->type('textarea')->help('Optional summary for post'),
            Input::make('post.published')->title('Published')->type('checkbox')->help('Publish this post publicly'),
        ];
    }
}