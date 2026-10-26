<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Education;

use App\Models\Education;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class EducationListScreen extends Screen
{
    /** @var iterable */
    public $query;

    /**     * Fetch data to be displayed on the screen.
     * @return array
     */
    public function query(): iterable
    {
        return [
            'educations' => Education::filters()->defaultSort('id', 'desc')->paginate(),
        ];
    }

    /**     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Education';
    }

    /**     * Display header description.
     */
    public function description(): ?string
    {
        return 'A comprehensive list of all education entries.';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.education.index',
        ];
    }

    /**     * The screen's action buttons.
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add Education'))
                ->icon('bs.plus-circle')
                ->href(route('platform.education.create')),
        ];
    }

    /**     * The screen's layout elements.
     * @return Layout[]
     */
    public function layout(): iterable
    {
        return [
            EducationListLayout::class,
        ];
    }
}