<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Experience;

use App\Models\Experience;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class ExperienceListScreen extends Screen
{
    /** @var iterable */
    public $query;

    /**     * Fetch data to be displayed on the screen.
     * @return array
     */
    public function query(): iterable
    {
        return [
            'experiences' => Experience::filters()->defaultSort('id', 'desc')->paginate(),
        ];
    }

    /**     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Experience';
    }

    /**     * Display header description.
     */
    public function description(): ?string
    {
        return 'A comprehensive list of all experiences.';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.experience.index',
        ];
    }

    /**     * The screen's action buttons.
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add Experience'))
                ->icon('bs.plus-circle')
                ->href(route('platform.experience.create')),
        ];
    }

    /**     * The screen's layout elements.
     * @return Layout[]
     */
    public function layout(): iterable
    {
        return [
            ExperienceListLayout::class,
        ];
    }
}