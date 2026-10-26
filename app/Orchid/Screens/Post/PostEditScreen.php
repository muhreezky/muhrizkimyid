<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Post;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class PostEditScreen extends Screen
{
    /** @var Post|null */
    public $post;

    /**     * Fetch data to be displayed on the screen.
     * @return array
     */
    public function query(Post $post): iterable
    {
        return [
            'post' => $post,
        ];
    }

    /**     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Edit Post';
    }

    /**     * Display header description.
     */
    public function description(): ?string
    {
        return 'Modify the post details.';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.post.edit',
        ];
    }

    /**     * The screen's action buttons.
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),
        ];
    }

    /**     * The screen's layout elements.
     * @return Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::block([
                PostEditLayout::class,
            ])
                ->title('Post')
                ->description('Add or edit a blog post.'),
        ];
    }

    /**     * @return RedirectResponse
     */
    public function save(Request $request, Post $post): RedirectResponse
    {
        $request->validate([
            'post.title' => 'required',
            'post.slug' => 'required|unique:posts,slug,' . $post->id,
            'post.body' => 'required',
        ]);

        $post->fill($request->get('post'));
        $post->save();

        Toast::info(__('Post was saved'));

        return redirect()->route('platform.post.index');
    }
}